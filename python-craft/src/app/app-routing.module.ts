// src/app/app-routing.module.ts
import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './guards/auth.guard';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full',
  },
  {
    path: 'awal',
    loadChildren: () =>
      import('./dashboard/awal/awal.module').then((m) => m.AwalPageModule),
    canActivate: [AuthGuard],
  },
  {
    path: 'home',
    loadChildren: () =>
      import('./home/home.module').then((m) => m.HomePageModule),
    canActivate: [AuthGuard],
  },
  {
    path: 'login',
    loadChildren: () =>
      import('./login/login.module').then((m) => m.LoginPageModule),
  },
  {
    path: 'register',
    loadChildren: () =>
      import('./register/register.module').then((m) => m.RegisterPageModule),
  },
  {
    path: 'start',
    loadChildren: () =>
      import('./start/start.module').then((m) => m.StartPageModule),
    canActivate: [AuthGuard],
  },
  {
    path: 'get-started',
    loadChildren: () =>
      import('./get-started/get-started.module').then(
        (m) => m.GetStartedPageModule
      ),
    canActivate: [AuthGuard],
  },
  {
    path: 'materi',
    loadChildren: () =>
      import('./materi/materi.module').then((m) => m.MateriPageModule),
    canActivate: [AuthGuard],
  },
  {
    path: 'isi-materi',
    loadChildren: () =>
      import('./isi-materi/isi-materi.module').then(
        (m) => m.IsiMateriPageModule
      ),
    canActivate: [AuthGuard],
  },
  {
    path: 'quiz',
    loadChildren: () =>
      import('./quiz/quiz.module').then((m) => m.QuizPageModule),
    canActivate: [AuthGuard],
  },
  {
    path: 'profile',
    loadChildren: () =>
      import('./profile/profile.module').then((m) => m.ProfilePageModule),
    canActivate: [AuthGuard],
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
  ],
  exports: [RouterModule],
})
export class AppRoutingModule {}
