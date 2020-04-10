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
 
 
 // CHART LINEAL
 lineChartData: ChartDataSets[] = [
  { data: [85, 72, 78, 75, 77, 75], label: 'Crude oil prices' },
];
lineChartLabels: Label[] = ['January', 'February', 'March', 'April', 'May', 'June'];
lineChartOptions = {
  responsive: true,
};
lineChartColors: Color[] = [
  {
    borderColor: 'black',
    backgroundColor: 'rgba(255,255,0,0.28)',
  },
];
lineChartLegend = true;
lineChartPlugins = [];
lineChartType = 'line';
// END CHART

// CHART BARRAS 
doughnutChartLabels: Label[] = ['BMW', 'Ford', 'Tesla'];
  doughnutChartData: MultiDataSet = [
    [55, 25, 20]
  ];
  doughnutChartType: ChartType = 'doughnut';
// END CAHRT BARRAS
//CHART REDONDO
public radarChartOptions: RadialChartOptions = {
  responsive: true,
};
public radarChartLabels: Label[] = ['Punctuality', 'Communication', 'Problem Solving',
  'Team Player', 'Coding', 'Technical Knowledge', 'Meeting Deadlines'];

public radarChartData: ChartDataSets[] = [
  { data: [0, 1, 2, 3, 4, 5, 6], label: 'Employee Skill Analysis' }
];
public radarChartType: ChartType = 'radar';
//CAHRT REDONDO

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
