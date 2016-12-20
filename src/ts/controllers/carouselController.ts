import { Controller } from "../base/controller";
import { Map } from "../modules/map";
import * as $ from 'jquery';
import 'slick-carousel';

export class CarouselController extends Controller {

  public carousel: JQuery;

  private nextButton: JQuery;
  private prevButton: JQuery;

  constructor(args: IControllerArgs) {
    super(args);

    // this.carousel = $(args.root).find('.carousel');




    // this.carousel = $('.map__images').slick({
    //   slidesToShow: 7,
    //   arrows: false,
    // });
    //
  



  }

}
