// src/app/services/api.service.ts
import { Injectable } from '@angular/core';
import axios, { AxiosError } from 'axios';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  private apiUrl = 'https://pythoncraft.online/api'; // Ganti dengan URL API Anda

  constructor() {}

  // Metode untuk melakukan panggilan GET
  async getData(endpoint: string) {
    try {
      const url = `${this.apiUrl}/${endpoint}`;
      console.log('Fetching data from URL:', url); // Debug log
      const response = await axios.get(url);
      return response.data;
    } catch (error) {
      if (axios.isAxiosError(error)) {
        console.error(
          'Axios error fetching data:',
          error.response?.status,
          error.message
        );
        throw error;
      } else {
        console.error('Unknown error fetching data:', error);
        throw new Error('An unknown error occurred');
      }
    }
  }

  // Metode untuk melakukan panggilan POST
  async postData(endpoint: string, data: any) {
    try {
      const url = `${this.apiUrl}/${endpoint}`;
      console.log('Posting data to URL:', url, 'with data:', data); // Debug log
      const response = await axios.post(url, data);
      return response.data;
    } catch (error) {
      if (axios.isAxiosError(error)) {
        console.error(
          'Axios error posting data:',
          error.response?.status,
          error.message
        );
        throw error;
      } else {
        console.error('Unknown error posting data:', error);
        throw new Error('An unknown error occurred');
      }
    }
  }

  // Metode untuk mendapatkan semua courses dengan loop
  async getAllCourses() {
    const courses = [];
    let i = 1;
    while (true) {
      try {
        const response = await this.getData(`courses/${i}`);
        courses.push(response);
        i++;
      } catch (error) {
        if (axios.isAxiosError(error) && error.response?.status === 404) {
          // Berhenti jika mendapatkan error 404 (Not Found)
          break;
        } else {
          console.error('Error fetching course:', error);
          throw error;
        }
      }
    }
    return courses;
  }

  // Metode untuk mendapatkan semua lessons berdasarkan courseId dengan loop
  async getAllLessons(courseId: number) {
    const lessons = [];
    let i = 1;
    while (true) {
      try {
        const response = await this.getData(`lessons/${i}`);
        if (response.course_id === courseId) {
          lessons.push(response);
        }
        i++;
      } catch (error) {
        if (axios.isAxiosError(error) && error.response?.status === 404) {
          // Berhenti jika mendapatkan error 404 (Not Found)
          break;
        } else {
          console.error('Error fetching lesson:', error);
          throw error;
        }
      }
    }
    return lessons;
  }

  // Metode untuk mendapatkan semua quizzes berdasarkan courseId dengan loop
  async getAllQuizzes(courseId: number) {
    const quizzes = [];
    let i = 1;
    while (true) {
      try {
        const response = await this.getData(`quizzes/${i}`);
        if (response.course_id === courseId) {
          quizzes.push(response);
        }
        i++;
      } catch (error) {
        if (axios.isAxiosError(error) && error.response?.status === 404) {
          // Berhenti jika mendapatkan error 404 (Not Found)
          break;
        } else {
          console.error('Error fetching quiz:', error);
          throw error;
        }
      }
    }
    return quizzes;
  }
}
