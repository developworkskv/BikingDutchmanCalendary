import { Component, OnInit } from '@angular/core';
import { UserService } from 'app/_services/user.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { ToastService } from 'app/_services/toast.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {
  administrators: any;
  filterPost : any;
  adminForm: FormGroup;

  constructor(public _user: UserService,
    private formBuilder: FormBuilder,
    private toast: ToastService,
    ) { 
    this.getAll();    
  }

  ngOnInit() {
    this.crearFormularios();

    console.log(this.administrators);
    
  }
  // CRUD  
  // GET ALL ADMINS
  getAll(){
    this._user.getAllAdministrators().subscribe(data=> {
     //console.log(data["data"][0]);
      this.administrators = data["data"];
     // console.log(this.administrators);
      });
  }

  // CREATE
  // CREAR RUTA
  onSubmit(adminForm: NgForm){ // 
    // datos vacios en el formulario
    if (this.adminForm.invalid) {
      return this.toast.showNotification('top','right','danger','Completar los datos solicitados.');
    }
 //consumir servicio POST CrearRuta/id_usuario
 //let id_user:any =  localStorage.getItem('user_id');
 this._user.createAdmin(adminForm.value).subscribe(resp => {
     console.log(resp);
      if(resp['status'] == 1){
        this.toast.showNotification('top','right','success','Usuario Administrador registrado correctamente.');
        this.getAll();
        this.adminForm.reset(); 

      }else{
        this.toast.showNotification('top','right','danger','Ingresa los datos solicitados.');
      }
 }, err => {
   //this.toastr.error('Servicio Ejecutado', err['data']);
 });   
}


crearFormularios(){
  // Creamos el formulario  
  this.adminForm = this.formBuilder.group({
    name: ['', Validators.required],
    email: ['', Validators.required],
    password: ['', Validators.required],
    bd_organization_id: ['1', Validators.required],
    bd_type_users_id: ['1', Validators.required],
});

  // Creamos el formulario  
 /* this.rutaForm = this.formBuilder.group({
   nombre_ruta: ['', Validators.required],
   hora_ruta: ['', Validators.required],
   mes_ruta_id: ['', Validators.required]
});*/
}

}
