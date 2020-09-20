import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, NgForm } from '@angular/forms';
import { ActivatedRoute, Router, Params } from '@angular/router';
import { ToastService } from 'app/_services/toast.service';
import { ClientService } from 'app/_services/client.service';

@Component({
  selector: 'app-clients-details',
  templateUrl: './clients-details.component.html',
  styleUrls: ['./clients-details.component.scss']
})
export class ClientsDetailsComponent implements OnInit {

  clientA: any;
  clientFormDetails: FormGroup;
  id_org = localStorage.getItem("id_org");
  client: any;
  clientId: number;

  constructor(private route:ActivatedRoute,
    private toast: ToastService,
    private formBuilder: FormBuilder,
    private _clients: ClientService,
    private router: Router
    ) { }

  ngOnInit() {
     //OBTENER PARAMETROS "DATOS"
     this.route.params.subscribe(
      (param: Params) =>{
        //console.log(param);
        
        const idClient = param.id_client;
        //consumir servicio clients by id
        this._clients.getClientById(idClient).subscribe(
          resp=>{
            //console.log(resp);
            if(resp['status'] == 1){
              this.clientA = resp['data'][0];
              console.log("DATA Details: " + JSON.stringify(this.clientA));
              this.crearFormClient();

            }
          }
        );        
      }
    );
      
  }

  
  crearFormClient(){
    //CARGAR LOS DATOS Q QUERMEOS MODIFICAR;
    // Creamos el formulario  
    this.clientFormDetails = this.formBuilder.group({
    //DATOS PERSONA  
    name: [this.clientA['name'], Validators.required],
    lastName: [this.clientA['lastName'], Validators.required],
    email: [this.clientA['email'], Validators.required],
    description1: [this.clientA['description1'], Validators.required],
    birth_date: [this.clientA['birth_date'], Validators.required],
    dni: [this.clientA['dni'], Validators.required],
    gender: [this.clientA['gender'], Validators.required],


    //DATOS CLIENTE  
    nacionality: [this.clientA['nacionality'], Validators.required],
    height: [this.clientA['height'], Validators.required],
    weight: [this.clientA['weight'], Validators.required],
    passport: [this.clientA['passport'], Validators.required],
    descriptionC: [this.clientA['descriptionC'], Validators.required],
    descriptionC2: [this.clientA['descriptionC2'], Validators.required],

  });
}
  // EDITAR CLIENTE
  onSubmit(clientFormDetails: NgForm){ // 
    console.log(clientFormDetails);

    // datos vacios en el formulario
  /*if (this.clientFormDetails.invalid) {
    return this.toast.showNotification('top','right','danger','Completar los datos solicitados.');
  }
  //consumir servicio POST 
//let id_user:any =  localStorage.getItem('client_id');
this._clients.updateClientP(this.clientA.bd_clients_id, clientFormDetails.value)
.subscribe(resp => {
  console.log(resp);
   if(resp['status'] == 1){
     this.toast.showNotification('top','right','success','Cliente editado correctamente.');
     this._clients.getAllClient();
   }else{
     this.toast.showNotification('top','right','danger','Ingresa los datos solicitados.');
   }
}, err => {
//this.toastr.error('Servicio Ejecutado', err['data']);
});*/ 
  
  }
}
