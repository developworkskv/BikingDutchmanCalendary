import { Component, OnInit} from '@angular/core';
import { Router } from '@angular/router';
import { UserService } from 'app/_services/user.service';


@Component({
  selector: 'app-admin-layout',
  templateUrl: './admin-layout.component.html',
  styleUrls: ['./admin-layout.component.scss']
})
export class AdminLayoutComponent implements OnInit {

  constructor(private router: Router, public _user: UserService) {}
    /*
    En el componente se hace referencia a la estructura de la pagina, responsive
    */ 
      ngOnInit() {
      }

    
    
    
    
    
    
    
    
    /* ASI OBTENGO MI URL ROUTER
    isMaps(path){
        var titlee = this.location.prepareExternalUrl(this.location.path());
        console.log(titlee); 
        
        titlee = titlee.slice( 1 );
        if(path == titlee){
            return false;
        }
        else {
            return true;
        }
    } */



}
