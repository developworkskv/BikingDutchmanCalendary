import { Routes } from '@angular/router';

import { DashboardComponent } from '../../dashboard/dashboard.component';
import { UserProfileComponent } from '../../user-profile/user-profile.component';
import { TableListComponent } from '../../table-list/table-list.component';
import { IconsComponent } from '../../icons/icons.component';
import { NotificationsComponent } from '../../notifications/notifications.component';
import { LoginComponent } from 'app/login/login.component';
import { CalendaryComponent } from 'app/calendary/calendary.component';
import { NewsComponent } from 'app/news/news.component';
import { GeneralFormComponent } from 'app/general-form/general-form.component';

export const AdminLayoutRoutes: Routes = [

    { path: 'dashboard',      component: DashboardComponent },
    { path: 'user-profile',   component: UserProfileComponent },
   // { path: 'table-list',     component: TableListComponent },
  //  { path: 'icons',          component: IconsComponent },
  //  { path: 'notifications',  component: NotificationsComponent },
    { path: 'login', component: LoginComponent},
    { path: 'calendary', component: CalendaryComponent},
    { path: 'news', component: NewsComponent},
    { path: 'request-form-bkd', component: GeneralFormComponent},

];
