// src/app/login/login.page.ts
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../service.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  email: string = '';
  password: string = '';

  constructor(private apiService: ApiService, private router: Router) {}

  ngOnInit() {}

  async login() {
    const data = {
      email: this.email,
      password: this.password,
    };

    try {
      const response = await this.apiService.postData('login', data);
      console.log('Login successful:', response);
      // Redirect to 'awal' page after successful login
      this.router.navigate(['/awal']);
    } catch (error) {
      console.error('Login error:', error);
    }
  }
}
