// src/app/services/auth.service.ts
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor() {}

  // Simulasi pengecekan status login
  isLoggedIn(): boolean {
    return !!localStorage.getItem('userName'); // Sesuaikan dengan logika autentikasi Anda
  }
}
