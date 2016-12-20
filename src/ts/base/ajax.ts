import { Popup } from "./popup";
import { CurrentLanguage } from "../lang";

export module Ajax {
  function request(verb: string, data: Object, url: string, next: Function) {
    next = next || function() {};

    var request = new XMLHttpRequest();
    request.open(verb, url, true);

    request.onload = function() {
      let status = null;
      let message = null;
      let data = null;

      if (request.status >= 200 && request.status < 400) {

        try {
          status = request.status;
          message = request.statusText;
          data = JSON.parse(request.responseText);
          Popup.show(Popup.Type.SUCCESS, CurrentLanguage.status.success, request.statusText);
        }
        catch(e) {
          status = request.status;
          data = null;
          Popup.show(Popup.Type.ERROR, CurrentLanguage.status.error, CurrentLanguage.ajax.server.badData);
          return;
        }
        next(null, {
          status: request.status,
          message: request.statusText,
          data: JSON.parse(request.responseText)
        });
      } else {
        Popup.show(Popup.Type.ERROR, CurrentLanguage.status.error, request.statusText);
        next({
          status: request.status,
          message: request.statusText,
          data: null
          }, null);
      }
    };

    request.onerror = function() {
      Popup.show(Popup.Type.ERROR, CurrentLanguage.status.error, CurrentLanguage.ajax.connection.noConnection);
      next({
        status: null,
        message: 'connection error',
        data: null
      }, null);
    };

    try {
      request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
      request.send(data);
      return;
    }
    catch(e) {
      Popup.show(Popup.Type.ERROR, CurrentLanguage.status.error, CurrentLanguage.ajax.server.noResponse);
    }
  }

  export function post(url: string, data: Object, next?: Function) {
    data = transformToJSON(data);
    if(data) {
      request('POST', data, url, next);
    }
  }

  export function get(url: string, next?: Function) {
    request('GET', null, url, next);
  }

  //delete is a reserved word
  export function remove(url: string, next?: Function) {
    request('DELETE', null, url, next);
  }

  export function put(url: string, data: Object, next?: Function) {
    data = transformToJSON(data);
    if(data) {
      request('PUT', data, url, next);
    }
  }

  export function update(url: string, data: Object, next?: Function) {
    request('UPDATE', data, url, next);
  }

  export function patch(url: string, data: Object, next?: Function) {

    data = transformToJSON(data);
    if(data) {
      request('PATCH', data, url, next);
    }
  }

  function transformToJSON(data) {
    try {
      data = JSON.stringify(data);
      return data;
    }
    catch (e) {
      Popup.show(Popup.Type.ERROR, CurrentLanguage.status.error, CurrentLanguage.ajax.request.badRequest);
      return null;
    }
  }

}
