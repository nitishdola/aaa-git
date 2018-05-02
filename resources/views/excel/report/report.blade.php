@extends('layout')

@section('content')
<div class="row">
   <div class="col-lg-12 col-md-12">
      <div class="card">
         <div class="header">
            <h4 class="title"></h4>
         </div>
         <div class="content">
            <div class="row">
               <div class="col-md-12">
                  <div id="chartContainer" style="height: 500px; width: 100%;"></div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
         <hr>
         <div class="content" style="margin-top:10px;">
            <div class="row">
               <div class="col-md-12">
                  <div id="hospitalChartContainer" style="height: 500px; width: 100%;"></div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>


      </div>
   </div>
</div>
@stop

@section('pageJs')
<script>
  var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: ""
  },

  credits: {
      enabled: false
  },

  data: [{
    type: "pie",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: {y}% ({adata})",
    //showInLegend: "true",
    //legendText: "{label}",

    exportFileName: "Current Status Report",

    indexLabelFontSize: 16,
    indexLabel: "{label} - {y}% ({adata})",
    dataPoints: [
      { y: {{ round( (($admission_submitted/$total)*100),2 )  }}, label: "Admission Submitted", 'adata' : {{ $admission_submitted }} },
      { y: {{ round( (($arogyamitra_out_patient/$total)*100),2 ) }}, label: "Arogyamitra Out patient", 'adata' : {{ $arogyamitra_out_patient }} },
      { y: {{ round( (($discharge_summary_submitted/$total)*100),2 ) }}, label: "Discharge Summary Submitted", 'adata' : {{ $discharge_summary_submitted }} },
      { y: {{ round( (($in_patient_case_registered/$total)*100),2 ) }}, label: "In Patient Case registered", 'adata' : {{ $in_patient_case_registered }} },
      { y: {{ round( (($preauth_approved/$total)*100),2 ) }}, label: "Pre Auth Approved", 'adata' : {{ $preauth_approved }} },
      { y: {{ round( (($preauth_pending_by_tpa/$total)*100),2 ) }}, label: "Pre Auth Pending By TPA", 'adata' : {{ $preauth_pending_by_tpa }} },
      { y: {{ round( (($preauth_rejected/$total)*100),2 ) }}, label: "Pre Auth Rejected", 'adata' : {{ $preauth_rejected }} },
      { y: {{ round( (($pending_preauth_replied_by_hospital/$total)*100),2 ) }}, label: "Pending pre auth replied by TPA", 'adata' : {{ $pending_preauth_replied_by_hospital }} },
      { y: {{ round( (($preauth_request_sent/$total)*100),2 ) }}, label: "Pre Auth Request Sent", 'adata' : {{ $preauth_request_sent }} },

      { y: {{ round( (($claims_pending_by_tpa/$total)*100),2 ) }}, label: "Claims Pending By TPA", 'adata' : {{ $claims_pending_by_tpa }} }
    ]
  }]
});
chart.render();



var hospital_chart = new CanvasJS.Chart("hospitalChartContainer", {
  theme: "light1", // "light1", "light2", "dark1", "dark2"
  exportEnabled: true,
  animationEnabled: true,
  title: {
    text: ""
  },

  credits: {
      enabled: false
  },

  data: [{
    type: "pie",
    startAngle: 25,
    toolTipContent: "<b>{label}</b>: {y}% ({adata})",
    //showInLegend: "true",
   // legendText: "{label}",
    exportFileName: "Hospital Report",
    indexLabelFontSize: 16,
    indexLabel: "{label} - {y} ({adata})%",
    dataPoints: [
      { y: {{ round( (($bbci/$total)*100),2 )  }}, label: "B. Barooah Cancer Institute", 'adata' : {{ $bbci }} } ,
      { y: {{ round( (($gmch/$total)*100),2 ) }}, label: "Guwahati Medical College & Hospital", 'adata' : {{ $gmch }} },
      { y: {{ round( (($gmc_cancer/$total)*100),2 ) }}, label: "GMC Cancer Hospital", 'adata' : {{ $gmc_cancer }} },
      { y: {{ round( (($smch/$total)*100),2 ) }}, label: "Silchar Medical College & Hospital", 'adata' : {{ $smch }} },
      { y: {{ round( (($nsh/$total)*100),2 ) }}, label: "Narayana Superspeciality Hospital", 'adata' : {{ $ash }} },
      { y: {{ round( (($ash/$total)*100),2 ) }}, label: "Ayursundra Superspeciality Hospital", 'adata' : {{ $ash }} },
      { y: {{ round( (($dth/$total)*100),2 ) }}, label: "Downtown Hospital", 'adata' : {{ $dth }} },
      { y: {{ round( (($hayat/$total)*100),2 ) }}, label: "Hayat Hospital", 'adata' : {{ $hayat }} },
      { y: {{ round( (($marwari/$total)*100),2 ) }}, label: "Marwari Hospitals", 'adata' : {{ $marwari }} },
      
      { y: {{ round( (($jmc/$total)*100),2 ) }}, label: "Jorhat Medical College", 'adata' : {{ $jmc }}},
      { y: {{ round( (($rtiics/$total)*100),2 ) }}, label: "Rabindranath Tagore International Institute Of Cardiac Sciences", 'adata' : {{ $rtiics }} },
      { y: {{ round( (($faamc/$total)*100),2 ) }}, label: "Fakhruddin Ali Ahmed Medical College", 'adata' : {{ $faamc }} },
      { y: {{ round( (($amch/$total)*100),2 ) }}, label: "Assam Medical College & Hospital", 'adata' : {{ $amch }} },
      { y: {{ round( (($cchrc/$total)*100),2 ) }}, label: "Cachar Cancer Hospital & Research Centre", 'adata' : {{ $cchrc }} },
      { y: {{ round( (($nemcare/$total)*100),2 ) }}, label: "Nemcare Hospital" , 'adata' : {{ $nemcare }}},
      { y: {{ round( (($gnrc_dispur/$total)*100),2 ) }}, label: "GNRC Dispur", 'adata' : {{ $gnrc_dispur }} },
      { y: {{ round( (($narayana_hrid/$total)*100),2 ) }}, label: "Narayana Hrudalya", 'adata' : {{ $narayana_hrid }} },
      { y: {{ round( (($dpnh/$total)*100),2 ) }}, label: "Dispur Polyclinic & Nursing Home" , 'adata' : {{ $dpnh }}},

      { y: {{ round( (($hcgh/$total)*100),2 ) }}, label: "HCG Hospital" , 'adata' : {{ $hcgh }}}
      

    ]
  }]
});
hospital_chart.render();
</script>
@stop