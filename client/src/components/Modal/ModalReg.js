import React from 'react';
import "./Modal.css";

const ModalReg = ({activeReg, setActiveReg, children }) => {
    return (
        <div id={'ModalReg'} style={{display: 'none'}}>
            <div className={activeReg ? "MyModal active" : "MyModal"} onClick={() => setActiveReg(false)} >
                <div className={activeReg ? "MyModal-content active" : "MyModal-content"} onClick={e => e.stopPropagation()}>
                    {children}
                </div>
            </div>
        </div>
    )
}

export default ModalReg