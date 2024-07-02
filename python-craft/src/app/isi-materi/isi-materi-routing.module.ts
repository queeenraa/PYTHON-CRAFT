import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { IsiMateriPage } from './isi-materi.page';

const routes: Routes = [
  {
    path: '',
    component: IsiMateriPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class IsiMateriPageRoutingModule {}
