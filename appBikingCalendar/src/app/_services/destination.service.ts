import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';

@Injectable({
  providedIn: 'root'
})
export class DestinationService {

  constructor(public http: HttpClient,) {}

   //CrEATE
   createDestino(destinos: any ){
    
    return this.http.post(URL_SERVICIOS +'/destinoCreate', destinos)
}
   //GET 
   readAllDestino(){ // TEST
    return this.http.get( URL_SERVICIOS+'/destinoRead');
    
  }
  //getUserById
  detailsDestinos(idAdmin: number){
    return this.http.get( URL_SERVICIOS+'/adminById/' + idAdmin);
  }

  //UPDATE
  updateDestino(idDestino, destino:any){
    return this.http.post( URL_SERVICIOS+'/destinoUpdate/' +idDestino+'/update', destino);
  }

  //DELETE
  deleteDestino(idDestino){
  return this.http.get( URL_SERVICIOS+'/destinoDelete/' +idDestino);
}
}
