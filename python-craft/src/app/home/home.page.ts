import { Component, AfterViewInit } from '@angular/core';
import {
  trigger,
  state,
  style,
  transition,
  animate,
} from '@angular/animations';
import { Router } from '@angular/router';
@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
  animations: [
    trigger('fadeInOut', [
      state(
        'void',
        style({
          opacity: 0,
        })
      ),
      transition(':enter', [
        // called when the element enters (added to the DOM)
        animate(
          '400ms ease-in',
          style({
            opacity: 1,
          })
        ),
      ]),
      transition(':leave', [
        // called when the element leaves (removed from the DOM)
        animate(
          '400ms ease-out',
          style({
            opacity: 0,
          })
        ),
      ]),
    ]),
  ],
})
export class HomePage implements AfterViewInit {
  isLastSlide: boolean = false;

  constructor(private router: Router) {}

  ngAfterViewInit() {
    const swiperContainer = document.querySelector('swiper-container') as any;
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.on('slideChange', () => {
        this.onSlideChange(swiperContainer.swiper);
      });
    }
  }

  slideNext() {
    const swiperContainer = document.querySelector('swiper-container') as any;
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.slideNext();
    }
  }

  skipToEnd() {
    const swiperContainer = document.querySelector('swiper-container') as any;
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.slideTo(swiperContainer.swiper.slides.length - 1);
    }
  }

  onSlideChange(swiper: any) {
    this.isLastSlide = swiper.isEnd;
  }
  ToLogin() {
    this.router.navigate(['/login']);
  }
}
