import { Component, OnInit } from '@angular/core';
import { LoginService } from 'app/_services/login.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-notifications',
  templateUrl: './notifications.component.html',
  styleUrls: ['./notifications.component.scss']
})
export class NotificationsComponent implements OnInit {

  constructor(public _login: LoginService) {
    // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));
  }
  ngOnInit() {
  }
}
