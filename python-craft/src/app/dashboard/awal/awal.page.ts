import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-awal',
  templateUrl: './awal.page.html',
  styleUrls: ['./awal.page.scss'],
})
export class AwalPage implements OnInit {
  public progress = 0;
  userName: string = '';

  constructor(private router: Router) {}

  ngOnInit() {
    setInterval(() => {
      this.progress += 0.01;

      if (this.progress > 1) {
        setTimeout(() => {
          this.progress = 0;
        }, 1000);
      }
    }, 50);
    this.userName = localStorage.getItem('userName') || 'Profile';
  }

  awal() {
    this.router.navigate(['/awal']);
  }

  materi() {
    this.router.navigate(['/materi']);
  }

  profile() {
    this.router.navigate(['/profile']);
  }
}
