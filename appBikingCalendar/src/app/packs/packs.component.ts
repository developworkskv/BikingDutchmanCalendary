import { Component, OnInit, ViewChild } from "@angular/core";
import { DestinationService } from 'app/_services/destination.service';
import { TypePackagesService } from 'app/_services/type-packages.service';
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { ToastService } from 'app/_services/toast.service';
import { PackService } from 'app/_services/pack.service';
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { DataTableDirective } from 'angular-datatables';

@Component({
  selector: 'app-packs',
  templateUrl: './packs.component.html',
  styleUrls: ['./packs.component.scss']
})
export class PacksComponent implements OnInit {
  destinos: any;
  typesPackages:any;
  paquetes: any;
  packageForm: FormGroup;
  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  packs_select: any;

  @ViewChild(DataTableDirective, null)
  private _dtElement: DataTableDirective;

  public get dtElement(): DataTableDirective {
    return this._dtElement;
  }
  public set dtElement(value: DataTableDirective) {
    this._dtElement = value;
  }

  constructor(public _destinos: DestinationService,
    public _typePackages: TypePackagesService,
    private formBuilder: FormBuilder, 
    public toastService: ToastService,
    public _packs: PackService ) {
     }

     ngAfterViewInit() {
      // It is necesary to reload the datatable
    }
  ngOnInit() {
    this.getAllDestination();
    this.getAllTypesPackages();
    this.buildForm();
    this.buildOptionDatatable();
    this.getAllPaquetes();

  }
  buildOptionDatatable(){
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5
    };
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
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
      name: ["", Validators.required],
      id_type_packages: ["", Validators.required],
      price: ["", Validators.required],
      code: ["", Validators.required],
      numbers_passengers: ["", Validators.required],
      number_days: ["", Validators.required],
      longitud: ["", Validators.required],
      dificultad: ["", Validators.required],
      description: ["", Validators.required],
      description2: ["", Validators.required],
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
   // packageForm.value.id_destinations.forEach(id => {
      this._packs.createPack(packageForm.value, packageForm.value.id_destinations)
      .subscribe(
        (resp) => {
          if (resp["status"] == 1) {
            this.toastService.showNotification(
              "top",
              "right",
              "success",
              resp["data"]
            );
            packageForm.value.id_destinations.forEach(id => {
            this._packs.createPackDestinations(packageForm.value,id)
            .subscribe(
              (res)=>{
                if (res["status"] == 1) {
                  this.toastService.showNotification(
                    "top",
                    "right",
                    "success",
                    res["data"]
                  );
                }
              }
              );
            });

            this.getAllPaquetes();
            // NECESARIO.. volver actualizar la data y la datatable 
            this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
              // Destroy the table first
              dtInstance.destroy();
              // Call the dtTrigger to rerender again
            });
            this.packageForm.reset();
            this.buildForm();
            this.buildOptionDatatable();
  
          }else{
            this.toastService.showNotification(
              "top",
              "right",
              "danger",
              resp["data"]
            );
          }
        }
      ); 
   // });

  }
  getAllPaquetes(){
  
    this._packs.allPacks().subscribe((resp) => {
      //console.log("LOS PAQUETES" + resp["data"]);
      this.paquetes = resp["data"];
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

    });
  }

  deletePack(code_pak: any){

    if(confirm("Esta seguro de eliminar el paquete con código: " +code_pak)) {
      //console.log("Implement delete functionality here");
      this._packs.deletePack(code_pak).subscribe(
        resp=>{
          this.toastService.showNotification('top','right','success',resp['data']);
          this.getAllPaquetes();
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
