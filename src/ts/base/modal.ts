export module Modal {

  let modalContainer = document.querySelector('.modal__container');

  if(!modalContainer) {
    modalContainer = document.createElement('div');
    modalContainer.classList.add('modal__container');
    document.querySelector('body').appendChild(modalContainer);
  }

  export function show(header: string, message: string, ok: Function, cancel: Function) {
      if(modalContainer) {

        let modal = document.createElement('div');
        let modalHeader = document.createElement('h1');
        let modalText = document.createElement('p');
        let buttonsContainer = document.createElement('div');

        let okButton = document.createElement('button');
        let cancelButton = document.createElement('button');

        okButton.classList.add('btn');
        okButton.classList.add('btn--green');
        cancelButton.classList.add('btn');
        cancelButton.classList.add('btn--red');

        modal.classList.add('modal');
        modalHeader.classList.add('modal__header');
        modalText.classList.add('modal__text');
        buttonsContainer.classList.add('modal__buttons');

        modalHeader.textContent = header;
        modalText.textContent = message;
        okButton.textContent = "ok";
        cancelButton.textContent =  "cancel";

        modal.appendChild(modalHeader);
        modal.appendChild(modalText);
        modal.appendChild(buttonsContainer);
        buttonsContainer.appendChild(okButton);
        buttonsContainer.appendChild(cancelButton);

        modalContainer.appendChild(modal);
        modalContainer.classList.add('on');

        modalContainer.addEventListener('click', function(event) {
          let target = event.target as HTMLElement;

          modalContainer.classList.remove('on');
          modalContainer.removeChild(modal);

          if(target.classList.contains('btn--green')) {
            ok();
          }
          else if(target.classList.contains('btn--red')) {
            cancel();
          }
        });
      }
  };

}
