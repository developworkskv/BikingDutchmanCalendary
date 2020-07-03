import { Component, OnInit } from '@angular/core';
import * as Chartist from 'chartist';
import { UserService } from 'app/_services/user.service';
import { Router } from '@angular/router';
import { ChartDataSets, ChartType, RadialChartOptions } from 'chart.js';
import { Color, Label, MultiDataSet } from 'ng2-charts';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
 // VARIABLES DATA
  showAdminDashboard:boolean = false; 
 
 constructor(){
    this.showDashboard();
 }
 ngOnInit(){
   
 }

 // show dashboard admin
 showDashboard(){
  if(localStorage.getItem('token_bd_users')){
    this.showAdminDashboard = true;
  }

 }  

 }
