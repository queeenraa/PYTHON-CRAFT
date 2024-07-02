import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-materi',
  templateUrl: './materi.page.html',
  styleUrls: ['./materi.page.scss'],
})
export class MateriPage implements OnInit {
  constructor() {}

  ngOnInit() {}

  accordionGroupChange(event: any) {
    console.log('Accordion changed:', event);
  }
}
