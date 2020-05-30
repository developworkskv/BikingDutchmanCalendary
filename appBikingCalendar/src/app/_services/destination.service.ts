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
   
}
   //GET 
   readAllDestino(){ // TEST
    return this.http.get( URL_SERVICIOS+'/destinoRead');
    
  }
  //getUserById
  detailsDestinos(idDestino: number){
    return this.http.get( URL_SERVICIOS+'/destinoById/' + idDestino);
  }

  //UPDATE
  updateDestino(idDestino, destino:any){
  }

  //DELETE
  deleteDestino(idDestino){
  return this.http.get( URL_SERVICIOS+'/destinoDelete/' +idDestino);
}
}
