import { Component} from '@angular/core';
import { UserService } from './_services/user.service';
import { LoginService } from './_services/login.service';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  constructor( private _login: LoginService) {
    console.log("SOY EL CONSTRUCTOR Y VOY A VALIDAR");
        // VERIFICAR SI EL TOKEN EMAIL es correcto con algun administrador usuario
    // Llmara datos del usuario en linea
    // existe muestra la pantalla 
    // no existe elimina todo de mi localStorage
    // windows reload.
    this._login.sesionActive( localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org') )
    .subscribe(
      resp =>{
       // console.log("USER EN SESION " + JSON.stringify(resp['data']['token']));
        if(localStorage.getItem('token_bd_users') == resp['data']['token']){
          console.log("SESION ACTIVA - usuario admin online");
        
        }else{
          console.log("NO EXISTE EL TOKEN DEL USUARIO, o no es correcto");
          localStorage.clear();
          window.location.reload();
        }
      }
    )

   
  }
  
      ngOnInit() {
      }

}
