import { Component, OnInit } from '@angular/core';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-quiz',
  templateUrl: './quiz.page.html',
  styleUrls: ['./quiz.page.scss'],
})
export class QuizPage implements OnInit {
  selectedAnswer: string = '';
  validationMessage: string = '';
  isAnswerCorrect: boolean = false;
  answers: { label: string; value: string }[] = [
    { label: 'Jawaban A', value: 'A' },
    { label: 'Jawaban B', value: 'B' },
    { label: 'Jawaban C', value: 'C' },
    { label: 'Jawaban D', value: 'D' },
  ];
  correctAnswer: string = 'A'; // Example correct answer

  constructor(private cdr: ChangeDetectorRef) {}

  ngOnInit() {}

  selectAnswer(answer: string) {
    this.selectedAnswer = answer;
    this.cdr.detectChanges(); // Manually trigger change detection
  }

  checkAnswer() {
    if (this.selectedAnswer) {
      this.isAnswerCorrect = this.selectedAnswer === this.correctAnswer;
      this.validationMessage = this.isAnswerCorrect
        ? 'Jawaban Benar'
        : 'Jawaban Salah';
    } else {
      alert('Please select an answer before checking.');
    }
  }
}
