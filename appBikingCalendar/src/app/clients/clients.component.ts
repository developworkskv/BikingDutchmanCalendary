import { LoginService } from 'app/_services/login.service';
import { Component, OnInit, AfterViewInit, ViewChild } from '@angular/core';
import { DataTableDirective } from 'angular-datatables';
import { Subject } from 'rxjs';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ClientService } from 'app/_services/client.service';
import { ToastService } from 'app/_services/toast.service';


@Component({
  selector: 'app-clients',
  templateUrl: './clients.component.html',
  styleUrls: ['./clients.component.scss']
})
export class ClientsComponent implements OnInit, AfterViewInit {
  @ViewChild(DataTableDirective, null)

  private _dtElement: DataTableDirective;
  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();

  clients: any = [];
  filterPost : any;
  clientForm: FormGroup;
  persons: any;
  id_org : any;

  public get dtElement(): DataTableDirective {
    return this._dtElement;
  }
  public set dtElement(value: DataTableDirective) {
    this._dtElement = value;
  }


  constructor(public _client: ClientService,
    private formBuilder: FormBuilder,
    private toastService: ToastService,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
  
    
    this.getAllC();
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
  //CRUD CONSUMIR API

  //GET ALL CLIENTS
  getAllC(){
    this._client.getAllClient().subscribe(data=> {
     //console.log(data["data"][0]);
      this.clients = data["data"];
      console.log(this.clients);
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

      });
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }


 //CREAR CLIENTS.
 onSubmit(clientForm){ // 
  console.log(clientForm);
  
  // datos vacios en el formulario
  if (this.clientForm.invalid) {
    return this.toastService.showNotification('top','right','danger','Completar los datos solicitados.');
  }
//consumir servicio POST CrearRuta/id_usuario
//let id_user:any =  localStorage.getItem('user_id');
this._client.createClient(clientForm.value).subscribe(resp => {
   console.log(resp);
    if(resp['status'] == 1){
      this.toastService.showNotification('top','right','success','Cliente registrado correctamente.');
      this.getAllC();
      // NECESARIO.. volver actualizar la data y la datatable 
      this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
        // Destroy the table first
        dtInstance.destroy();
        // Call the dtTrigger to rerender again
      });

      this.clientForm.reset(); 
      this.crearFormularios();

    }else{
      this.toastService.showNotification('top','right','danger','Error en datos ingresados.');
    }
}, err => {
 this.toastService.showNotification('top','right','danger','Error en servidor');
 
});   
}

crearFormularios(){
  // Creamos el formulario  
  
  this.clientForm = this.formBuilder.group({
    //FORM PARA PERSONA
    nameP: ['', Validators.required],
    lastNameP: ['', Validators.required],
    emailP: ['', Validators.required],
    fechaNacimientoP: ['', Validators.required],
    genderP: ['', Validators.required],
    dniP: ['', Validators.required],
    descriptionPersonP: ['', Validators.required],
    //FORM PARA CLIENTS
    nacionality: ['', Validators.required],
    height: ['', Validators.required],
    weight: ['', Validators.required],
    passport: ['', Validators.required],
    description1: ['', Validators.required],
   // description2: [null, Validators.required],
    //bd_persons_id: ['', Validators.required],

    //bd_organization_id: [localStorage.getItem('bd_org') , Validators.required],
    
});
}

//DELETE CLIENTS
deleteClients(idPerson){

    //if(confirm("Esta seguro de eliminar al Cliente:" +name)) {
      //console.log("Implement delete functionality here");
      this._client.deleteClient(idPerson).subscribe(
        resp=>{
          this.toastService.showNotification('top','right','success',resp['data']);
          this.getAllC();
          // NECESARIO.. volver actualizar la data y la datatable 
          this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
            // Destroy the table first
            dtInstance.destroy();
            // Call the dtTrigger to rerender again
          });
        }
      );
    //}
  }
}