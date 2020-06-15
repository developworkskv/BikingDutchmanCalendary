import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, NgForm, Validators} from '@angular/forms';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { ToastService } from 'app/_services/toast.service';
import { CitiesService } from 'app/_services/cities.service';

@Component({
  selector: 'app-cities-details',
  templateUrl: './cities-details.component.html',
  styleUrls: ['./cities-details.component.scss']
})
export class CitiesDetailsComponent implements OnInit {

  cityA:any;
  cityForm: FormGroup;
  id_org = localStorage.getItem("id_org");
  city: any;
  CityId:number;

  constructor(private route:ActivatedRoute,
    private toast: ToastService,
    private formBuilder: FormBuilder,
    private _cities: CitiesService,
    public router: Router
    ) { 

    }

  ngOnInit() {
    //OBTENER PARAMETROS "DATOS"
    this.route.params.subscribe(
      (param: Params) =>{
        //console.log(param);
        
        const idCity = param.id_city;
        //consumir servicio cities by id
        this._cities.getCityId(idCity).subscribe(
          resp=>{
            //console.log(resp);
            if(resp['status'] == 1){
              this.cityA = resp['data'][0];
              console.log("DATA Details: " + JSON.stringify(this.cityA));
              this.crearFormularioCity();

            }
          }
        );        
      }
    );
      
  }
  
  crearFormularioCity(){
    //CARGAR LOS DATOS Q QUERMEOS MODIFICAR;
    // Creamos el formulario  
    this.cityForm = this.formBuilder.group({

    name: [this.cityA['name'], Validators.required],
    isActive: [this.cityA['isActive'], Validators.required],
    description: [this.cityA['description'], Validators.required],
    value: [this.cityA['value'], Validators.required],
    status: [this.cityA['status'], Validators.required],

  });
}

  // EDITAR D
  onSubmit(cityForm: NgForm){ // 
    console.log(cityForm);
  }
}
