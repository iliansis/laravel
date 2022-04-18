import React from "react";
import axios from "axios";
import classes from "./PostButton.module.css";

const AddContext = (props) => {
  async function post(id, setData) {
    try {
      await axios({
        url: "/addContext",
        headers: {
          "content-type": "application/json",
        },
        params: {
          context: id,
        },
        method: "POST",
      })
        .then(console.log(id))
        .then((response) => {
          response.data.status == undefined ? setData(response.data.text) : setData("Запросы закончились");
        });
    } catch (error) {
      console.log("Ошибка", error);
    }
  }
  return (
    <button className={classes.PostBtn} onClick={() => post(props.id, props.data)}
    >
      {props.children}
    </button>
  );
};

export default AddContext;
