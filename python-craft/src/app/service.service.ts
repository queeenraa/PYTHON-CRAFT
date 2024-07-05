// src/app/services/api.service.ts
import { Injectable } from '@angular/core';
import axios from 'axios';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  private apiUrl = 'https://pythoncraft.online/api'; // Ganti dengan URL API Anda

  constructor() {}

  // Contoh metode untuk melakukan panggilan GET
  async getData(endpoint: string) {
    try {
      const response = await axios.get(`${this.apiUrl}/${endpoint}`);
      return response.data;
    } catch (error) {
      console.error('Error fetching data:', error);
      throw error;
    }
  }

  // Contoh metode untuk melakukan panggilan POST
  async postData(endpoint: string, data: any) {
    try {
      const response = await axios.post(`${this.apiUrl}/${endpoint}`, data);
      return response.data;
    } catch (error) {
      console.error('Error posting data:', error);
      throw error;
    }
  }
}
