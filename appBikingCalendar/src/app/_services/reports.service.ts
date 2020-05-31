import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
@Injectable({
  providedIn: 'root'
})
export class ReportsService {

  constructor(public http: HttpClient) { }

  getReportDestination(){ // http://localhost:8000/api/descargar-pdf/1
    return this.http.get( URL_SERVICIOS+'/descargar-pdf/'+ localStorage.getItem('bd_org'));
    
  }
}
