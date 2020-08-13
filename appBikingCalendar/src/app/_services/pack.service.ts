import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';

@Injectable({
  providedIn: 'root'
})
export class PackService {

  constructor(public http: HttpClient) { 

  }

    //CrEATE
    createPack(pack: any, id_destino:any ){
      return this.http.post(URL_SERVICIOS +'/packsCreate/'+localStorage.getItem('bd_org') + '/destino/'+ id_destino, pack)
  }
     //CrEATE - DestiantionPacks
     createPackDestinations(pack: any, id_destino:any ){
      return this.http.post(URL_SERVICIOS +'/createPackDestination/'+localStorage.getItem('bd_org') + '/destino/'+ id_destino, pack)
  }

   getAllPacks(){
     return this.http.get(URL_SERVICIOS + '/packsRead/'+localStorage.getItem('bd_org') )
   }
}
