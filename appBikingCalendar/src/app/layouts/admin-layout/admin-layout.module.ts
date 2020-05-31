import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AdminLayoutRoutes } from './admin-layout.routing';
import { DashboardComponent } from '../../dashboard/dashboard.component';
import { LoginComponent } from '../../login/login.component';
import { CalendaryComponent } from '../../calendary/calendary.component';
import { NewsComponent } from '../../news/news.component';
import { GeneralFormComponent } from '../../general-form/general-form.component';
import { ChartsModule } from 'ng2-charts';
import {DataTablesModule} from 'angular-datatables';

import {
  MatButtonModule,
  MatInputModule,
  MatRippleModule,
  MatFormFieldModule,
  MatTooltipModule,
  MatSelectModule
} from '@angular/material';
import { UsersComponent } from 'app/users/users.component';
import { PackagesComponent } from 'app/packages/packages.component';
import { DestinationsComponent } from 'app/destinations/destinations.component';
import { ClientsComponent } from 'app/clients/clients.component';

import {NgxPaginationModule} from 'ngx-pagination'; // <-- import the module
import { FilterPipe } from 'app/_pipes/filter.pipe';
import { UserDetailsComponent } from 'app/_details/user-details/user-details.component';
import { TourComponent } from 'app/tour/tour.component';
import { NotificationsComponent } from 'app/notifications/notifications.component';
import { DestinationsDetailsComponent } from "app/_details/destinations-details/destinations-details.component";
import { CitiesComponent } from 'app/cities/cities.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(AdminLayoutRoutes),
    FormsModule,
    ReactiveFormsModule,
    MatButtonModule,
    MatRippleModule,
    MatFormFieldModule,
    MatInputModule,
    MatSelectModule,
    MatTooltipModule,
    ChartsModule,
    NgxPaginationModule,
    DataTablesModule,
       

  ],
  // todos mis componentes
  declarations: [
    DashboardComponent,
    LoginComponent,
    CalendaryComponent,
    NewsComponent,
    GeneralFormComponent,
    UsersComponent,
    PackagesComponent,
    DestinationsComponent,
    ClientsComponent,
    UserDetailsComponent,
    FilterPipe,
    TourComponent,
    NotificationsComponent,
    DestinationsDetailsComponent,
    CitiesComponent,

  ]
})

export class AdminLayoutModule {}
