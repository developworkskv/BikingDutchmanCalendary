import { Component, OnInit} from '@angular/core';
import { UserService } from './_services/user.service';
import { LoginService } from './_services/login.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  
  constructor( private _login: LoginService,  private router: Router) {
    // VERIFICAR SI EL TOKEN EMAIL es correcto con algun administrador usuario
    //validar si existe algo en LOCAL STORAGE

    this._login.sesionActive( localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org') );
   

}
  ngOnInit() {

      }

}
