import { NgModule, CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { IsiMateriPageRoutingModule } from './isi-materi-routing.module';
import { IsiMateriPage } from './isi-materi.page';

@NgModule({
  imports: [CommonModule, FormsModule, IonicModule, IsiMateriPageRoutingModule],
  declarations: [IsiMateriPage],
  schemas: [CUSTOM_ELEMENTS_SCHEMA],
})
export class IsiMateriPageModule {}
