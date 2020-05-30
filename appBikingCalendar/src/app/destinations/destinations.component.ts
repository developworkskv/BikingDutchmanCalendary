import { Component, OnInit } from "@angular/core";
import { FormGroup, FormBuilder, Validators, NgForm } from "@angular/forms";
import { ToastService } from "app/_services/toast.service";
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { DestinationService } from "app/_services/destination.service";

@Component({
  selector: 'app-destinations',
  templateUrl: './destinations.component.html',
  styleUrls: ['./destinations.component.scss']
})
export class DestinationsComponent implements OnInit {

  dtOptions: DataTables.Settings = {};
  dtTrigger = new Subject();
  id_destination = localStorage.getItem("bd_destination_id");
  destinoForm: FormGroup;
  destinos: any;


  constructor(
    private formBuilder: FormBuilder,
    public toastService: ToastService,
    public _destinos: DestinationService
  ) {}

  ngOnInit() {
    this.getAllDestination();
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
    this.destinoForm = this.formBuilder.group({
      
      name: ["", Validators.required],
      availability: ["", Validators.required],
      description: ["", Validators.required],
      description2: ["", Validators.required],
      
      
    });
  }


  onSubmit(destinoForm: NgForm){ // 
    console.log(destinoForm);
    

}

  getAllDestination() {
    this._destinos.readAllDestino().subscribe((resp) => {
      
      console.log("AQUIII" + resp["data"]);
      this.destinos = resp["data"];
      this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

    });
  }
  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }
  deleteDestinos(idDestino) {
    this._destinos
      .deleteDestino(idDestino)
      .subscribe((resp) => {
        this.toastService.showNotification(
          "top",
          "right",
          "success",
          resp["data"]
        );
        this.getAllDestination();
      });
  }
}
