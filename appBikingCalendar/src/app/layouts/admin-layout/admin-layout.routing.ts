import { Routes } from '@angular/router';

import { DashboardComponent } from '../../dashboard/dashboard.component';
import { LoginComponent } from 'app/login/login.component';
import { CalendaryComponent } from 'app/calendary/calendary.component';
import { NewsComponent } from 'app/news/news.component';
import { GeneralFormComponent } from 'app/general-form/general-form.component';

export const AdminLayoutRoutes: Routes = [

    { path: 'dashboard',      component: DashboardComponent },
    { path: 'login', component: LoginComponent},
    { path: 'calendary', component: CalendaryComponent},
    { path: 'news', component: NewsComponent},
    { path: 'request-form-bkd', component: GeneralFormComponent},

];
