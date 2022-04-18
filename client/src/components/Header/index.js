import React from 'react';

const Header = function (props) {
  
  return(
<header class="p-3 bg-dark text-white">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <h2>Ufanet Requests</h2>
        </div>
        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2" onClick={
            function () {
              props.setActive(true);
              document.getElementById('ModalAuth').style.display="flex";
            }
            }>Log-in</button>
          <button type="button" class="btn btn-warning" onClick={
            function () {
              props.setActiveReg(true);
              document.getElementById('ModalReg').style.display="flex";
            }
          }>Sign-up</button>
        </div>
      </div>
  </header>
  );
}

export default Header;