import { Component, OnInit } from '@angular/core';
import { UserService } from 'app/_services/user.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-user-profile',
  templateUrl: './user-profile.component.html',
  styleUrls: ['./user-profile.component.css']
})
export class UserProfileComponent implements OnInit {

  constructor(private _user: UserService, public router: Router) { 
    this.estadoSesion();

  }

  estadoSesion(){ // logueado o no logueado
    console.log("Usuario En sesion: "+this._user.isLoggin);
    if(this._user.isLoggin == false){
      // Usuario no registrado no hay nada en local stroage
      this.router.navigate(['login'])
    }
    // Usuario ACTIVO
  }
  ngOnInit(){}
  }