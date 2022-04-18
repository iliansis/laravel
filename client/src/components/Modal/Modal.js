import React from 'react';
import "./Modal.css";

const Modal = ({ active, setActive, children }) => {
    return (
        <div id={'ModalAuth'} style={{display: 'none'}}>
            <div className={active ? "MyModal active" : "MyModal"} onClick={() => setActive(false)} >
                <div className={active ? "MyModal-content active" : "MyModal-content"} onClick={e => e.stopPropagation()}>
                    {children}
                </div>
            </div>
        </div>
    )
}

export default Modal