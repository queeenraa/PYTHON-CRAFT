// src/app/register/register.page.ts
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../service.service'; // Sesuaikan path sesuai dengan struktur proyek Anda
import { Router } from '@angular/router';
@Component({
  selector: 'app-register',
  templateUrl: './register.page.html',
  styleUrls: ['./register.page.scss'],
})
export class RegisterPage implements OnInit {
  name: string = '';
  email: string = '';
  password: string = '';
  confirmPassword: string = '';

  constructor(private apiService: ApiService, private router: Router) {}

  ngOnInit() {}

  async register() {
    if (this.password !== this.confirmPassword) {
      alert('Passwords do not match!');
      return;
    }

    const data = {
      name: this.name,
      email: this.email,
      password: this.password,
    };

    try {
      const response = await this.apiService.postData('register', data);
      console.log('Registration successful:', response);
      this.router.navigate(['/login']);
    } catch (error) {
      console.error('Registration error:', error);
    }
  }
  login() {
    this.router.navigate(['/login']);
  }
}
