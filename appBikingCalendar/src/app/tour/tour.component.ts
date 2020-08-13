import { Component, OnInit, OnDestroy } from '@angular/core';
import { UserService } from 'app/_services/user.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { ToastService } from 'app/_services/toast.service';
import { TypeUsersService } from 'app/_services/type-users.service';
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import {FormControl} from '@angular/forms';
import {Observable} from 'rxjs';
import {map, startWith} from 'rxjs/operators';
import { ClientService } from 'app/_services/client.service';

@Component({
  selector: 'app-tour',
  templateUrl: './tour.component.html',
  styleUrls: ['./tour.component.scss']
})
export class TourComponent implements OnInit {
  tourForm: FormGroup;
  myControl = new FormControl();
  options: string[] = ['One', 'Two', 'Three'];
  filteredOptions: Observable<string[]>;
  constructor(private formBuilder: FormBuilder,
    public _client: ClientService,){
      this.getAllClients();
  }

  ngOnInit() {
    this.crearFormularios();
   this.getAllClients();

    // Filtro de busqueda usuario
    this.filteredOptions = this.myControl.valueChanges.pipe(
      startWith(''),
      map(value => this._filter(value))
    );
  }
    //GET ALL CLIENTS
    getAllClients(){
      this._client.getAllClient().subscribe(data=> {
        this.options.push(data["data"][0].name);

       //console.log(data["data"][0]);
       // this.clients = data["data"];
      //  console.log(this.clients);
  
        });
    }
  // filtro busqueda cli
  private _filter(value: string): string[] {
    this.getAllClients();
    const filterValue = value.toLowerCase();

    return this.options.filter(option => option.toLowerCase().indexOf(filterValue) === 0);
  }


crearFormularios(){
  // Creamos el formulario  
  
  this.tourForm = this.formBuilder.group({
    tourId: ['', Validators.required],
    clientId: ['', Validators.required],
    dateTour: ['', Validators.required],
    diet: ['', Validators.required],
    hotel: ['', Validators.required],
    statusBicicle: ['', Validators.required],

});

}
}