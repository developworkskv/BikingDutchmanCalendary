import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { URL_SERVICIOS } from '../config/url.servicios';

@Injectable({
  providedIn: 'root'
})
export class TypePackagesService {

  constructor(public http: HttpClient,) { }

  //CrEATE
  createTypePackage(packages: any ){
    
    return this.http.post(URL_SERVICIOS +'/packageCreate/'+localStorage.getItem('bd_org'), packages)
}
   //GET 
   getAllTypesPackages(){ // TEST
    return this.http.get( URL_SERVICIOS+'/packagesRead');
    
  }
//DELETE
deleteTypesPackages(idTypePackage, idOrg){
  return this.http.get( URL_SERVICIOS+'/packageDelete/' +idTypePackage+ '/org/' + idOrg);
}
}
