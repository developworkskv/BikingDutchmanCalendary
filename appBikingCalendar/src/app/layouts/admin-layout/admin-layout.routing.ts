import { Routes } from '@angular/router';

import { DashboardComponent } from '../../dashboard/dashboard.component';
import { LoginComponent } from 'app/login/login.component';
import { CalendaryComponent } from 'app/calendary/calendary.component';
import { NewsComponent } from 'app/news/news.component';
import { GeneralFormComponent } from 'app/general-form/general-form.component';
import { UsersComponent } from '../../users/users.component';
import { PackagesComponent } from 'app/packages/packages.component';
import { DestinationsComponent } from 'app/destinations/destinations.component';
import { ClientsComponent } from 'app/clients/clients.component';

export const AdminLayoutRoutes: Routes = [

    { path: 'dashboard',      component: DashboardComponent },
    { path: 'login', component: LoginComponent},

    //Formulario de solicitud
    { path: 'request-form-bkd', component: GeneralFormComponent},

    // GESTION DE USUARIOS
    { path: 'users-admin', component: UsersComponent},

    // GESTION DE CLIENTES-PACKETES TOURS
    { path: 'calendary', component: CalendaryComponent},

    // GESTION DE PACKEAGES-Paquetes
    { path: 'packages-gestion', component: PackagesComponent},
  
    // GESTION DE CLIENTES
    { path: 'clients-gestion', component: ClientsComponent},

    // GESTION DE DESTINOS
    { path: 'destinations-gestion', component: DestinationsComponent},

    // GESTION DE NOTICIAS Y PROMOCIONES
    { path: 'news', component: NewsComponent},

];
