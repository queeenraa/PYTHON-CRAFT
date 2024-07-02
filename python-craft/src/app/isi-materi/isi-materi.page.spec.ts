import { ComponentFixture, TestBed } from '@angular/core/testing';
import { IsiMateriPage } from './isi-materi.page';

describe('IsiMateriPage', () => {
  let component: IsiMateriPage;
  let fixture: ComponentFixture<IsiMateriPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(IsiMateriPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
