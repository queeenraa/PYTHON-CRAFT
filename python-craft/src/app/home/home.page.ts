import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {
  constructor() {}

  slideNext() {
    const swiper = document.querySelector('swiper-container') as any;
    if (swiper) {
      swiper.swiper.slideNext();
    }
  }

  slidePrev() {
    const swiper = document.querySelector('swiper-container') as any;
    if (swiper) {
      swiper.swiper.slidePrev();
    }
  }
}
