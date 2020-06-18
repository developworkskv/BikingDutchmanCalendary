import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, ParamMap, Params } from '@angular/router';
import { ToastService } from 'app/_services/toast.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { TypePackagesService } from 'app/_services/type-packages.service';
import {Location} from '@angular/common';

@Component({
  selector: 'app-type-packages-details',
  templateUrl: './type-packages-details.component.html',
  styleUrls: ['./type-packages-details.component.scss']
})
export class TypePackagesDetailsComponent implements OnInit {

  typeP:any;
  typePackagesDetailsForm:FormGroup;
  id_org = localStorage.getItem("id_org");
  typePa:any;
  TypePackagesId:number;
  numberId: number = 1;

  constructor(private route:ActivatedRoute,
    private toast: ToastService,
    private formBuilder: FormBuilder,
    private _typePackages: TypePackagesService,
    public router: Router

  ) { 
    this.id_org = localStorage.getItem('bd_org');
    
  }

  ngOnInit() {
    //ARRANCAR PRIMERO EL FORMULARIO
    this.buildForm();
    //console.log("EN ONINIT");

    this.route.params.subscribe(
      (param: Params) =>{
        console.log(param);
        
        const idTypePackages = param.id_typePackages;
        //consumir servicio type_packages by ID
        this._typePackages.getTypePackageId(idTypePackages).subscribe(
          resp=>{

            console.log(resp);

            if(resp['status'] == 1){
              this.typeP = resp['data'][0];
              console.log("DATA Details: " + JSON.stringify(this.typeP));
            //  this.crearFormularioTypePackages();

            }
          }
        );        
      }
    );
      
  }
  
  buildForm() {
    this.typePackagesDetailsForm = this.formBuilder.group({
      name: ["", Validators.required],
      isActive: ["", Validators.required],
      description1: ["", Validators.required],
      description2: ["", Validators.required],
      value: ["", Validators.required],
      status: ["", Validators.required],
      //bd_organization_id: [localStorage.getItem("bd_org"), Validators.required],
    });
  }
  // EDITAR D
  onSubmit(typePackagesDetailsForm: NgForm){ // 
    console.log(typePackagesDetailsForm.value);
  
  }
}
