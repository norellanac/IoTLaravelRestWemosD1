@extends('layouts.admin')

@section('content')
  @section('tittleSite','IoT 10x Informatica' . auth()->user()->name )
  @section('page_description','Bitacora de registros')
  <style type="text/css">

  .shop-card {
    background: #f5f5f5;
    box-shadow: 0 10px 20px rgba(0,0,0,.3);
    overflow: hidden;
    border-radius: 10px;
    padding: 25px;
    text-align: center;
  }

  </style>
  <div class="page-content-wrapper">
    <div class="row">
      <div class="col-12">
        <div class="card m-b-20">
          <div class="card-body">
            @foreach ($records as $record)
              <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mt-3">
                  <div class="shop-card">
                    <p class="h2"> {{$record->string2}} <span class="badge badge-warning">{{$record->number2}} C°</span></p>
                    <div class="desc">
                      {{$record->created_at->modify('-6 hours')->format('d F, y H:i')}}
                    </div>
                    <div class="slider ">
                      {{--                     <div id="container" style="min-width: 100%; max-width: 100%; height: 300px; margin: 0 auto"></div>--}}
                      <img src="https://image.flaticon.com/icons/svg/1113/1113779.svg" class="mx-auto d-block" width="50%">
                    </div>

                    <form action="{{url('/tracking')}}" method="POST" >
                      @csrf
                      <input type="hidden" class="btn btn-block btn-lg btn-warning" value="Por enviar">
                      <input type="hidden" name="status_del" value="2">
                      <input type="hidden" name="selct" value="3">
                    </form>
                  </div>
                </div>


                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mt-3">
                  <div class="shop-card  justify-content-center align-items-center">
                    <p class="h2"> {{$record->string1}} <span class="badge badge-primary">{{$record->number1}} %</span></p>
                    <div class="desc">
                      {{$record->created_at->modify('-6 hours')->format('d F, y H:i')}}
                    </div>
                    <div class="slider">
                      <img src="https://image.flaticon.com/icons/svg/1809/1809570.svg" class="mx-auto d-block" width="50%">
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            <div class="card-body">
              <p>
                <a class="btn btn-outline-primary mo-mb-2 btn-block" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Mis dispositivos <i class="ion-arrow-down-b "></i>
                </a>
              </p>

            </div>
            <div class="collapse  row" id="collapseExample">

              @foreach (auth()->user()->devices as $device)
                @php
                $record=App\Record::where('user_id','=', auth()->user()->id)->where('device', '=' , $device->custom_id )->orderBy('id', 'desc')->limit(1)->first()
                @endphp
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 mt-3">
                  <div class="shop-card">
                    <p class="h3 text-dark mb-5"><i class="mdi mdi-access-point-network "></i>  {{$device->name}}:</p>
                    <div class="row">
                      <div class="col-8">
                        <span class="h5"><i class="ion-thermometer "></i>  {{$record->string2}}:</span>
                      </div>
                      <div class="col-3">
                        <p class="h5"><span class="badge badge-warning"> {{$record->number2}} C°</span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <span class="h5"><i class="ion-waterdrop  "></i>  {{$record->string1}}:</span>
                      </div>
                      <div class="col-3">
                        <p class="h5"><span class="badge badge-primary">{{$record->number1}} %</span></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8">
                        <span class="h5"><i class="ion-battery-half  "></i>  Batería:</span>
                      </div>
                      <div class="col-3">
                        <p class="h5"><span class="badge badge-success">{{round(($record->number3 -2.7 ) * 59)}}%</span></p>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-8">
                        <span class="h6"><i class="ion-clock  "></i>  {{$record->created_at->modify('-6 hours')->format('d F, y H:i')}}</span>
                      </div>
                      <div class="col-3">
                        <a href="{{url('/records/' . $device->device)}}" class=" btn-light waves-effect"> <i class="mdi mdi-calendar-clock  "></i>.  Historial</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>

            {{--}}<div class="card-body mt-5">

              <h4 class="mt-0 header-title">Ultimas lecturas</h4>

              <div id="simple-line-chart1" class="ct-chart ct-golden-section"></div>

            </div>--}}

            <div class="">
              <div class="card m-b-30">
                <div class="card-body">


                  <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                    <li class="list-inline-item">
                      <h5 class="mb-0">{{$charts->first()->number1}} %</h5>
                      <p class="text-muted">Humedad</p>
                    </li>
                    <li class="list-inline-item">
                      <h5 class="mb-0">{{$charts->first()->number1}} C°</h5>
                      <p class="text-muted">Temperatura</p>
                    </li>
                    <li class="list-inline-item">
                      <h5 class="mb-0">{{$charts->first()->created_at->modify('-6 hours')->format('H:i')}} Horas</h5>
                      <p class="text-muted">{{$charts->first()->created_at->modify('-6 hours')->format('d F, Y')}}</p>
                    </li>
                  </ul>

                  <div id="morris-line-sensors" class="morris-chart-height morris-charts"></div>

                </div>
              </div>
            </div>

            <div class="">
              <table id="datatable-buttons" class="text-center table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Humedad</th>
                    <th>Temperatura</th>
                    <th>fecha</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $i=1;
                  $count=0;
                  $tempe=0;
                  $hum=0;
                  $tempDate=$charts->first()->created_at->format('d F -  H');
                  //@dd($tempDate);
                  @endphp
                  @foreach ($charts as $record)
                    @if($record->created_at->format('d F -  H')==$tempDate)
                      @php
                      $count++;
                      $tempe=$tempe + $record->number1 ;
                      $hum= $hum + $record->number2;
                      @endphp
                    @else
                      @if($count>0)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ number_format($tempe / $count)}} %</td>
                          <td>{{ number_format($hum / $count, 2)}} C°</td>
                          @php $date=new DateTime( $record->created_at) @endphp
                          <td>{{$date->modify('-6 hours')->format('d F -  H:i') }}</td>
                        </tr>
                      @endif

                      @php
                      $count=0;
                      $tempe=0 ;
                      $hum= 0;
                      @endphp
                    @endif

                    @php
                    $tempDate=$record->created_at->format('d F -  H');
                    @endphp
                  @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('sectionJS')
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script type="text/javascript">
  /*
  Template Name: Agroxa - Responsive Bootstrap 4 Admin Dashboard
  Author: Themesbrand
  File: Morris chart Init
  */


  !function ($) {
    "use strict";

    var MorrisCharts = function () {
    };

    //creates line chart
    MorrisCharts.prototype.createLineChart = function (element, data, xkey, ykeys, labels, lineColors) {
      Morris.Line({
        element: element,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true, //defaulted to true
        lineColors: lineColors,
        lineWidth: 2
      });
    },

    //creates Bar chart
    MorrisCharts.prototype.createBarChart = function (element, data, xkey, ykeys, labels, lineColors) {
      Morris.Bar({
        element: element,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        gridLineColor: '#eef0f2',
        barSizeRatio: 0.4,
        resize: true,
        hideHover: 'auto',
        barColors: lineColors
      });
    },

    //creates area chart
    MorrisCharts.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
      Morris.Area({
        element: element,
        pointSize: 0,
        lineWidth: 0,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        labels: labels,
        resize: true,
        gridLineColor: '#eee',
        hideHover: 'auto',
        lineColors: lineColors,
        fillOpacity: .6,
        behaveLikeLine: true
      });
    },

    //creates Donut chart
    MorrisCharts.prototype.createDonutChart = function (element, data, colors) {
      Morris.Donut({
        element: element,
        data: data,
        resize: true,
        colors: colors
      });
    },
    //creates Stacked chart
    MorrisCharts.prototype.createStackedChart = function (element, data, xkey, ykeys, labels, lineColors) {
      Morris.Bar({
        element: element,
        data: data,
        xkey: xkey,
        ykeys: ykeys,
        stacked: true,
        labels: labels,
        hideHover: 'auto',
        barSizeRatio: 0.4,
        resize: true, //defaulted to true
        gridLineColor: '#eeeeee',
        barColors: lineColors
      });
    },
    MorrisCharts.prototype.init = function () {

      //peloncito
      var $data = [
        @php
        $i=1;
        $count=0;
        $tempe=0;
        $hum=0;
        $tempDate=$charts->first()->created_at->format('d F -  H');
        //@dd($tempDate);
        @endphp
        @foreach ($charts as $record)
        @if($record->created_at->format('d F -  H')==$tempDate)
        @php
        $count++;
        $tempe=$tempe + $record->number1 ;
        $hum= $hum + $record->number2;
        @endphp
        @else
        @if($count>0)
        {y: '{{$record->created_at->modify('-6 hours')->format('H:i')}}', a: {{ number_format($tempe / $count)}}, b: {{ number_format($hum / $count, 2)}} },
        @endif
        @php
        $count=0;
        $tempe=0 ;
        $hum= 0;
        @endphp
        @endif

        @php
        $tempDate=$record->created_at->format('d F -  H');
        @endphp
        @endforeach
      ];
      this.createLineChart('morris-line-sensors', $data, 'y', ['a', 'b'], ['Humedad %', 'Temperatura C°'], ['#f5b225', '#1b82ec']);

      //creating bar chart
      var $barData = [
        {y: '2009', a: 100, b: 90},
        {y: '2010', a: 75, b: 65},
        {y: '2011', a: 50, b: 40},
        {y: '2012', a: 75, b: 65},
        {y: '2013', a: 50, b: 40},
        {y: '2014', a: 75, b: 65},
        {y: '2015', a: 100, b: 90},
        {y: '2016', a: 90, b: 75}
      ];
      this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#1b82ec','#f5b225']);

      //creating area chart
      var $areaData = [
        {y: '2007', a: 0, b: 0, c:0},
        {y: '2008', a: 150, b: 45, c:15},
        {y: '2009', a: 60, b: 150, c:195},
        {y: '2010', a: 180, b: 36, c:21},
        {y: '2011', a: 90, b: 60, c:360},
        {y: '2012', a: 75, b: 240, c:120},
        {y: '2013', a: 30, b: 30, c:30}
      ];
      this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a', 'b', 'c'], ['Series A', 'Series B', 'Series C'], ['#ccc', '#f5b225', '#1b82ec']);

      //creating donut chart
      var $donutData = [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ];
      this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#1b82ec', '#f5b225']);

      //creating Stacked chart
      var $stckedData = [
        {y: '2005', a: 45, b: 180},
        {y: '2006', a: 75, b: 65},
        {y: '2007', a: 100, b: 90},
        {y: '2008', a: 75, b: 65},
        {y: '2009', a: 100, b: 90},
        {y: '2010', a: 75, b: 65},
        {y: '2011', a: 50, b: 40},
        {y: '2012', a: 75, b: 65},
        {y: '2013', a: 50, b: 40},
        {y: '2014', a: 75, b: 65},
        {y: '2015', a: 100, b: 90},
        {y: '2016', a: 80, b: 65}
      ];
      this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a', 'b'], ['Series A', 'Series B'], ['#1b82ec', '#f0f1f4']);

    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
  }(window.jQuery),

  //initializing
  function ($) {
    "use strict";
    $.MorrisCharts.init();
  }(window.jQuery);
  </script>
  {{--<script type="text/javascript">
  var chart = new Chartist.Line('#smil-animations', {
    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    series: [
      [12, 9, 7, 8, 5, 4, 6, 2, 3, 3, 4, 6],
      [4,  5, 3, 7, 3, 5, 5, 3, 4, 4, 5, 5],
      [5,  3, 4, 5, 6, 3, 3, 4, 5, 6, 3, 4],
      [3,  4, 5, 6, 7, 6, 4, 5, 6, 7, 6, 3]
    ]
  }, {
    low: 0,
    plugins: [
      Chartist.plugins.tooltip()
    ]
  });

  // Let's put a sequence number aside so we can use it in the event callbacks
  var seq = 0,
  delays = 80,
  durations = 500;

  // Once the chart is fully created we reset the sequence
  chart.on('created', function() {
    seq = 0;
  });

  // On each drawn element by Chartist we use the Chartist.Svg API to trigger SMIL animations
  chart.on('draw', function(data) {
    seq++;

    if(data.type === 'line') {
      // If the drawn element is a line we do a simple opacity fade in. This could also be achieved using CSS3 animations.
      data.element.animate({
        opacity: {
          // The delay when we like to start the animation
          begin: seq * delays + 1000,
          // Duration of the animation
          dur: durations,
          // The value where the animation should start
          from: 0,
          // The value where it should end
          to: 1
        }
      });
    } else if(data.type === 'label' && data.axis === 'x') {
      data.element.animate({
        y: {
          begin: seq * delays,
          dur: durations,
          from: data.y + 100,
          to: data.y,
          // We can specify an easing function from Chartist.Svg.Easing
          easing: 'easeOutQuart'
        }
      });
    } else if(data.type === 'label' && data.axis === 'y') {
      data.element.animate({
        x: {
          begin: seq * delays,
          dur: durations,
          from: data.x - 100,
          to: data.x,
          easing: 'easeOutQuart'
        }
      });
    } else if(data.type === 'point') {
      data.element.animate({
        x1: {
          begin: seq * delays,
          dur: durations,
          from: data.x - 10,
          to: data.x,
          easing: 'easeOutQuart'
        },
        x2: {
          begin: seq * delays,
          dur: durations,
          from: data.x - 10,
          to: data.x,
          easing: 'easeOutQuart'
        },
        opacity: {
          begin: seq * delays,
          dur: durations,
          from: 0,
          to: 1,
          easing: 'easeOutQuart'
        }
      });
    } else if(data.type === 'grid') {
      // Using data.axis we get x or y which we can use to construct our animation definition objects
      var pos1Animation = {
        begin: seq * delays,
        dur: durations,
        from: data[data.axis.units.pos + '1'] - 30,
        to: data[data.axis.units.pos + '1'],
        easing: 'easeOutQuart'
      };

      var pos2Animation = {
        begin: seq * delays,
        dur: durations,
        from: data[data.axis.units.pos + '2'] - 100,
        to: data[data.axis.units.pos + '2'],
        easing: 'easeOutQuart'
      };

      var animations = {};
      animations[data.axis.units.pos + '1'] = pos1Animation;
      animations[data.axis.units.pos + '2'] = pos2Animation;
      animations['opacity'] = {
        begin: seq * delays,
        dur: durations,
        from: 0,
        to: 1,
        easing: 'easeOutQuart'
      };

      data.element.animate(animations);
    }
  });

  // For the sake of the example we update the chart every time it's created with a delay of 10 seconds
  chart.on('created', function() {
    if(window.__exampleAnimateTimeout) {
      clearTimeout(window.__exampleAnimateTimeout);
      window.__exampleAnimateTimeout = null;
    }
    window.__exampleAnimateTimeout = setTimeout(chart.update.bind(chart), 12000);
  });



  //Simple line chart
  new Chartist.Line('#simple-line-chart1', {
    labels: [
      @foreach($charts->reverse() as $chart)
      '{{$chart->created_at->modify('-6 hours')->format('H:i')}}',
      @endforeach
    ],
    series: [
      [
        @foreach($charts->reverse() as $chart)
        {{$chart->number1 }} ,
        @endforeach
      ],
      [
        @foreach($charts->reverse() as $chart)
        {{$chart->number2}},
        @endforeach
      ],
    ]
  }, {
    fullWidth: true,
    chartPadding: {
      right: 40
    },
    plugins: [
      Chartist.plugins.tooltip()
    ]
  });




  //Line Scatter Diagram
  var times = function(n) {
    return Array.apply(null, new Array(n));
  };

  var data = times(52).map(Math.random).reduce(function(data, rnd, index) {
    data.labels.push(index + 1);
    data.series.forEach(function(series) {
      series.push(Math.random() * 100)
    });

    return data;
  }, {
    labels: [],
    series: times(4).map(function() { return new Array() })
  });

  var options = {
    showLine: false,
    axisX: {
      labelInterpolationFnc: function(value, index) {
        return index % 13 === 0 ? 'W' + value : null;
      }
    }
  };

  var responsiveOptions = [
    ['screen and (min-width: 640px)', {
      axisX: {
        labelInterpolationFnc: function(value, index) {
          return index % 4 === 0 ? 'W' + value : null;
        }
      }
    }]
  ];

  new Chartist.Line('#scatter-diagram', data, options, responsiveOptions);



  //Line chart with area

  new Chartist.Line('#chart-with-area', {
    labels: [1, 2, 3, 4, 5, 6, 7, 8],
    series: [
      [5, 9, 7, 8, 5, 3, 5, 4]
    ]
  }, {
    low: 0,
    showArea: true,
    plugins: [
      Chartist.plugins.tooltip()
    ]
  });


  //Overlapping bars on mobile

  var data = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    series: [
      [5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
      [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4]
    ]
  };

  var options = {
    seriesBarDistance: 10
  };

  var responsiveOptions = [
    ['screen and (max-width: 640px)', {
      seriesBarDistance: 5,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value[0];
        }
      }
    }]
  ];

  new Chartist.Bar('#overlapping-bars', data, options, responsiveOptions);




  //Stacked bar chart

  new Chartist.Bar('#stacked-bar-chart', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6'],
    series: [
      [800000, 1200000, 1400000, 1300000, 1520000, 1400000],
      [200000, 400000, 500000, 300000, 452000, 500000],
      [160000, 290000, 410000, 600000, 588000, 410000]
    ]
  }, {
    stackBars: true,
    axisY: {
      labelInterpolationFnc: function(value) {
        return (value / 1000) + 'k';
      }
    },
    plugins: [
      Chartist.plugins.tooltip()
    ]
  }).on('draw', function(data) {
    if(data.type === 'bar') {
      data.element.attr({
        style: 'stroke-width: 30px'
      });
    }
  });





  //Animating a Donut with Svg.animate

  var chart = new Chartist.Pie('#animating-donut', {
    series: [10, 20, 50, 20, 5, 50, 15],
    labels: [1, 2, 3, 4, 5, 6, 7]
  }, {
    donut: true,
    showLabel: false,
    plugins: [
      Chartist.plugins.tooltip()
    ]
  });

  chart.on('draw', function(data) {
    if(data.type === 'slice') {
      // Get the total path length in order to use for dash array animation
      var pathLength = data.element._node.getTotalLength();

      // Set a dasharray that matches the path length as prerequisite to animate dashoffset
      data.element.attr({
        'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
      });

      // Create animation definition while also assigning an ID to the animation for later sync usage
      var animationDefinition = {
        'stroke-dashoffset': {
          id: 'anim' + data.index,
          dur: 1000,
          from: -pathLength + 'px',
          to:  '0px',
          easing: Chartist.Svg.Easing.easeOutQuint,
          // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
          fill: 'freeze'
        }
      };

      // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
      if(data.index !== 0) {
        animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
      }

      // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
      data.element.attr({
        'stroke-dashoffset': -pathLength + 'px'
      });

      // We can't use guided mode as the animations need to rely on setting begin manually
      // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
      data.element.animate(animationDefinition, false);
    }
  });

  // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
  chart.on('created', function() {
    if(window.__anim21278907124) {
      clearTimeout(window.__anim21278907124);
      window.__anim21278907124 = null;
    }
    window.__anim21278907124 = setTimeout(chart.update.bind(chart), 10000);
  });




  //Simple pie chart

  var data = {
    series: [5, 3, 4]
  };

  var sum = function(a, b) { return a + b };

  new Chartist.Pie('#simple-pie', data, {
    labelInterpolationFnc: function(value) {
      return Math.round(value / data.series.reduce(sum) * 100) + '%';
    }
  });


  </script> --}}
@endsection
