// src/app/pages/materi/materi.page.ts
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../service.service';

@Component({
  selector: 'app-materi',
  templateUrl: './materi.page.html',
  styleUrls: ['./materi.page.scss'],
})
export class MateriPage implements OnInit {
  constructor(private apiService: ApiService, private router: Router) {}

  ngOnInit() {}

  navigateToPage(type: string, levelIndex: number, subIndex?: number) {
    const data = { type, levelIndex, subIndex };
    localStorage.setItem('selectedLearnData', JSON.stringify(data));

    if (type === 'materi') {
      this.router.navigate(['/isi-materi']);
    } else if (type === 'quiz') {
      this.router.navigate(['/quiz']);
    }
  }

  accordionGroupChange(event: any) {
    console.log('Accordion changed:', event);
  }
}
