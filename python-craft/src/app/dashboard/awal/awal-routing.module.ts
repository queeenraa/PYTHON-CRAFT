import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { AwalPage } from './awal.page';

const routes: Routes = [
  {
    path: '',
    component: AwalPage,
    children: [
      {
        path: 'materi',
        loadChildren: () =>
          import('../../materi/materi.module').then((m) => m.MateriPageModule),
      },
      {
        path: 'profile',
        loadChildren: () =>
          import('../../profile/profile.module').then(
            (m) => m.ProfilePageModule
          ),
      },
    ],
  },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class AwalPageRoutingModule {}
