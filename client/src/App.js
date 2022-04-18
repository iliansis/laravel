import React, { useState, useEffect } from "react";
import axios from "axios";


import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {faArrowLeft} from "@fortawesome/free-solid-svg-icons";

import MyButton from "./components/UI/MyButton/MyButton";
import ReturnPrevious from "./components/UI/MyButton/ReturnPrevious";

import Header from "./components/Header/index";
import Modal from "./components/Modal/Modal";
import ModalReg from "./components/Modal/ModalReg";
import Card from "./components/card/Card";
import "./App.css";

function App() {
  function dragStartHandle(e) {
    console.log("Взято", data);
  }
  function dragLeaveHandle(e) {
    e.target.style.background = '#f6f6f6';
  }
  function dragOverHandle(e) {
    e.preventDefault();
    e.target.style.background = "lightgray";
  }
  function dragEndHandle(e) {}
  function droptHandle(e) {
    e.preventDefault();
    e.target.style.background = '#f6f6f6';
    console.log('Отправлено', data);
  }

  const [data, setData] = useState("Start");
  const [modalActive, setModalActive] = useState(false)
  const [modalActiveReg, setModalActiveReg] = useState(false)


  const password = document.getElementById("password");
  const User = document.getElementById("name");
  const RepeatpPassword = document.getElementById("password");


  function Reg() {
    try {
      axios({
        url: "/test",
        headers: {
          "content-type": "application/json",
        },
        params: {
          password: password.value,
          User: User.value,
          RepeatpPassword: RepeatpPassword.value,
        },
        method: "POST",
      }).then(console.log(password.value));
    } catch (error) {
      console.log("Ошибка", error);
    }
  }

  const passwordAuth = document.getElementById("passwordAuth");
  const UserAuth = document.getElementById("nameAuth");

  function Auth() {
    try {
      axios({
        url: "/test1",
        headers: {
          "content-type": "application/json",
        },
        params: {
          passwordAuth: passwordAuth.value,
          UserAuth: UserAuth.value,
        },
        method: "POST",
      }).then(console.log(password.value));
    } catch (error) {
      console.log("Ошибка", error);
    }
  }

  return (
    <div>
      <Header
        active={modalActive}
        setActive={setModalActive}
        activeReg={modalActiveReg}
        setActiveReg={setModalActiveReg}
      />
      <Modal active={modalActive} setActive={setModalActive}>
        <div className="Modal-header">
          <h3>Modal-header</h3>
        </div>
        <div className="Modal-body">
          <hr />
          <form>
            <div class="mb-3">
              <label for="name" className="form-label">
                User name
              </label>
              <input type="text" className="form-control" id="name" />
            </div>
            <div class="mb-3">
              <label for="password" className="form-label">
                Password
              </label>
              <input type="password" className="form-control" id="password" />
            </div>
            <div class="mb-3">
              <label for="RepeatPassword" className="form-label">
                Repeat password
              </label>
              <input
                type="password"
                className="form-control"
                id="RepeatPassword"
              />
            </div>
          </form>
          <hr />
        </div>
        <div className="Modal-footer d-flex justify-content-end">
          <button className="btn btn-primary" onClick={Reg}>Submit</button>
        </div>
      </Modal>
      <ModalReg activeReg={modalActiveReg} setActiveReg={setModalActiveReg}>
        <div className="Modal-header">
          <h3>Modal-header</h3>
        </div>
        <div className="Modal-body">
          <hr />
          <form>
            <div class="mb-3">
              <label for="name" className="form-label">
                User name
              </label>
              <input type="text" className="form-control" id="nameAuth" />
            </div>
            <div class="mb-3">
              <label for="password" className="form-label">
                Password
              </label>
              <input
                type="password"
                className="form-control"
                id="passwordAuth"
              />
            </div>
          </form>
          <hr />
        </div>
        <div className="Modal-footer d-flex justify-content-end">
        <button className="btn btn-primary" onClick={Auth}>Submit</button>
        </div>
      </ModalReg>
      <div className="container">
        <div className="row" style={{ marginTop: 50 }}>
          <div className="col-4">
            <Card
              idContext={1000}
              id={1}
              req={data}
              data={setData}
              text={"Перенаправить на главную страницу"}
            />
          </div>
          <div className="col-4">
            <Card
              idContext={1001}
              id={2}
              req={data}
              data={setData}
              text={"Перенаправить на профиль пользователя"}
            />
          </div>
          <div className="col-4">
            <Card
              idContext={1002}
              id={3}
              req={data}
              data={setData}
              text={"Переключить пользователя на оператора"}
            />
          </div>
        </div>
      </div>
      <div>
        <div className={"StartButton"}>
        <ReturnPrevious data={setData}>
          <p style={{textAlign: 'center'}}>Вернуть прошлый запрос&nbsp; &nbsp;<FontAwesomeIcon icon={faArrowLeft}></FontAwesomeIcon></p>
        </ReturnPrevious>

        <MyButton data={setData}>{data}</MyButton>
        <div style={{margin: -5}}>
          <div className={"StartBlock"} id={"drag"}  draggable={true}
            onDragStart={(e) => dragStartHandle(e)}
            onDragLeave={(e) => dragLeaveHandle(e)}
            onDragOver={(e) => dragOverHandle(e)}
            onDragEnd={(e) => dragEndHandle(e)}
            onDrop={(e) => droptHandle(e)}>
            <h1 className={'reqData'}>
              {data}
            </h1>
          </div>
        </div>
        </div>
      </div>
    </div>
  );
}

export default App;
