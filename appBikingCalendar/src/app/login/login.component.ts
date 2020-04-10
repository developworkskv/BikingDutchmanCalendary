import { Component, OnInit } from '@angular/core';
import { Validators, FormGroup, FormBuilder, NgForm } from '@angular/forms';
import { LoginService } from 'app/_services/login.service';
import { ToastService } from '../_services/toast.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;

  constructor(public toastService: ToastService,
  public _login: LoginService,
  private formBuilder: FormBuilder,
  public router: Router ){ 
    this.userIsActive();
  }

  ngOnInit() {
    this.loginForm = this.formBuilder.group({
      email: ['', Validators.required],
      password: ['', Validators.required]
  });
  }
 
  onSubmit(loginForm){ // Crea una FormGroupinstancia de nivel superior y la vincula a un formulario para rastrear el valor agregado del formulario y el estado de validación
   
    // datos vacios en el formulario
    if (this.loginForm.invalid) {
     this.loginForm.reset();
     return this.toastService.showNotification('top','right','danger','Completar los datos solicitados.');
    }
    //consumir servicio POST Login
    this._login.iniciarSesion(loginForm.value);
    }

    // SESION USER 
  userIsActive(){
    if(localStorage.getItem('token_bd_users')){
      this.router.navigate(['dashboard']);
    }
  }

}
