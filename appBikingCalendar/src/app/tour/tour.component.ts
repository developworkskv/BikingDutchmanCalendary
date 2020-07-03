import { Component, OnInit, OnDestroy } from '@angular/core';
import { UserService } from 'app/_services/user.service';
import { FormBuilder, FormGroup, NgForm, Validators } from '@angular/forms';
import { ToastService } from 'app/_services/toast.service';
import { TypeUsersService } from 'app/_services/type-users.service';
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
import { LoginService } from 'app/_services/login.service';
@Component({
  selector: 'app-tour',
  templateUrl: './tour.component.html',
  styleUrls: ['./tour.component.scss']
})
export class TourComponent implements OnInit {
  tourForm: FormGroup;


  constructor(private formBuilder: FormBuilder,){

  }
  ngOnInit() {
    this.crearFormularios();
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