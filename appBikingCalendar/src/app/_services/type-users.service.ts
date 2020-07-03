import { Injectable } from '@angular/core';
import { URL_SERVICIOS } from '../config/url.servicios';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TypeUsersService {

  constructor(public htpp: HttpClient) { }
  
  // 
  getTypesUser(){ // 
    return this.htpp.get( URL_SERVICIOS+'/typesUser');
    
  }
}
