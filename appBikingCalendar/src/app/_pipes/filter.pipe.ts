import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'filter'
})
export class FilterPipe implements PipeTransform {

  transform(value: any[], searchTerm: string): any {
    if( !value || !searchTerm){
      return value;
    }
    return value.filter(
      resp => 
      //console.log(resp.nombre_ruta));      
      resp.name.toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1);
      
  }

}
