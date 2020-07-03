import { Injectable } from '@angular/core';
import { URL_SERVICIOS } from '../config/url.servicios';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ChatbotService {

  constructor(public htpp: HttpClient) { }
     //CRUD 
     getAllNotifications(){ // TEST
      return this.htpp.get( URL_SERVICIOS+'/notifications');
      
    }
}
