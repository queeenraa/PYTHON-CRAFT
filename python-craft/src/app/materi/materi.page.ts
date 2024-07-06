// src/app/pages/materi/materi.page.ts
import { Component, OnInit } from '@angular/core';
import { ApiService } from '../service.service';

@Component({
  selector: 'app-materi',
  templateUrl: './materi.page.html',
  styleUrls: ['./materi.page.scss'],
})
export class MateriPage implements OnInit {
  courses: any[] = [];
  lessons: { [key: number]: any[] } = {};
  quizzes: { [key: number]: any[] } = {};

  constructor(private apiService: ApiService) {}

  async ngOnInit() {
    try {
      // Fetch all courses
      this.courses = await this.apiService.getAllCourses();
      console.log('Courses:', this.courses); // Debug log

      // Fetch lessons and quizzes for each course
      for (let course of this.courses) {
        const courseId = course.course_id;
        this.lessons[courseId] = await this.apiService.getAllLessons(courseId);
        console.log(`Lessons for course ${courseId}:`, this.lessons[courseId]); // Debug log

        this.quizzes[courseId] = await this.apiService.getAllQuizzes(courseId);
        console.log(`Quizzes for course ${courseId}:`, this.quizzes[courseId]); // Debug log
      }
    } catch (error) {
      console.error('Error fetching data:', error);
    }
  }

  accordionGroupChange(event: any) {
    console.log('Accordion changed:', event);
  }
}
