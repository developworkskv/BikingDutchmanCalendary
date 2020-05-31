<html>
    <head>
        <title>
            Reportes BKD
        </title>
        <style type="text/css">

        .test-result-table {

            border: 1px solid black;
            width: 800px;
        }

        .test-result-table-header-cell {

            border-bottom: 1px solid black;
            background-color: silver;
        }

        .test-result-step-command-cell {

            border-bottom: 1px solid gray;
        }

        .test-result-step-description-cell {

            border-bottom: 1px solid gray;
        }

        .test-result-step-result-cell-ok {

            border-bottom: 1px solid gray;
            background-color: green;
        }

        .test-result-step-result-cell-failure {

            border-bottom: 1px solid gray;
            background-color: red;
        }

        .test-result-step-result-cell-notperformed {

            border-bottom: 1px solid gray;
            background-color: white;
        }

        .test-result-describe-cell {
            background-color: tan;
            font-style: italic;
        }

        .test-cast-status-box-ok {
            border: 1px solid black;
            float: left;
            margin-right: 10px;
            width: 45px;
            height: 25px;
            background-color: green;
        }

        </style>
    </head>
    <body>
    <div class="grid-container">
  <div class="grid-item"> <h1 class="test-results-header">
            Reporte Biking Dutchman Mountain
        </h1></div>
  <div class="grid-item">
  <p>Fecha: 01/02/20</p>
  <p>Impreso por: Kevin Velasco (ADMINISTRADOR)</p>
  </div>
  <div class="grid-item">
  <img src="https://www.bikingdutchman.com/wp-content/uploads/sites/3/2018/11/logo-biking-dutchman-mountain-bike.jpg" alt="">
  </div>

</div>
       
        <h4>
        Reporte Destinos Biking Dutchman        
        </h4>
        <table class="test-result-table" cellspacing="0">
            <thead>
                <tr>
                    <td class="test-result-table-header-cell">
                        Nº 
                    </td>
                    <td class="test-result-table-header-cell">
                        Destino
                    </td>
                    <td class="test-result-table-header-cell">
                        Ciudad
                    </td>
                    <td class="test-result-table-header-cell">
                        Disponibilidad
                    </td>
                    <td class="test-result-table-header-cell">
                        Descripción destino
                    </td>
                    <td class="test-result-table-header-cell">
                        Descripción ciudad
                    </td>
                    <td class="test-result-table-header-cell">
                        Fecha creación
                    </td>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($destinations); $i++)

                <tr> 
                    <td>{{$i+1}}</td>
                    <td>{{$destinations[$i]->name}}</td>
                    <td>{{$destinations[$i]->city}}</td>
                    <!-- availability-->
                    @if($destinations[$i]->availability == 1)
                    <td>SI</td>
                    @elseif($destinations[$i]->availability == 0)
                    <td>NO</td>
                    @endif
                    <!---->
                    <td>{{$destinations[$i]->description1}}. {{$destinations[$i]->description1}}  </td>
                    <td>{{$destinations[$i]->descriptionCity}}</td>
                    <td>{{$destinations[$i]->created_at}}</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </body>
</html>




<!--  

    <html>
    <head>
        <title>Example report</title>
        <link href="/theme/nvd3/nv.d3.css" rel="stylesheet" />
        <style>
            .arc path {
                stroke: #fff;
                stroke-width: 3px;
            }
            .axis path {
                fill: none;
                stroke: #777;
                shape-rendering: crispEdges;
            }
            .axis text {
                font-family: Lato;
                font-size: 13px;
            }    
             
        </style>    

        <script src="/theme/js/d3.v3.js">//</script>
        <script src="/theme/nvd3/nv.d3.js">//</script>        
        <script type="text/javascript" src="/static/uri/1.15.1/URI.js">//</script>
        <script src="/theme/js/main.js">//</script>
    </head>
    
    <body>
        <div class="input-group date-range pull-right">
            <label for="report-range" class="input-group-addon">Time</label>
            <input type="text" id="report-range" placeholder="Choose a date range" value="" class="form-control" />
        </div>        
        
        <hr/>
        
        <div id="reportResult">
            <div id='chart'>
                <svg id="visualisation" width="100%" height="300"></svg>
            </div>
    
            <hr/>
            
            <div class="row">
                <div class="col-md-4">
                    <div id="donut-chart">
                        <svg id="donutChart" width="100%" height="300"></svg>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <thead>
                            <th>URL</th>
                            <th>Count</th>
                        </thead>
                        <tbody id="hitsBody">
                            <tr>
                                <td>Loading, pleasey</td>
                            </tr>
                        </tbody>
                    </table>
                </div>                        
            </div>
        </div>
        <script>
            $(function() {
                initReport();
            });
        </script>                    
    </body>
</html>
-->