@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
   <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $nbr_produits }}</h3>
              <p>Pièces</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{!! route('pieces.index') !!}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $nbr_users }}</h3> 
              <p>Utilisateurs</p>
            </div> 
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{!! route('users.index') !!}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ count($pieces)}}</h3>
              <p>Pièces manquantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{!! route('pieces.index') !!}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ count($entretiens_future)}}</h3>

              <p>Entretien à faire</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="{!! route('defaillances.create') !!}" class="small-box-footer">Plus d'informations <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Entretiens à faire</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Pièces manquantes</a></li>
              <li class="pull-left header"><i class="fa fa-bell"></i> Notification</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">

                @if(count($entretiens_future)>0)
                @foreach($entretiens_future as $ent)
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                      </span> 
                      <!-- todo text -->
                      <span class="text">{{ $ent->text_du_rappel }}</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> Début d'entretien {{ $ent->start_date }}</small> 
                    </li>
                  </ul>
                @endforeach
                @else
                <div class="alert alert-light text-info" role="alert">
                  Pas d'entretien définie en urgence!
                </div>
                @endif
                
              </div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                
                @if(count($pieces)>0)
                @foreach($pieces as $piece)
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                      </span> 
                      <!-- todo text -->
                      <span class="text">{{ $piece->nom }}</span>
                      <!-- Emphasis label -->
                      <small class="label label-danger"><i class="fa fa-exclamation-triangle"></i> Quantite de {{ $piece->quantite }}</small> 
                    </li>
                  </ul>
                @endforeach
                @else
                <div class="alert alert-light text-info" role="alert">
                  Aucune pièce manquante!
                </div>
                @endif

              </div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- MTTR section -->
           <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa fa-chart"></i> Moyenne des Temps Techniques de Réparation ( Mean Time To Repair )</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="mttr" style="position: relative; height: 300px;">
              </div>
            </div>
          </div>           
          <!-- MTTR section -->


          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="pull-left header"><i class="fa fa-chart"></i> Moyenne des Temps de Bon Fonctionnement ( Mean Time Between Failure )</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="mtbf" style="position: relative; height: 300px;">
              </div>
            </div>
          </div>


        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4 connectedSortable">

          <!-- Calendar -->
          <div class="box box-primary">
              <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Calendrier</h3> 
              </div> 
              <!--The calendar --> 
              <div id="calendar" style="width: 100%;">
                  {!! $calendar->calendar() !!}
              </div>
          </div>  
          <!-- /.box -->
        </section>
        <!-- right col --> 

      </div>

      <!-- idicateur de performance-->
     
  </section>
@endsection
@section('scripts')

<!-- MTTR  --> 
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
   $(document).ready(function() {

   
    function mttr_data()
    { 
       $("#prix_pieces").val(0);
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
         jQuery.ajax({
                  url: "/mttr/",
                  method: 'get',
                  data: {
                     "_token": "{{ csrf_token() }}"
                  },
                  success: function(result){
                    var chart = new CanvasJS.Chart("mttr", {
                          animationEnabled: true,
                          theme: "light2", // "light1", "light2", "dark1", "dark2"
                          title:{
                            text: "MTTR"
                          },
                          axisY: {
                            title: "Temps (Heures)"
                          },
                          data: [{        
                            type: "column",  
                            showInLegend: true, 
                            legendMarkerColor: "grey",
                            legendText: "MTTR graph",
                            dataPoints:result.response
                          }]
                        });
                    //console.log(result.response);
                    chart.render();

                  }});
    }
    // execute 
    mttr_data();

    function mtbf_data()
    { 
       $("#prix_pieces").val(0);
         $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
         jQuery.ajax({
                  url: "/mtbf/",
                  method: 'get',
                  data: {
                     "_token": "{{ csrf_token() }}"
                  },
                  success: function(result){
                    var chart = new CanvasJS.Chart("mtbf", {
                          animationEnabled: true,
                          theme: "light1", // "light1", "light2", "dark1", "dark2"
                          title:{
                            text: "MTBF"
                          },
                          axisY: {
                            title: "Temps (Jours)"
                          },
                          data: [{        
                            type: "column",  
                            showInLegend: true, 
                            legendMarkerColor: "grey",
                            legendText: "MTBF graph",
                            dataPoints:result.response
                          }]
                        });
                    //console.log(result.response);
                    chart.render();

                  }});
    }
    // execute 
    mtbf_data();
   
});
window.onload = function () {



}
</script>
<!-- end MTTR  -->  

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!-- <script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer0", {
  title:{
    text: "MTTR"
  },
  axisY: {
    title: "Number of Locations",
    lineColor: "#4F81BC",
    tickColor: "#4F81BC",
    labelFontColor: "#4F81BC"
  },
  axisY2: {
    title: "Percent",
    suffix: "%",
    lineColor: "#C0504E",
    tickColor: "#C0504E",
    labelFontColor: "#C0504E"
  },
  data: [{
    type: "column",
    dataPoints: [
      { label: "Subways", y: 44853 },
      { label: "McDonald", y: 36525 },
      { label: "Starbucks", y: 23768 },
      { label: "KFC", y: 19420 },
      { label: "Pizza Hut", y: 13528 },
      { label: "Dunkin Donuts", y: 11906 }
    ]
  }]
});
chart.render();
createPareto(); 

function createPareto(){
  var dps = [];
  var yValue, yTotal = 0, yPercent = 0;

  for(var i = 0; i < chart.data[0].dataPoints.length; i++)
    yTotal += chart.data[0].dataPoints[i].y;

  for(var i = 0; i < chart.data[0].dataPoints.length; i++){
    yValue = chart.data[0].dataPoints[i].y;
    yPercent += (yValue / yTotal * 100);
    dps.push({label: chart.data[0].dataPoints[i].label, y: yPercent});
  }
  
  chart.addTo("data",{type:"line", yValueFormatString: "0.##\"%\"", dataPoints: dps});
  chart.data[1].set("axisYType", "secondary", false);
  chart.axisY[0].set("maximum", yTotal);
  chart.axisY2[0].set("maximum", 100);
}

} 
 
</script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}

@endsection