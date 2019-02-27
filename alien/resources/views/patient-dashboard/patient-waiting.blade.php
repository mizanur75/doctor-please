@extends('patient-dashboard.patient-home')
@section('heading','Patient Request')
@section('title',' Waiting')
@section('content')
<style>
.sonar-wrapper {position: relative;z-index: 0;overflow: hidden;padding: 8rem 0;}
.sonar-emitter {position: relative;margin: 0 auto;width: 275px;height: 275px;border-radius: 9999px;background-color: HSL(45,100%,50%);}
.sonar-wave {position: absolute;top: 0;left: 0;width: 100%;height: 100%;border-radius: 9999px;background-color: HSL(45,100%,50%);opacity: 0;z-index: -1;pointer-events: none;}
.sonar-wave {animation: sonarWave 2s linear infinite;}
@keyframes sonarWave {
  from {opacity: 0.4;}
  to {transform: scale(3);opacity: 0;}
}
</style>
<div class="container">

  <div class="row">
    <div class="col-sm-12 col-xs-12">

       <div class="row">

         <div class="col-md-12 box mar-top10 academic text-center">

           <div class="alert alert-success" role="alert">
            <h2>{{$sMessage}}</h2>
           </div>

           <div class="alert alert-danger" role="alert">
            <h2 class="text-danger"><strong>{{$iTime}}</strong> মিনিট পরে আপনার কাংখিত ডাক্তার কে ফোন করুন এই নম্বরে {{$qDoctorPhone->mobile}}</h2>
           </div>

           <div class="sonar-wrapper">
          	<div class="sonar-emitter">
              <div class="sonar-wave"></div>
            </div>
           </div>

         </div>

       </div>
    </div>

  </div>
</div>

@endsection
