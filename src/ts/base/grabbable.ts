export class Grabbable {

  private isGrabbed: Boolean;
  private isDisabled: Boolean;
  private element: HTMLElement;
  private parent: HTMLElement;
  private offset: Array<number> = [];
  private bounds: Array<number> = [];
  private boundsSafeZones: Array<number> = [];

  constructor(element: HTMLElement) {
    this.element = element;
    this.parent = element.parentNode as HTMLElement;

    if(!this.parent) {
      console.error("Grabbable: Element does not have a parent");
      this.isDisabled = true;
    }
    else {
      this.boundsSafeZones = [element.clientWidth / 2, element.clientHeight / 2];
      this.bounds = [this.parent.clientTop, this.parent.clientWidth - this.boundsSafeZones[0], this.parent.clientHeight - this.boundsSafeZones[1], this.parent.clientLeft];
      this.isDisabled = false;
    }

    this.bounds.forEach(function(bound) {
      if(typeof bound !== 'number') {
        console.error("Grabbable: Bound is not a number, cannot continue.");
        this.isDisabled = true;
      }
    });

    if(!this.isDisabled) {
      this.element.addEventListener('mousedown', this.onStart.bind(this), true);
      this.element.addEventListener('mouseup', this.onEnd.bind(this), true);
      document.addEventListener('mousemove', this.onMove.bind(this), true);
    }
  }

  private onMove(event: MouseEvent) {
    event.preventDefault();
    if(!this.isDisabled && this.isGrabbed) {
      var elementLeft = (event.clientX + this.offset[0] < this.bounds[3]) ? this.bounds[3] : (event.clientX + this.offset[0] > this.bounds[1]) ? this.bounds[1] : event.clientX + this.offset[0];
      var elementTop = (event.clientY + this.offset[1] < this.bounds[0]) ? this.bounds[0] : (event.clientY + this.offset[1] > this.bounds[2]) ? this.bounds[2] : event.clientY + this.offset[1];

      this.element.style.left = elementLeft + 'px';
      this.element.style.top  = elementTop + 'px';
    }
  }

  private onEnd(event: MouseEvent) {
    this.isGrabbed = false;
  }

  private onStart(event: MouseEvent) {
    this.isGrabbed = true;
    this.offset = [
        this.element.offsetLeft - event.clientX,
        this.element.offsetTop - event.clientY
    ];
  }

}
