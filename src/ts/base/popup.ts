export module Popup {

  let popupContainer = document.querySelector('.popup__container');
  const timeout = 3000;

  if(!popupContainer) {
    popupContainer = document.createElement('div');
    popupContainer.classList.add('popup__container');
    document.querySelector('body').appendChild(popupContainer);
  }

  export enum Type {
    ERROR = -1,
    SUCCESS = 1,
    WARNING = 2,
    DEFAULT = 3,
    NORMAL = 4,
  };

  const popupClasses = {
    'popup--red': Type.ERROR,
    'popup--green': Type.SUCCESS,
    'popup--yellow': Type.WARNING,
    'popup--grey': Type.DEFAULT,
    'popup--blue': Type.NORMAL
  }

  const popupIcons = {
    'ion-alert-circled': Type.ERROR,
    'ion-checkmark-round': Type.SUCCESS,
    'ion-help-buoy': Type.WARNING,
    'ion-information-circled': Type.DEFAULT,
    'ion-flag': Type.NORMAL
  }

  function create(type: Type, header: string, message: string) {
    let popup = document.createElement('div');
    let icon = document.createElement('span');
    let popupText = document.createElement('div');
    let popupHeader = document.createElement('h1');
    let popupMessage = document.createElement('p');

    popup.classList.add('popup');
    icon.classList.add('ion');
    popupText.classList.add('popup__text');

    popupHeader.textContent = header;
    popupMessage.textContent = message;

    for(let className in popupClasses) {
      if(popupClasses[className] == type) {
        popup.classList.add(className);
      }
    }

    for(let className in popupIcons) {
      if(popupIcons[className] == type) {
        icon.classList.add(className);
      }
    }

    popup.appendChild(icon);
    popup.appendChild(popupText);
    popupText.appendChild(popupHeader);
    popupText.appendChild(popupMessage);

    return popup;
  };

  export function show(type: Type, header: string, message: string) {

      if(popupContainer) {
        let popup = create(type, header, message);
        popupContainer.appendChild(popup);
        popupContainer.classList.add('on');

        setTimeout(function() {
          popup.classList.add('on');
        }, 200);

        setTimeout(function() {
          popup.classList.remove('on');
          popup.addEventListener('animationend', function() {
            popupContainer.removeChild(popup);
          });
        }, timeout);
      }
  };

}
