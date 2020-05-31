import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';

@Injectable({
  providedIn: 'root'
})
export class DestinationService {

  constructor(public http: HttpClient,) {}
//CrEATE
createDestination(destination: any ){
  return this.http.post(URL_SERVICIOS +'/destinoCreate/'+localStorage.getItem('bd_org'), destination)
}
 //GET 
 readAllDestinations(){ // TEST
  return this.http.get( URL_SERVICIOS+'/destinoRead/'+localStorage.getItem('bd_org') );
  
}
//DELETE
deleteDestination(idDestino){
return this.http.get( URL_SERVICIOS+'/destinoDelete/' +idDestino + '/org/' + localStorage.getItem('bd_org'));
}
  //getUserById
  detailsDestinos(idDestino: number){
    return this.http.get( URL_SERVICIOS+'/destinoById/' + idDestino +'/org/' + localStorage.getItem('bd_org'));
  }
   
}
