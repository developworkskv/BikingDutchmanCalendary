import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
 
@Injectable({
  providedIn: 'root'
})
export class UserService {
  isLoggin: boolean = false;
  administrators: any;

  constructor(public htpp: HttpClient) {
    console.log('User Service Active');
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
     console.log( this.htpp.get( URL_SERVICIOS+'/conexionApiTest')
     .subscribe(data=> {
            console.log(data);
            
     })
     );
     
    
   }

   //CRUD 
   getAllAdministrators(){ // TEST
    return this.htpp.get( URL_SERVICIOS+'/adminRead');
    
  }
//CrEATE
  createAdmin(admin: any){
      return this.htpp.post(URL_SERVICIOS +'/adminCreate', admin)
  }
  //READ
  //getUserById
  detailsAdministrator(idAdmin: number){
    return this.htpp.get( URL_SERVICIOS+'/adminById/' + idAdmin);
  }
  //UPDATE
  updateAdmin(id_user, admin:any){
    return this.htpp.post( URL_SERVICIOS+'/admin/' +id_user+'/update', admin);
  }

  //DELETE
  deleteAdmin(id_person){
    return this.htpp.get( URL_SERVICIOS+'/adminDelete/' +id_person);
  }
  
}
