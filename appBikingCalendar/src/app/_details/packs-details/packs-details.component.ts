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
        this._packs.getPacksById(idPacks).subscribe(
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
    
    code_pack_destination: [this.packsA['code_pack_destination'], Validators.required],  
    name: [this.packsA['name'], Validators.required],
    price: [this.packsA['price'], Validators.required],
    numbers_passengers: [this.packsA['numbers_passengers'], Validators.required],
    difficulty: [this.packsA['difficulty'], Validators.required],
    length: [this.packsA['length'], Validators.required],
    //number_days: [this.packsA['number_days'], Validators.required],
      
  });
}
// EDITAR packs
onSubmit(packsForm: NgForm){ // 
  console.log(packsForm);
}

}
