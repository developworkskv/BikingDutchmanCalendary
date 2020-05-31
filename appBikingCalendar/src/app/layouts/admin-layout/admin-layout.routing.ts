import { Routes } from "@angular/router";

import { DashboardComponent } from "../../dashboard/dashboard.component";
import { LoginComponent } from "app/login/login.component";
import { CalendaryComponent } from "app/calendary/calendary.component";
import { NewsComponent } from "app/news/news.component";
import { GeneralFormComponent } from "app/general-form/general-form.component";
import { UsersComponent } from "../../users/users.component";
import { PackagesComponent } from "app/packages/packages.component";
import { DestinationsComponent } from "app/destinations/destinations.component";
import { ClientsComponent } from "app/clients/clients.component";
import { UserDetailsComponent } from "app/_details/user-details/user-details.component";
import { TourComponent } from "app/tour/tour.component";
import { NotificationsComponent } from "app/notifications/notifications.component";
import { DestinationsDetailsComponent } from "app/_details/destinations-details/destinations-details.component";
import { ReportsComponent } from "app/reports/reports.component";

export const AdminLayoutRoutes: Routes = [
  // GENERALES*******
  { path: "dashboard", component: DashboardComponent },
  { path: "login", component: LoginComponent },

  // NO SESION *****
  //Formulario de solicitud
  { path: "request-form-bkd", component: GeneralFormComponent },
  //Noticias promos
  { path: "news", component: NewsComponent },
  //Calendari
  { path: "calendary", component: CalendaryComponent },

  // ORDENES TOURS*******
  { path: "bikingTours", component: TourComponent },

  // ADMINISTRACION*********
  // GESTION DE USUARIOS
  { path: "users-admin", component: UsersComponent },
  // GESTION DE PACKEAGES-Paquetes
  { path: "packages-gestion", component: PackagesComponent },
  // GESTION DE CLIENTES
  { path: "clients-gestion", component: ClientsComponent },
  // GESTION DE DESTINOS
  { path: "destinations-gestion", component: DestinationsComponent },


  //REPORTES***********
  { path: "reports", component: ReportsComponent },

  //NOTIFICACIONES*********
  { path: "notifications", component: NotificationsComponent },

  // DETAILS PAGES****************
  { path: "user-admin/:id_admin", component: UserDetailsComponent },
  // DETAILS DESTINATION
  { path: "destinations-gestion/:id_destino", component: DestinationsDetailsComponent },

];
