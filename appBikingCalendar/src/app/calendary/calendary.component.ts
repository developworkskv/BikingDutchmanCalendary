import { Component, OnInit, OnDestroy } from '@angular/core';
import { Subject } from 'rxjs';
import 'rxjs/add/operator/map';
@Component({
  selector: 'app-calendary',
  templateUrl: './calendary.component.html',
  styleUrls: ['./calendary.component.scss']
})
export class CalendaryComponent implements OnInit {
  // ESTE COMPONENTE DETALLA LAS CONFIGURACIONES PARA LAS OPCIONES DE LA DATATABLE
  // No hacer caso al error Subject
  
  dtOptions: DataTables.Settings = {};
  dtTrigger: Subject = new Subject();

  constructor() { }

  ngOnInit() {
    this.dtOptions = {
      pagingType: 'full_numbers',
      pageLength: 5
    };
  }

  // GET ALL to datatable  activate ====>       this.dtTrigger.next(); // Alwas necesary to storing or read to datatables

  ngOnDestroy(): void {
    // Do not forget to unsubscribe the event
    this.dtTrigger.unsubscribe();
  }

}
