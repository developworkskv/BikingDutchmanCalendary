import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
import { Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ClientService {
  

  constructor(public http: HttpClient) { 
    //console.log('CLIENT Service Active for BRA');
  }
  //CrEATE
  createClient(client: any ){
    
  return this.http.post(URL_SERVICIOS +'/clientCreate/'+localStorage.getItem('bd_org'), client)
}
 //GET 
 getAllClient(){ // TEST
  return this.http.get( URL_SERVICIOS+'/clientRead/'+localStorage.getItem('bd_org'));
  
}
//GET CLIENT BY ID
getClientById(idClient: number){
  return this.http.get( URL_SERVICIOS+'/clientById/' + idClient +'/org/' + localStorage.getItem('bd_org'));
}
//DELETE
deleteClient(idPerson ){
return this.http.get( URL_SERVICIOS+'/clientDelete/' +idPerson +'/org/' + localStorage.getItem('bd_org'));
}

//UPDATE
updateClientP(id_client, client:any){
  return this.http.post( URL_SERVICIOS+'/admin/' +id_client+'/update'+ '/'+localStorage.getItem('bd_org'), client);
}
}
