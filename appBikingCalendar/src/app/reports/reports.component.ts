import { Component, OnInit } from '@angular/core';
import { ReportsService } from 'app/_services/reports.service';
import { ToastService } from 'app/_services/toast.service';
import { LoginService } from 'app/_services/login.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';

@Component({
  selector: 'app-reports',
  templateUrl: './reports.component.html',
  styleUrls: ['./reports.component.scss']
})
export class ReportsComponent implements OnInit {
  urltoDownload: any;
  reportForm: FormGroup;

  constructor(public _report: ReportsService,private toast: ToastService,private formBuilder: FormBuilder,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
   }

  ngOnInit() {
    const id_org = localStorage.getItem('bd_org');
    this.crearFormularios();
  }

 

  onSubmit(adminForm){ // 
    console.log(adminForm);
    
    // datos vacios en el formulario
    if (this.reportForm.invalid) {
      return this.toast.showNotification('top','right','danger','Completar los datos solicitados.');
    }
 //consumir servicio POST CrearRuta/id_usuario
 //let id_user:any =  localStorage.getItem('user_id');
    this._report.getReportDestination(this.reportForm.value).subscribe(resp => {
     console.log(resp);
     
        this.toast.showNotification('top','right','success','Reporte generado correctamente.');
        
 }, err => {
   this.toast.showNotification('top','right','danger','Error en servidor');
   
 });   
}

  crearFormularios(){
    // Creamos el formulario  
    
    this.reportForm = this.formBuilder.group({
      value: ['', Validators.required],
      begin_date: ['', Validators.required],
      end_date: ['', Validators.required],

  });
  
  }

}
