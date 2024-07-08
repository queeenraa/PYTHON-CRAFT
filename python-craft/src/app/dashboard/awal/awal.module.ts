import { IonicModule } from '@ionic/angular';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { AwalPageRoutingModule } from './awal-routing.module';
import { AwalPage } from './awal.page';

@NgModule({
  imports: [IonicModule, CommonModule, FormsModule, AwalPageRoutingModule],
  declarations: [AwalPage],
})
export class AwalPageModule {}
