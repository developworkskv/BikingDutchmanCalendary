import { Component, OnInit } from '@angular/core';
import { ReportsService } from 'app/_services/reports.service';
import { ToastService } from 'app/_services/toast.service';
import { LoginService } from 'app/_services/login.service';

@Component({
  selector: 'app-reports',
  templateUrl: './reports.component.html',
  styleUrls: ['./reports.component.scss']
})
export class ReportsComponent implements OnInit {
  urltoDownload: any;

  constructor(public _report: ReportsService,private toast: ToastService,
    public _login: LoginService) {
      // VERIFICAR SESION DEL USUARIO
    this._login.sesionActive(localStorage.getItem('token_bd_users'), localStorage.getItem('bd_org'));  
   }

  ngOnInit() {
    const id_org = localStorage.getItem('bd_org');
  }

  report( doc_id){
    this.urltoDownload = this._report.getUrlToDownloadPdf(doc_id);
    console.log(this.urltoDownload);
    
  }

}
