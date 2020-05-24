import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap, Params } from '@angular/router';
import { ToastService } from 'app/_services/toast.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { DestinationService } from "app/_services/destination.service";
import {Location} from '@angular/common';

@Component({
  selector: 'app-destinations-details',
  templateUrl: './destinations-details.component.html',
  styleUrls: ['./destinations-details.component.scss']
})
export class DestinationsDetailsComponent implements OnInit {

    DestinoA:any;
    destinoForm: FormGroup;
   // id_destination: any;
    id_destination = localStorage.getItem("bd_destination_id");
    destino: any;
    DestinoId: number;
    // COMPONENTE DE DETALLES DEL destino
    constructor(private route: ActivatedRoute,
       
       private toast: ToastService,
       private formBuilder: FormBuilder,
       private _destinos: DestinationService,
       public router: Router
       ) { 
        
       }
  
    ngOnInit() {
      // Obtener parametros
      this.route.params.subscribe(
        (param: Params) =>{
          console.log(param);
          
          const idDestino = param.id_destino;
          //consumir servicio detalles by id
          this._destinos.detailsDestinos(idDestino).subscribe(
            resp=>{
              //console.log(resp);
              if(resp['status'] == 1){
                this.DestinoA = resp['data'][0];
                console.log("DATA Details: " + JSON.stringify(this.DestinoA));
                this.crearFormularioD();
  
              }
            }
          );        
        }
      );
        
    }
  
  
  
    crearFormularioD(){
      //CARGAR LOS DATOS Q QUERMEOS MODIFICAR;
      // Creamos el formulario  
      this.destinoForm = this.formBuilder.group({
  
      name: [this.DestinoA['name'], Validators.required],
      availability: [this.DestinoA['availability'], Validators.required],
      isActive: [this.DestinoA['isActive'], Validators.required],
      description: [this.DestinoA['description'], Validators.required],
      description2: [this.DestinoA['description2'], Validators.required],
      value: [this.DestinoA['value'], Validators.required],
      status: [this.DestinoA['status'], Validators.required],
      
    
  
    });
  }
  
  
  
  // EDITAR D
  onSubmit(destinoForm: NgForm){ // 
    console.log(destinoForm);
    
    // datos vacios en el formulario
    if (this.destinoForm.invalid) {
      return this.toast.showNotification('top','right','danger','Completar los datos solicitados.');
    }
  //consumir servicio POST CrearRuta/id_usuario
  //let id_user:any =  localStorage.getItem('user_id');
  this._destinos.updateDestino(this.DestinoA.bd_destination_id, this.destinoForm.value).subscribe(resp => {
     console.log(resp);
      if(resp['status'] == 1){
        this.toast.showNotification('top','right','success','Destino editado correctamente.');
        this._destinos.readAllDestino();
      }else{
        this.toast.showNotification('top','right','danger','Ingresa los datos solicitados.');
      }
  }, err => {
   //this.toastr.error('Servicio Ejecutado', err['data']);
  });   
  }
  
  
  }