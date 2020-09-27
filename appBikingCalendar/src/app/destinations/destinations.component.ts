import { Component, OnInit, ViewChild } from "@angular/core";
import { FormGroup, FormBuilder, Validators, NgForm } from "@angular/forms";
import { ToastService } from "app/_services/toast.service";
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { DestinationService } from "app/_services/destination.service";
import { DataTableDirective } from 'angular-datatables';
import { CitiesService } from "app/_services/cities.service";
import { LoginService } from "app/_services/login.service";

@Component({
  selector: 'app-destinations',
  templateUrl: './destinations.component.html',
  styleUrls: ['./destinations.component.scss']
})
export class DestinationsComponent implements OnInit {

  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  id_org = localStorage.getItem("bd_org");
  destinoForm: FormGroup;
  destinos: any;
  cities_select: any;
  
  @ViewChild(DataTableDirective, null)
  private _dtElement: DataTableDirective;

  public get dtElement(): DataTableDirective {
    return this._dtElement;
  }
  public set dtElement(value: DataTableDirective) {
    this._dtElement = value;
  }


  constructor(
    private formBuilder: FormBuilder,
    public toastService: ToastService,
    public _destinos: DestinationService,
    public _cities: CitiesService,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
    this.getAllCitiesSelect();
    this.id_org = localStorage.getItem("bd_org");
  }

  ngOnInit() {
    this.getAllDestination();
    this.buildForm();
    this.buildOptionDatatable();
    this.getAllCitiesSelect();
    this.id_org = localStorage.getItem("bd_org");

  }
  buildOptionDatatable(){
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5
    };
  }

  buildForm() {
    this.destinoForm = this.formBuilder.group({
      
      name: ["", Validators.required],
      id_city:[ /*Valor Integer*/, Validators.required],
      availability: [/*Valor Integer*/ , Validators.required],
      description1: ["", Validators.required],
      description2: ["", Validators.required],
      
    });
  }


  onSubmit(destinoForm){ // 
    console.log(destinoForm);
    if (this.destinoForm.invalid) {
      this.destinoForm.reset();
      return this.toastService.showNotification(
        "top",
        "right",
        "danger",
        "Completar los datos solicitados."
      );
    }
    this._destinos.createDestination(destinoForm.value).subscribe(
      (resp) => {
        console.log(resp);
        if (resp["status"] == 1) {
          this.toastService.showNotification(
            "top",
            "right",
            "success",
            resp["data"]
          );
          this.getAllDestination();
          // NECESARIO.. volver actualizar la data y la datatable 
        this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
          // Destroy the table first
          dtInstance.destroy();
          // Call the dtTrigger to rerender agains
        });
          this.destinoForm.reset(); 
          this.buildForm();
          this.buildOptionDatatable();

        } else {
          this.toastService.showNotification(
            "top",
            "right",
            "danger",
            resp["data"]
          );
        }
      },
      (err) => {
        this.toastService.showNotification(
          "top",
          "right",
          "danger",
          "Información incorrecta"
        );
      }
    );

}

  getAllDestination() {
    this._destinos.readAllDestinations().subscribe((resp) => {
      
      this.destinos = resp["data"];
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

    });
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }
  deleteDestinos(idDestino, name) {
    if(confirm("Esta seguro de eliminar el destino: "+name)) {
      this._destinos
      .deleteDestination(idDestino)
      .subscribe((resp) => {
        this.toastService.showNotification(
          "top",
          "right",
          "danger",
          resp["data"]
        );
            // NECESARIO.. volver actualizar la data y la datatable 
            this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
              // Destroy the table first
              dtInstance.destroy();
              // Call the dtTrigger to rerender again
              this.getAllDestination();
            });
        
      });
    }
    
  }

  getAllCitiesSelect(){
    this._cities.getAllCities().subscribe((resp) => {
      this.cities_select = resp["data"];
     // this.dtTrigger.next(); // Alwas necesary to storing or read to datatables
    });
  }
}
