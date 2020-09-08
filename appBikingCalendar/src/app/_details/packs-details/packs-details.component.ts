import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, NgForm, Validators } from '@angular/forms';
import { ActivatedRoute, Router, Params } from '@angular/router';
import { ToastService } from 'app/_services/toast.service';
import { PackService } from 'app/_services/pack.service';

@Component({
  selector: 'app-packs-details',
  templateUrl: './packs-details.component.html',
  styleUrls: ['./packs-details.component.scss']
})
export class PacksDetailsComponent implements OnInit {

  packsA: any;
  packsForm: FormGroup;
  id_org = localStorage.getItem("id_org");
  packs: any;
  packsId:number;

  constructor(
    private route:ActivatedRoute,
    private toast: ToastService,
    private formBuilder: FormBuilder,
    private _packs: PackService,
    public router: Router
  ) { }

  ngOnInit() {

    //OBTENER PARAMETROS "DATOS"
    this.route.params.subscribe(
      (param: Params) =>{
        //console.log(param);
        
        const idPacks = param.id_packs;
        //consumir servicio Packs by ID
        this._packs.getPacksByCodePacks(idPacks).subscribe(
          resp=>{
            //console.log(resp);
            if(resp['status'] == 1){
              this.packsA = resp['data'][0];
              console.log("DATA Details: " + JSON.stringify(this.packsA));
              this.crearFormularioPacks();

            }
          }
        );        
      }
    );

  }
  crearFormularioPacks(){
    //CARGAR LOS DATOS Q QUERMEOS MODIFICAR;
    // Creamos el formulario  
    this.packsForm = this.formBuilder.group({
    
      codigoPack: [this.packsA['codigoPack'], Validators.required],  
    nombrePack: [this.packsA['nombrePack'], Validators.required],
    price: [this.packsA['price'], Validators.required],
    numbers_passengers: [this.packsA['numbers_passengers'], Validators.required],
    difficulty: [this.packsA['difficulty'], Validators.required],
    length: [this.packsA['length'], Validators.required],
    number_days: [this.packsA['number_days'], Validators.required],
    description1: [this.packsA['description1'], Validators.required],
    description2: [this.packsA['description2'], Validators.required],
    destino: [this.packsA['destino'], Validators.required],
    ciudad: [this.packsA['ciudad'], Validators.required],
    tipoPack: [this.packsA['tipoPack'], Validators.required],
    

      
  });
}
// EDITAR packs
onSubmit(packsForm: NgForm){ // 
  console.log(packsForm);
}

}
