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
    { path: '/calendary', title: 'Calendario de eventos.',  icon: 'event_note', class: '' },
    { path: '/news', title: 'Noticias y promociones.',  icon: 'fiber_new', class: '' },
    { path: '/request-form-bkd', title: 'Formulario Solicitud.',  icon: 'list_alt', class: '' },

];
// rutas del menu sidebar ADMINISTRADOR
export const ROUTES_ADMIN: RouteInfo[] = [
  { path: '/dashboard', title: 'Dashboard',  icon: 'dashboard', class: '' },
  { path: '/calendary', title: 'Calendario de eventos.',  icon: 'event_note', class: '' },
  { path: '/users-admin', title: 'Gestión de Usuarios',  icon: 'account_box', class: '' },
  { path: '/packages-gestion', title: 'Gestión de Paquetes',  icon: 'vertical_split', class: '' },
  { path: '/clients-gestion', title: 'Gestión de Clientes',  icon: 'person_pin', class: '' },
  { path: '/destinations-gestion', title: 'Gestión de Destinos',  icon: 'place', class: '' },  
  { path: '/request-form-bkd', title: 'Formulario Solicitud.',  icon: 'list_alt', class: '' },
  { path: '/user-admin/:id_admin', title: '',  icon: '', class: '' },

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
   this.estadoSesion();
  }

  estadoSesion(){ // logueado o no logueado
    console.log("Usuario En sesion: "+this._user.isLoggin);
    // DETERMINAR LOS MENUS A CARGAR 
    if(this._user.isLoggin == false){
      // Usuario no registrado no hay nada en local stroage
        this.menuItems = ROUTES.filter(menuItem => menuItem); // RUTAS CLIENTE
    }
    if(this._user.isLoggin == true){
      // Usuario no registrado no hay nada en local stroage
        this.menuItems = ROUTES_ADMIN.filter(menuItem => menuItem); // RUTAS CLIENTE
    }
   
  } 
}
