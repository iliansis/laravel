import React, { useState } from "react";
import axios from "axios";
import './Card.css';
import AddContext from "../UI/MyButton/AddContext";

const Card = (props) => {
  const idContext = document.getElementById(props.idContext);
  const CardText = document.getElementById(props.id);
  const CardTextHover = document.getElementById(props.text);

  function dragLeaveHandle(e) {
    e.target.style.background = '#f6f6f6';
    e.target.style.color = "black";
    e.target.style.fontSize = "18px";
    CardText.style.opacity = "1";
    idContext.style.display = "block";
  }
  function dragOverHandle(e) {
    e.preventDefault();
    e.target.style.background = "rgba(211,211,211,0.8)";
    
    console.log("hover");
    e.target.style.color = "black";
    CardText.style.opacity = "0";
    CardText.style.display = "none";
    CardTextHover.style.opacity = "1";
    CardTextHover.style.display = "block";
    e.target.style.fontSize = "20px";
  }
  function droptHandle(e, req, id, setData) {
    e.preventDefault();
    e.target.style.background = '#f6f6f6';

    try {
      axios({
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

    console.log('Отправлено', req);
  }
  return (
    // {cardList.map(card=>
    //   )}
    <div class="card">
      <div class="card-body">
        <h6 style={{marginLeft: 5}} class="card-subtitle mb-2 text-muted">Контекст № {props.id}</h6>
        <p id={props.idContext} style={{display: 'none'}}>{props.text}</p>
      </div>
      <div className={"DropBloclk"}
      onDragLeave={(e) => dragLeaveHandle(e)}
      onDragOver={(e) => dragOverHandle(e)}
      onDrop={(e) => droptHandle(e, props.req, props.id, props.data)}
        onClick={() => post(props.id, props.data)}>
        <p id={props.id} className={'CardText'}>{props.text}</p>
        <p id={props.text} className={"CardTextHover"}>Поместите сюда ваш запрос для определения контекста</p>
      </div>
      <div className={"footer-card"}>
      <div class="card-body card-button">
      <AddContext id={props.id} data={props.data} req={props.req}>{'Присвоить' + ' ' + props.id}</AddContext>
      </div>
      </div>
    </div>
  );
};

export default Card;
