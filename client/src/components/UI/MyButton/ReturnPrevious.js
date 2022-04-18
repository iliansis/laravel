import React from "react";
import axios from "axios";
import classes from "./MyButtonReturn.module.css";

const ReturnPrevious = (props) => {
  async function returnPrevious() {
    try {
      await axios({
        url: "/returnPrevious",
        headers: {
          "content-type": "application/json",
        },
        method: "POST",
      }).then((response) => {
        console.log(response.data.text);
        props.data(response.data.text);
      });
    } catch (error) {
      console.log("Ошибка", error);
    }
  }
  return (
    <button onClick={returnPrevious} className={classes.returnPrevios}>
      {props.children}
    </button>
  );
};

export default ReturnPrevious;
