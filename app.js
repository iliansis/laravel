const express = require("express"),
  http = require("http"),
  path = require("path"),
  bodyParser = require("body-parser"),
  logger = require("morgan"),
  methodOverride = require("method-override"),
  XLSX = require("xlsx"),
  app = express(),
  favicon = require("serve-favicon"),

  tableName = "test.xlsx", // Excel таблица
  cell = "C1", // Хранение текущей позиции
  textColumn = "A", // Столбец с текстом
  contextColumn = "B", // Столбец с контекстом
  
  file = XLSX.readFile(tableName),
  worksheet = file.Sheets[file.SheetNames[0]];

app.use(express.json());
if (!worksheet[cell]) {
  worksheet[cell] = {};
  worksheet[cell].t = "n";
  worksheet[cell].v = 1;
}
var currentId = worksheet[cell].v;

app.set("port", 3000);
app.use(favicon(__dirname + "/public/images/favicon.png"));
app.use(logger("dev"));
app.use(bodyParser.urlencoded({ extended: false }));
app.use(methodOverride("_method"));
app.use(express.static(path.join(__dirname, "client/build")));

function sendUserReq(res) {
  try {
    worksheet[textColumn + currentId]
      ? res.json({ text: worksheet[textColumn + currentId].v })
      : res.json({ status: 0 });
  } catch (error) {
    console.log(error);
  }
}

function addContext(req, res) {
  try {
    if (!worksheet[contextColumn + currentId])
      worksheet[contextColumn + currentId] = {};
      worksheet[contextColumn + currentId].t = "n";
      worksheet[contextColumn + currentId].v = req.query.context;
    if (worksheet[textColumn + currentId]) {
      worksheet[cell].v = ++currentId;
      XLSX.writeFile(file, tableName);
      sendUserReq(res);
    } else {
      res.json({ status: 0 });
    }
  } catch (error) {
    console.log(error);
  }
}

function returnPrevious(res) {
  try {
    if (currentId > 1) {
      worksheet[cell].v = --currentId;
      XLSX.writeFile(file, tableName);
      res.json({ text: worksheet[textColumn + currentId].v });
    }
  } catch (error) {
    console.log(error);
  }
}

app.post("/newRequest", (req, res) => {
  sendUserReq(res);
});
app.post("/addContext", (req, res) => {
  addContext(req, res);
});
app.post("/returnPrevious", (req, res) => {
  returnPrevious(res);
});
app.get("*", (req, res) => {
  res.sendFile(path.join(__dirname + "/client/build/index.html"));
});
http.createServer(app).listen(app.get("port"), function () {
  console.log("Express server listening on port " + app.get("port"));
});
