import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
import { ToastService } from './toast.service';
import { Router } from '@angular/router';
@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(public http: HttpClient, public toastService: ToastService,private router: Router) { }

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
      localStorage.setItem('bd_org', resp[0]['bd_organization_id']);
   //  localStorage.setItem('bd_org', resp[0]['email']);
      window.location.reload();
      
    });

  }
  // VALIDACION DE RUTAS CUANDO EL USUARIO ESTE ACTIVO o INACTIVO
  sesionActive( token, id_org ){
    if(localStorage.getItem('token_bd_users') && localStorage.getItem('token_bd_users') ){
      return this.http.get(URL_SERVICIOS + '/sesion/' + token + '/'+ id_org)
    .subscribe(
      resp =>{
       // console.log("USER EN SESION " + JSON.stringify(resp['data']['token']));
        if(localStorage.getItem('token_bd_users') == resp['data']['token']){
          console.log("SESION ACTIVA");
        
        }else{
          console.log("SESION INACTIVA - servidor");
          localStorage.clear();
          window.location.reload();
        }
      }
    )
    }else{
      this.router.navigate(['/','login']);
      console.log("SESION INACTIVA ");
    }
 }

  }


