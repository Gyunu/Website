import { Ajax } from "../base/ajax";
import { QueryString } from "../base/queryString";
import * as $ from 'jquery';

declare function require(name:string);
var rivets = require('rivets');

export enum ControllerState {
  ERROR = -1,
  DISABLED = 0,
  READY = 1,
  LOADING = 2,
  LOADED = 3
}

export class Controller {



  public events: Object = {};
  public root: HTMLElement = null;

  private endpoint: string = null;

  private view;

  private _data: Object = {};
  private _state: ControllerState = ControllerState.DISABLED;


  get data(): Object {
    return this._data;
  }

  set data(value) {
    this._data = value;
    if(this.view) {
      this.view.update({data: this.data, state: this.state});
    }
  }

  get state(): ControllerState {
    return this._state;
  }

  set state(value: ControllerState) {
    this._state = value;
    if(this.view) {
      this.view.update({data: this.data, state: this.state});
    }
  }

  public constructor(args: IControllerArgs, noView?: Boolean) {
    this.endpoint = args.endpoint;
    this.root = args.root;

    if(!noView) {
      this.view = rivets.bind($(this.root), {
        data: this.data,
        events: this.events,
        state: this.state
      });
    }

    this.state = ControllerState.READY;
  }

  public getData(queryString: Dictionary<string>) {
    if(this.state === ControllerState.READY) {
      this.state = ControllerState.LOADING;
      let query = QueryString.createFromObject({groupBy: 'country'});
      Ajax.get(this.endpoint + query, function(error, data) {
        if(error) { this.data = {}; }
        else if(data) { this.data = data.data; }
        this.state = ControllerState.LOADED;
      }.bind(this));
    }
  }

  public postData() {
    if(this.state === ControllerState.READY) {
      this.state = ControllerState.LOADING;
      Ajax.post(this.endpoint, this.data, function(error, data) {
        this.state = ControllerState.READY;
      });
    }
  }

  public on(event: string, func: Function) {
    this.events[event] = func.bind(this);
    if(this.view) {
      this.view.update({events: this.events});
    }
  }
}
