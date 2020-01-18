import { Component, OnInit } from '@angular/core';
import { UserService } from 'app/_services/user.service';

declare interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}
// rutas del menu sidebar CLIENTE
export const ROUTES: RouteInfo[] = [
    { path: '/dashboard', title: 'Dashboard',  icon: 'dashboard', class: '' },
    { path: '/user-profile', title: 'User Profile',  icon:'person', class: '' },
    { path: '/table-list', title: 'Table List',  icon:'content_paste', class: '' },
   { path: '/upgrade', title: 'Upgrade to PRO',  icon:'unarchive', class: 'active-pro' },
];
// rutas del menu sidebar ADMINISTRADOR
export const ROUTES_ADMIN: RouteInfo[] = [
  { path: '/typography', title: 'Typography',  icon:'library_books', class: '' },
  { path: '/icons', title: 'Icons',  icon:'bubble_chart', class: '' },
  { path: '/notifications', title: 'Notifications',  icon:'notifications', class: '' },
];

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  menuItems: any[]; // almacen menú 

  constructor(private _user: UserService) { }

  ngOnInit() { 
    // Determinar si el usuario es Administrador  
    // TODOS
    /* => DASHBOARD == INFORMACION PUBLICITARIA PARA LA EMPRESA
       => PAQUETES == Tours que se ofrece, informacion y solicitar tour ==>  STANDAR Y PREMIUM
       => CALENDARY == SOLO LECTURA
       => COMENTARIOS == LECTURA y ESCRITURA de usuarios registrados;
       => CONTACTOS == SOLO LECTURA  
       */
    // USUARIO ADMINISTRADOR LOGUEADO
    /*   => DASHBOARD == ""
        => PAQUETES == CRUD 
       => CALENDARY // ASIGNAR VENTA => PAQUETE_USUARIO
        => DESTINOS == CRUD 
        => HOTELES == CRUD
        => COMIDA == CRUD // MAYBE
        
    */
   this.estadoSesion();
  }

  estadoSesion(){ // logueado o no logueado
    console.log("Usuario En sesion: "+this._user.isLoggin);
    // DETERMINAR LOS MENUS A CARGAR 
    if(this._user.isLoggin == false){
      // Usuario no registrado no hay nada en local stroage
        this.menuItems = ROUTES.filter(menuItem => menuItem); // RUTAS CLIENTE
    }else{
      const menuItemsClient = ROUTES.filter(menuItem => menuItem);
      const menuItemsAdmin = ROUTES_ADMIN.filter(menuItem => menuItem);
      this.menuItems = menuItemsClient.concat(menuItemsAdmin);
    }
  } 
}
