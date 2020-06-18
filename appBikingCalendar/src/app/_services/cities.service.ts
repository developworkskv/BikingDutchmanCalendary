import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';
@Injectable({
  providedIn: 'root'
})
export class CitiesService {

  constructor(public http: HttpClient,) { }
//CrEATE
createCity(city: any ){
    
  return this.http.post(URL_SERVICIOS +'/newCity/'+localStorage.getItem('bd_org'), city)
}
 //GET 
 getAllCities(){ // TEST
  return this.http.get( URL_SERVICIOS+'/citiesRead/'+localStorage.getItem('bd_org'));
  
}
//GET CITY BY ID
getCityId(idCity: number){
  return this.http.get( URL_SERVICIOS+'/getCityId/' + idCity +'/org/' + localStorage.getItem('bd_org'));
}
//DELETE
deleteCity(idCity, idOrg){
return this.http.get( URL_SERVICIOS+'/deleteCity/' +idCity+ '/org/' + idOrg);
}


}
