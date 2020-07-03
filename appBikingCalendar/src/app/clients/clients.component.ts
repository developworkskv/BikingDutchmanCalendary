import { Component, OnInit } from '@angular/core';
import { LoginService } from 'app/_services/login.service';

@Component({
  selector: 'app-clients',
  templateUrl: './clients.component.html',
  styleUrls: ['./clients.component.scss']
})
export class ClientsComponent implements OnInit {

  constructor(public _login: LoginService) {
    // VERIFICAR SESION DEL USUARIO
  this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
}

  ngOnInit() {
  }

}
