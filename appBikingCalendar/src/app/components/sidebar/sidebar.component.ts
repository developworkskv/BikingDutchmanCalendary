import { Component, OnInit } from '@angular/core';
import { UserService } from 'app/_services/user.service';

declare interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}
// GENERAL RUTES
export const ROUTES_GENERAL: RouteInfo[] = [
  { path: '/dashboard', title: 'Dashboard',  icon: 'dashboard', class: '' },
  { path: '/calendary', title: 'Calendario de eventos.',  icon: 'event_note', class: '' },
];
// rutas del menu sidebar NO SESION
export const ROUTES: RouteInfo[] = [
    { path: '/news', title: 'Noticias y promociones.',  icon: 'fiber_new', class: '' },
    { path: '/request-form-bkd', title: 'Formulario Solicitud.',  icon: 'list_alt', class: '' },

];
// rutas del menu sidebar reports
export const ROUTES_ORDERS_TOURS: RouteInfo[] = [
  { path: '/bikingTours', title: 'Biking Tours',  icon: 'directions_bike', class: '' },

];

// rutas del menu sidebar reports
export const ROUTES_REPORTS: RouteInfo[] = [
  { path: '/dashboard', title: 'Pag Reportes',  icon: 'dashboard', class: '' },

];
// rutas del menu sidebar ADMINISTRACION
export const ROUTES_ADMIN: RouteInfo[] = [
  { path: '/users-admin', title: 'Gestión de Usuarios',  icon: 'account_box', class: '' },
  { path: '/clients-gestion', title: 'Gestión de Clientes',  icon: 'person_pin', class: '' },
  { path: '/destinations-gestion', title: 'Gestión de Destinos',  icon: 'place', class: '' },  
  { path: '/packages-gestion', title: 'Gestión de Paquetes',  icon: 'vertical_split', class: '' },
  //DETAILS PAGES
  { path: '/user-admin/:id_admin', title: '',  icon: '', class: '' },

];

// rutas del menu sidebar notifications
export const ROUTES_NOTIFICATIONS: RouteInfo[] = [
  { path: '/notifications', title: 'Notificaciones',  icon: 'adb', class: '' },

];

@Component({
  selector: 'app-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
  menuItems: any[]; // MENU ADMINISTRACION
  menuItemsTours: any[]; // MENU Ordenes Tours
  menuItemsReports: any[]; // MENU Ordenes Tours
  menuItemsNotification: any[]; // MENU Ordenes Tours
  menuItemsGeneral: any[]; // MENU GENERAL
  showMenu: boolean = false;

  constructor(private _user: UserService) { 
    if(localStorage.getItem('token_bd_users')){
      this.showMenu = true;
    }
  }

  ngOnInit() { 
   this.estadoSesion();
  }

  estadoSesion(){ // logueado o no logueado
    console.log("Usuario En sesion: "+this._user.isLoggin);
    // DETERMINAR LOS MENUS A CARGAR 
    if(!this.showMenu){
      // Usuario no registrado no hay nada en local stroage
        this.menuItemsGeneral = ROUTES_GENERAL.filter(menuItem => menuItem); // RUTAS CLIENTE
        this.menuItems = ROUTES.filter(menuItem => menuItem); // RUTAS CLIENTE
    }
    if(this.showMenu){
      // Usuario no registrado no hay nada en local stroage
        this.menuItemsGeneral = ROUTES_GENERAL.filter(menuItem => menuItem); // RUTAS CLIENTE
        this.menuItems = ROUTES_ADMIN.filter(menuItem => menuItem); // RUTAS NO SESION
        this.menuItemsTours = ROUTES_ORDERS_TOURS.filter(menuItem => menuItem); // RUTAS CLIENTE
        this.menuItemsReports = ROUTES_REPORTS.filter(menuItem => menuItem); // RUTAS CLIENTE
        this.menuItemsNotification = ROUTES_NOTIFICATIONS.filter(menuItem => menuItem); // RUTAS CLIENTE
    }
   
  } 
  
}
