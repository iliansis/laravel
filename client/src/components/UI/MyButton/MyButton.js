import React from "react";
import axios from "axios";
import "./MyButton.css";

const MyButton = (props) => {
  const drag = document.getElementById('drag');
  async function starting() {
    try {
      axios({
        url: "/newRequest",
        headers: {
          "content-type": "application/json",
        },
        method: "POST",
      }).then((response) => {
        console.log(response.data.text);
        props.data(response.data.text);
        // props.setId(response.data.id);
      });
    } catch (error) {
      console.log("Ошибка", error);
    }
  }
  return (
    <button id={'start'} onClick={function() {
      starting();
      document.getElementById('drag').style.display="flex";
      document.getElementById('start').style.display="none";
    }} className={'start'}>
      {props.children}
    </button>
  );
};

export default MyButton;
