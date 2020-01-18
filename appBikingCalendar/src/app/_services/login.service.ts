import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
import { ToastService } from './toast.service';
@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(public http: HttpClient, public toastService: ToastService,) { }

  iniciarSesion(user: any){
    return this.http.post(URL_SERVICIOS +'/iniciarSesion', user)
                    .subscribe( resp => {
                      console.log(resp);

                      switch (resp['status']) {
                        case 0:
                          //localStorage.removeItem('token_sesion');
                          break;
                        case 1:
                          // consumir servicio datos del usuario
                          let email_user = this.datosUserLogueado(user['email']);
                          //console.log(email_user);
                          break;
                     
                      }
                      return this.toastService.showNotification('top','right','success',resp['data']);
                    });
   // console.log( user);
    
  }

  datosUserLogueado(email_user){
    return this.http.get(URL_SERVICIOS + '/dataUserByEmail/'+email_user)
    .subscribe(resp => {
      console.log(resp);
      localStorage.setItem('user_token', resp[0]['id']);
      localStorage.setItem('token_sesion', resp[0]['id'] + resp[0]['email'] + resp[0]['password']);
      window.location.reload();
      
    });

  }
}

