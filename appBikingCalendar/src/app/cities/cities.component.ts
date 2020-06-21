import { Component, OnInit, ViewChild } from "@angular/core";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { ToastService } from "app/_services/toast.service";
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { DataTableDirective } from 'angular-datatables';
import { CitiesService } from "app/_services/cities.service";
import { DestinationService } from "app/_services/destination.service";
import { LoginService } from "app/_services/login.service";

@Component({
  selector: 'app-cities',
  templateUrl: './cities.component.html',
  styleUrls: ['./cities.component.scss']
})
export class CitiesComponent implements  OnInit {
  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  id_org = localStorage.getItem("bd_org");
  cityForm: FormGroup;
  cities: any;
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
    public _cities: CitiesService,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
      this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));
    }
  ngOnInit() {
    this.getAll();
    this.buildForm();
    this.buildOptionDatatable();
  }
  buildOptionDatatable(){
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5
    };
  }

  buildForm() {
    this.cityForm = this.formBuilder.group({
      name: ["", Validators.required],
      description: ["", Validators.required],
    });
  }

  onSubmit(cityForm) {
    // Crea una FormGroupinstancia de nivel superior y la vincula a un formulario para rastrear el valor agregado del formulario y el estado de validación
    // datos vacios en el formulario
    if (this.cityForm.invalid) {
      this.cityForm.reset();
      return this.toastService.showNotification(
        "top",
        "right",
        "danger",
        "Completar los datos solicitados."
      );
    }
    //consumir servicio POST Login
    this._cities.createCity(cityForm.value).subscribe(
      (resp) => {
        console.log(resp);
        if (resp["status"] == 1) {
          this.toastService.showNotification(
            "top",
            "right",
            "success",
            resp["data"]
          );
          this.getAll();
          // NECESARIO.. volver actualizar la data y la datatable 
        this.dtElement.dtInstance.then((dtInstance: DataTables.Api) => {
          // Destroy the table first
          dtInstance.destroy();
          // Call the dtTrigger to rerender again
        });
          this.cityForm.reset();
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

  getAll() {
    this._cities.getAllCities().subscribe((resp) => {
      console.log(resp["data"]);
      this.cities = resp["data"];
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

    });
  }


  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }
  deleteCity(idTypePackage, idOrg, name) {
    if(confirm("Esta seguro de eliminar la ciudad:"+name)) {
      this._cities
      .deleteCity(idTypePackage, idOrg)
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
          this.getAll();
        });
      });
    }
   
  }

}
