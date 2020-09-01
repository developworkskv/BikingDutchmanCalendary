import { Injectable } from '@angular/core';
import { URL_SERVICIOS } from '../config/url.servicios';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EmailsService {

  constructor(public http: HttpClient) { }

  infoEmail(infoEmail: any ){
    return this.http.post(URL_SERVICIOS +'/email-info', infoEmail)
  }
}
