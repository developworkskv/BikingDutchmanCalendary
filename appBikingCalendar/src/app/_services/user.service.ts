import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  isLoggin: boolean = false;
  administrators: any;


  constructor(public htpp: HttpClient) {
     this.testConexion();// TEST
     this.isLogginUser();
   }

   // Determinar Si el usuario esta logeado, LOCALSTORAGE
   isLogginUser(){
     if(localStorage.getItem('token_bd_users')){
      this.isLoggin = true;
      console.log(this.isLoggin);
      
     }
   }

   testConexion(){ // TEST
    this.htpp.get( URL_SERVICIOS+'/conexionApiTest')
     .subscribe(data=> {
            console.log(data);
            
     });

   }

   //CRUD 
   getAllAdministrators(){ // TEST
    return this.htpp.get( URL_SERVICIOS+'/adminRead/'+localStorage.getItem('bd_org'));
    
  }
//CrEATE
  createAdmin(admin: any){
      return this.htpp.post(URL_SERVICIOS +'/adminCreate', admin)
  }
  //READ
  //getUserById
  detailsAdministrator(idAdmin: number){
    return this.htpp.get( URL_SERVICIOS+'/adminById/' + idAdmin + '/'+localStorage.getItem('bd_org'));
  }
  //UPDATE
  updateAdmin(id_user, admin:any){
    return this.htpp.post( URL_SERVICIOS+'/admin/' +id_user+'/update'+ '/'+localStorage.getItem('bd_org'), admin);
  }

  //DELETE
  deleteAdmin(id_person){
    return this.htpp.get( URL_SERVICIOS+'/adminDelete/' +id_person + '/'+localStorage.getItem('bd_org'));
  }
  
}
