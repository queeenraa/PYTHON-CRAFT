import { ComponentFixture, TestBed } from '@angular/core/testing';
import { AwalPage } from './awal.page';

describe('AwalPage', () => {
  let component: AwalPage;
  let fixture: ComponentFixture<AwalPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(AwalPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
