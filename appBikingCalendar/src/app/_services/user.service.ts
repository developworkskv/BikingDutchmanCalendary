import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  isLoggin: boolean = false;

  constructor(public htpp: HttpClient) {
    console.log('User Service Active');
     this.getUsers();// TEST
     this.isLogginUser();

   }

   // Determinar Si el usuario esta logeado, LOCALSTORAGE
   isLogginUser(){
     if(localStorage.getItem('token_sesion')){
      this.isLoggin = true;
     }
   }

   getUsers(){ // TEST
     console.log( this.htpp.get( URL_SERVICIOS+'/conexionApiTest')
     .subscribe(data=> {
      console.log(data);
      
     })
     );
     
    
   }

}
