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

      allPacks(){
        return this.http.get(URL_SERVICIOS + '/packsRead/'+localStorage.getItem('bd_org') )
      }
      //GET PACKS BY ID
      getPacksById(idPacks: number){
        return this.http.get( URL_SERVICIOS+'/packsById/' + idPacks +'/org/' + localStorage.getItem('bd_org'));
      }
      deletePack(code_pack: any){
        return this.http.get(URL_SERVICIOS + '/packsDelete/'+ code_pack +'/org/'+localStorage.getItem('bd_org') )
      }

}
