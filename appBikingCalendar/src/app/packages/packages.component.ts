import { Component, OnInit } from "@angular/core";
import { FormGroup, FormBuilder, Validators } from "@angular/forms";
import { ToastService } from "app/_services/toast.service";
import { TypePackagesService } from "app/_services/type-packages.service";

@Component({
  selector: "app-packages",
  templateUrl: "./packages.component.html",
  styleUrls: ["./packages.component.scss"],
})
export class PackagesComponent implements OnInit {
  id_org = localStorage.getItem("bd_org");
  typePackageForm: FormGroup;
  typesPackages: any;

  constructor(
    private formBuilder: FormBuilder,
    public toastService: ToastService,
    public _typePackages: TypePackagesService
  ) {}

  ngOnInit() {
    this.getAll();
    this.buildForm();
  }

  buildForm() {
    this.typePackageForm = this.formBuilder.group({
      name: ["", Validators.required],
      description: ["", Validators.required],
      description2: ["", Validators.required],
      //bd_organization_id: [localStorage.getItem("bd_org"), Validators.required],
    });
  }

  onSubmit(typePackageForm) {
    // Crea una FormGroupinstancia de nivel superior y la vincula a un formulario para rastrear el valor agregado del formulario y el estado de validación
    // datos vacios en el formulario
    if (this.typePackageForm.invalid) {
      this.typePackageForm.reset();
      return this.toastService.showNotification(
        "top",
        "right",
        "danger",
        "Completar los datos solicitados."
      );
    }
    //consumir servicio POST Login
    this._typePackages.createTypePackage(typePackageForm.value).subscribe(
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
          this.typePackageForm.reset();
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
    this._typePackages.getAllTypesPackages().subscribe((resp) => {
      console.log(resp["data"]);

      this.typesPackages = resp["data"];
    });
  }

  deleteTypePackage(idTypePackage, idOrg) {
    this._typePackages
      .deleteTypesPackages(idTypePackage, idOrg)
      .subscribe((resp) => {
        this.toastService.showNotification(
          "top",
          "right",
          "success",
          resp["data"]
        );
        this.getAll();
      });
  }
}
