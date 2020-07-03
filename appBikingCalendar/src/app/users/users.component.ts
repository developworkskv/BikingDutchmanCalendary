import { Component, OnInit, OnDestroy, ViewChild, AfterViewInit } from '@angular/core';
import { UserService } from 'app/_services/user.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { ToastService } from 'app/_services/toast.service';
import { TypeUsersService } from 'app/_services/type-users.service';
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { DataTableDirective } from 'angular-datatables';
import { LoginService } from 'app/_services/login.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit ,AfterViewInit {
  @ViewChild(DataTableDirective, null)
  private _dtElement: DataTableDirective;
  
  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();

  administrators: any;
  filterPost : any;
  adminForm: FormGroup;
  tipesUser: any;
  id_org: any;

  public get dtElement(): DataTableDirective {
    return this._dtElement;
  }
  public set dtElement(value: DataTableDirective) {
    this._dtElement = value;
  }
  constructor(public _user: UserService,
    private formBuilder: FormBuilder,
    private toast: ToastService,
    private _typeUser: TypeUsersService,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
    this.getAll();  
    this.typesAdmin();  
    this.id_org = localStorage.getItem('bd_org');

  }
  ngAfterViewInit() {
    // It is necesary to reload the datatable
  }

  ngOnInit() {
    this.crearFormularios();   
    this.buildOptionDatatable();
  }
  buildOptionDatatable(){
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5
    };
  }
  // CRUD  
  // GET ALL ADMINS
  getAll(){
    this._user.getAllAdministrators().subscribe(data=> {
     //console.log(data["data"][0]);
      this.administrators = data["data"];
      console.log(this.administrators);
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

      });
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }

  // CREATE
  // CREAR RUTA
  onSubmit(adminForm){ // 
    console.log(adminForm);
    
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
        // NECESARIO.. volver actualizar la data y la datatable 
        this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
          // Destroy the table first
          dtInstance.destroy();
          // Call the dtTrigger to rerender again
        });

        this.adminForm.reset(); 
        this.crearFormularios();

      }else{
        this.toast.showNotification('top','right','danger','Error en datos ingresados.');
      }
 }, err => {
   this.toast.showNotification('top','right','danger','Error en servidor');
   
 });   
}

//TIPES ADMIN
typesAdmin(){
  this._typeUser.getTypesUser().subscribe(
    resp=>{
      if( resp['status'] == 1){
        this.tipesUser = resp['data'];
        console.log(this.tipesUser);
        
      }
    }
  );
  
}


crearFormularios(){
  // Creamos el formulario  
  
  this.adminForm = this.formBuilder.group({
    tourId: ['', Validators.required],
    lastName: ['', Validators.required],
    email: ['', Validators.required],
    fechaNacimiento: ['', Validators.required],
    gender: ['', Validators.required],
    dni: ['', Validators.required],
    password: ['', Validators.required],
    bd_organization_id: [localStorage.getItem('bd_org') , Validators.required],
    bd_type_users_id: ['', Validators.required],
});

  // Creamos el formulario  
 /* this.rutaForm = this.formBuilder.group({
   nombre_ruta: ['', Validators.required],
   hora_ruta: ['', Validators.required],
   mes_ruta_id: ['', Validators.required]
});*/
}

//DELETE
deleteUserAdmin(idPerson: number, name: string){

    if(confirm("Esta seguro de eliminar al administrador:"+name)) {
      //console.log("Implement delete functionality here");
      this._user.deleteAdmin(idPerson).subscribe(
        resp=>{
          this.toast.showNotification('top','right','success',resp['data']);
          this.getAll();
          // NECESARIO.. volver actualizar la data y la datatable 
          this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
            // Destroy the table first
            dtInstance.destroy();
            // Call the dtTrigger to rerender again
          });
        }
      );
    }
  }

 


}
