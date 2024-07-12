// src/app/pages/isi-materi/isi-materi.page.ts
import { Component, AfterViewInit, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../service.service';

@Component({
  selector: 'app-isi-materi',
  templateUrl: './isi-materi.page.html',
  styleUrls: ['./isi-materi.page.scss'],
})
export class IsiMateriPage implements AfterViewInit, OnInit {
  isLastSlide: boolean = false;
  lessonData: any;

  constructor(private router: Router, private apiService: ApiService) {}

  async ngOnInit() {
    const selectedLearnData = localStorage.getItem('selectedLearnData');
    if (selectedLearnData) {
      const data = JSON.parse(selectedLearnData);
      if (data.type === 'materi' && data.subIndex) {
        try {
          this.lessonData = await this.apiService.getLessonById(data.subIndex);
          console.log('Lesson Data:', this.lessonData);
        } catch (error) {
          console.error('Error fetching lesson data:', error);
        }
      }
    }
  }

  ngAfterViewInit() {
    const swiperContainer = document.querySelector('swiper-container') as any;
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.on('slideChange', () => {
        this.onSlideChange(swiperContainer.swiper);
      });
    }
  }

  params = {
    // array with CSS styles
    injectStyles: [
      `
      .swiper-pagination-bullet {
        margin-bottom: -5px;
        width: 20px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        font-size: 12px;
        color: #000;
        opacity: 1;
        background: rgba(0, 0, 0, 0.2);
      }
      `,
    ],
  };

  slideNext() {
    const swiperContainer = document.querySelector('swiper-container') as any;
    if (swiperContainer && swiperContainer.swiper) {
      swiperContainer.swiper.slideNext();
    }
  }

  continueToQuiz() {
    this.router.navigate(['/quiz']);
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
}
