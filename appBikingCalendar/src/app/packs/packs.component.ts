import { Component, OnInit } from '@angular/core';
import { DestinationService } from 'app/_services/destination.service';
import { TypePackagesService } from 'app/_services/type-packages.service';
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { ToastService } from 'app/_services/toast.service';

@Component({
  selector: 'app-packs',
  templateUrl: './packs.component.html',
  styleUrls: ['./packs.component.scss']
})
export class PacksComponent implements OnInit {
  destinos: any;
  typesPackages:any;
  packageForm: FormGroup;

  constructor(public _destinos: DestinationService,
    public _typePackages: TypePackagesService,
    private formBuilder: FormBuilder, 
    public toastService: ToastService,) { }

  ngOnInit() {
    this.getAllDestination();
    this.getAllTypesPackages();
    this.buildForm();
  }

  // ******************* SELECTORS ******************
  getAllDestination() {
    this._destinos.readAllDestinations().subscribe((resp) => {
      
      this.destinos = resp["data"];
      console.log(this.destinos);

    });
  }
  getAllTypesPackages() {
    this._typePackages.getAllTypesPackages().subscribe((resp) => {
      console.log(resp["data"]);
      this.typesPackages = resp["data"];
      //this.dtTrigger.next(); // Alwas necesary to storing or read to datatables
    });
  }
  //******************************************* */

  buildForm() {
    this.packageForm = this.formBuilder.group({
      id_destinations: ["", Validators.required],
      nombre: ["", Validators.required],
      id_type_package: ["", Validators.required],
      price: ["", Validators.required],
      code: ["", Validators.required],
      number_passengers: ["", Validators.required],
      number_days: ["", Validators.required],
      longitud: ["", Validators.required],
      dificultad: ["", Validators.required],
      descripcion: ["", Validators.required],
      descripcion2: ["", Validators.required],
      //bd_organization_id: [localStorage.getItem("bd_org"), Validators.required],
    });
  }
  onSubmit(packageForm){
    if (this.packageForm.invalid) {
      //this.packageForm.reset();
      return this.toastService.showNotification(
        "top",
        "right",
        "danger",
        "Completar los datos solicitados."
      );
    }
    console.log(packageForm.value);
    

  }
}
