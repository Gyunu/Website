import { Controller } from "../base/controller";
import { CarouselController } from "./carouselController";
import { Map } from "../modules/map";
import * as $ from 'jquery';

export class MapController extends Controller {

  private mapContainer: Element;
  public map: Map;
  public carousel: CarouselController;

  constructor(args: IControllerArgs) {
    super(args);

    this.mapContainer = this.root.querySelector('[gyunu-map-container]');
    this.map = new Map({element: this.mapContainer as HTMLElement});
    this.map.createMap();

    let carouselRoot = document.querySelector('[gyunu-map-carousel]') as HTMLElement;

    if(carouselRoot) {
      $('.map__images').slick({
        slidesToShow: 7,
        arrows: false,
        infinite: false
      });

      $('.map__images-button--next').on('click', function() {
        $('.map__images').slick('next')
      }.bind(this));

      $('.map__images-button--prev').on('click', function() {
        $('.map__images').slick('prev') }.bind(this)
      );

      this.carousel = new CarouselController({
        root: carouselRoot,
        endpoint: null
      });
    }

    this.on('flyTo', function(e) {
      let lat = e.target.getAttribute('lat');
      let lon = e.target.getAttribute('lon');
      let city = e.target.getAttribute('city');
      let country = e.target.getAttribute('country');
      let images = {};


      if(this.carousel) {
        this.data.forEach(function(loc) {
          if(loc.name == country) {
            loc.data.forEach(function(cit) {
              if(cit.content.city == city) {
                images = (cit.files) ? cit.files : {};
              }
            });
          }
        });

        this.carousel.data = images;
        console.log(this.carousel.data);

        $('.map__images').slick('reinit');

        // this.carousel.carousel.slick('reinit');
      }

      if(!lat || !lon) {
        console.error('Map: Lat or Lon not set, cannot fly');
        return;
      }

      this.map.mapbox.flyTo({
        center: [lon, lat],
        zoom: this.map.settings.maxZoomLevel,
        speed: this.map.settings.panSpeed,
        curve: this.map.settings.zoomSpeed,
        bearing: this.map.settings.bearing
      });
    });

    this.on('showCities', function(e) {
      let $element = $(e.target);
      let allCities = $('.map__city-container').removeClass('show');
      let thisCountryCities = $element.siblings('.map__city-container').addClass('show');
    });

  }

}
