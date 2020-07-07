@extends ('layouts.master')

@section('title', 'Wisata')

@section('header')

@section('slidebar')

@section('content')

  @foreach($wisata as $w)
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      {{$w->nama_wisata}}
      </h1>
      <div class="meta">
            <div>{{$w->rating_wisata}}<span class="fa fa-star"></span></div>
      </div>
      <ol class="breadcrumb">
      <h4>
        <li><a href="/daftar_wisata"><i class="fa fa-home"></i> </a> <  <a href="#"> {{$w->nama_wisata}} </a></li>
        </h4>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <br>
    <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{round($avg_tiket)}}</h3>
              <p>Tiket Terjual</p>
            </div>
            <div class="icon">
              <i class="fa fa-ticket"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{round($avg_pengunjung)}}<sup style="font-size: 20px"></sup></h3>
              <p>Pengunjung</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{round($avg_pendapatan)}}</h3>
              <p>Pendapatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-xs-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="chartLine"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-lg-6 col-xs-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="container"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-lg-6 col-xs-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="chartBar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       
    </div>
    <a href="/daftar_wisata/export_excel"  class="btn btn-primary pull-right" style="width:15%"><i class="fa fa-download"></i> Download File</a>
    <br>
    </section>
    <!-- /.content -->
  </div>
  @endforeach
@endsection

@section('footer')
@section('aside')
@stop
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chartBar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Pengunjung'
    },
    // subtitle: {
    //     text: 'Source: WorldClimate.com'
    // },
    xAxis: {
        categories: {!!json_encode($bulan)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Pengunjung'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Pengunjung',
        data: {!!json_encode($hasil_pengunjung)!!}
    }]
});
</script>

<script>
  Highcharts.chart('chartLine', {

title: {
    text: 'Grafik Pendapatan'
},

// subtitle: {
//     text: 'Source: thesolarfoundation.com'
// },

yAxis: {
    title: {
        text: 'Pendapatan'
    }
},

xAxis: {
        categories: {!!json_encode($bulan)!!},
        crosshair: true
    },

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

// plotOptions: {
//     series: {
//         label: {
//             connectorAllowed: false
//         },
//         pointStart: 2010
//     }
// },

series: [{
    name: 'Rupiah',
    data: {!!json_encode($hasil_pendapatan)!!}
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>

<script>
  Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Grafik Penjualan Tiket'
    },
    // subtitle: {
    //     text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    // },
    xAxis: {
        categories: {!!json_encode($bulan)!!},
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        // title: {
        //     text: 'Population (millions)',
        //     align: 'high'
        // },
        labels: {
            overflow: 'justify'
        }
    },
    // tooltip: {
    //     valueSuffix: ' millions'
    // },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Tiket',
        data: {!!json_encode($tiket)!!}}]
});
</script>
@stop