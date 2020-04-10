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
    ChartsModule

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

  ]
})

export class AdminLayoutModule {}
