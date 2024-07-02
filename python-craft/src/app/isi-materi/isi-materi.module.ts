import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { IsiMateriPageRoutingModule } from './isi-materi-routing.module';

import { IsiMateriPage } from './isi-materi.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    IsiMateriPageRoutingModule
  ],
  declarations: [IsiMateriPage]
})
export class IsiMateriPageModule {}
