import { Component, OnInit } from '@angular/core';
import { ReportsService } from 'app/_services/reports.service';
import { ToastService } from 'app/_services/toast.service';

@Component({
  selector: 'app-reports',
  templateUrl: './reports.component.html',
  styleUrls: ['./reports.component.scss']
})
export class ReportsComponent implements OnInit {

  constructor(public _report: ReportsService,private toast: ToastService) { }

  ngOnInit() {
    const id_org = localStorage.getItem('bd_org');
  }

  report(){
    this._report.getReportDestination().subscribe(data=> {
      console.log(data);
      this.toast.showNotification('top','right','success','Reporte generado.');

       });
      
  }

}
