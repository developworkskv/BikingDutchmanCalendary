import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { ToastService } from 'app/_services/toast.service';
import { EmailsService } from 'app/_services/emails.service';


@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
 // VARIABLES DATA
  showAdminDashboard:boolean = false; 
  infoForm: FormGroup;

 constructor(private formBuilder: FormBuilder, private toast: ToastService,
            private _email: EmailsService){
    this.showDashboard();
 }
 ngOnInit(){
   this.crearFormularios();
 }

 onSubmit(infoForm){ // 
  console.log(infoForm);
    // datos vacios en el formulario
    if (this.infoForm.invalid) {
      return this.toast.showNotification('top','right','danger','Completar los datos solicitados.');
    }

    this._email.infoEmail(this.infoForm.value).subscribe(resp => {
      console.log(resp);
       if(resp['status'] == 1){
        this.infoForm.reset();
         this.toast.showNotification('top','right','success',resp['data']);
         }
    }, err => {
      this.toast.showNotification('top','right','danger','Error en servidor');
      
    });  


 }

 // show dashboard admin
 showDashboard(){
  if(localStorage.getItem('token_bd_users')){
    this.showAdminDashboard = true;
  }

 }  


 crearFormularios(){
  // Creamos el formulario  
  
  this.infoForm = this.formBuilder.group({
    email_user_cli: ['', Validators.required],
    status: ['', Validators.required],
    description: ['', Validators.required],

});

}

 }
