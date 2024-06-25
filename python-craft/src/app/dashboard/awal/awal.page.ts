import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-awal',
  templateUrl: './awal.page.html',
  styleUrls: ['./awal.page.scss'],
})
export class AwalPage implements OnInit {
  public progress = 0;

  constructor() {}

  ngOnInit() {
    setInterval(() => {
      this.progress += 0.01;

      if (this.progress > 1) {
        setTimeout(() => {
          this.progress = 0;
        }, 1000);
      }
    }, 50);
  }
}
