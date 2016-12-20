/// <reference path="../../../typings/globals/mapbox-gl/index.d.ts"/>
/// <reference path="../../../typings/globals/geoJSON/index.d.ts"/>

import { Config } from "../config";
import mapboxgl = require('mapbox-gl');

mapboxgl.accessToken = Config.mapbox.token;

export class Map {


  private container: Element;
  public settings: any = {};

  public mapbox: mapboxgl.Map;

  public constructor(args: IMapSettings) {
    this.settings.token = args.token || Config.mapbox.token;
    this.settings.style = args.style || Config.mapbox.style;
    this.settings.minZoomLevel = args.minZoomLevel || Config.mapbox.minZoomLevel;
    this.settings.maxZoomLevel = args.maxZoomLevel || Config.mapbox.maxZoomLevel;
    this.settings.bearing = args.bearing || Config.mapbox.bearing;
    this.settings.zoomSpeed = args.zoomSpeed || Config.mapbox.zoomSpeed;
    this.settings.panSpeed = args.panSpeed || Config.mapbox.panSpeed;
    this.container = args.element;
  }

  public createMap() {
    if(!this.container) {
      console.error('Map: Cannot create map, no element selected');
      this.mapbox = null;
    }
    else {
      this.mapbox = new mapboxgl.Map({
          container: this.container,
          style: this.settings.style,
          scrollZoom: false,
          zoom: 2
      });
    }

    return this.mapbox;
  }
}
