import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {
  constructor() {}

  ngOnInit() {}

  //login() {
  // axios
  // .post('/login', {
  //email: 'laura@mail.com',
  //password: 'laura',
  //})
  // .then((res) => {
  //200, 201

  // alert(res.message);
  // localStorage.setItem('token', res.token);
  //})
  //.catch((err) => {
  //404, 500, 401, 422
  //alert(err.message);
  //});
  //}
}
