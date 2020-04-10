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
                          this.toastService.showNotification('top','right','danger',resp['data']);
                          break;
                        case 1:
                          let email_user = this.datosUserLogueado(user['email']);
                          this.toastService.showNotification('top','right','success',resp['data']);
                          break;
                     
                      }

                    });

  }
 // GUARDAR DATOS DEL USUARIO EN LOCALSTORAGE
  datosUserLogueado(email_user){
    return this.http.get(URL_SERVICIOS + '/dataUserByEmail/'+email_user)
    .subscribe(resp => {
      console.log(resp);
      localStorage.setItem('token_bd_users', resp[0]['token']);
      window.location.reload();
      
    });

  }
}

