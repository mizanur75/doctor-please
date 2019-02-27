<!DOCTYPE html>
<html>
<head>
  
  <script type='application/ld+json'> 
    {
      "@context": "http://www.schema.org",
      "@type": "WebSite",
      "name": "Doctor Please",
      "alternateName": "Doctor Please",
      "url": "http://doctorplease.com.bd/"
    }
 </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-129662197-1', 'auto');
  ga('require', 'GTM-P2GD65D');
  ga('send', 'pageview');
</script>
<title>@yield('title')</title>
<meta charset="utf-8">
<meta name="keywords" content="Online Telemedicine,doctor doctor please, doctorplease, doctor please Online Telemedicine, Unani Medicine, doctor please Unani Medicine, Unani Treatment, doctor please Unani Treatment, Free Helth Tips, doctor please Free Helth Tips, free natural health tips, doctor please free natural health tips, natural health tips, health tips, daily health tips, free health tips for men, free health tips for women, Helth Care, Online Helth Care, Free Doctor, Online Free Treatment, Herbal Treatment, Herbal Medicine, Telemedicine Blog, Herbal Blog, Unani Blog, Free Telemedicine Treatment, online medicine, health medicine, Unani medicine, unani medicine bd, ayurveda medicine, sex power medicine, sexual medicine, male enhancement pills, health medicine, diabetes, diabetes treatment, free diabetes treatment, diabetes medicine, type2 diabetes treatment, telehealth, Telemedicine, Natural medicine Doctor, online doctor, online doctor in bangladesh, online doctor in dhaka, bd doctor, hello doctor, doctor please, bangladeshi doctor, online doctor bd, online doctor help, Telemedicine in bangladesh, doctor please Telemedicine in bangladesh, gk pharma, gk pharma unani ltd, gk pharma online health service, online health service for natural treatment, online health service, uses of internet in health, importance of internet in health, use of internet in healthcare industry, gk pharma live health online, alternative health care, holistic health definition, impact of internet on health care, online health services in bangladesh, free online doctor help in bangladesh, online chat with doctor in bangladesh, gk pharma health line number, gk pharma doctor helpline, e health in bangladesh, free online doctor help in bangladesh, online chat with doctor in bangladesh, online prescription bd, doctor please online health service, banglalink doctor helpline, gk pharma online doctor, gk pharma health care, gk pharma doctor helpline, bangladeshi doctor prescription, health tips bangla book, body health tips bangla, health tips bangla youtube, bangla health tips bd, bangla health tips facebook, bangla health magazine, long time sex medicine name in Bangladesh, sex tablet name for male, sex tablets for men without side effects" />
<meta name="description" content="Doctor Please, GK Pharma Online Health Service in Bangladesh for Natural Treatment. It is an Online Telemedicine sytem for Free to see a Doctor" />
<meta name="author" content="nanoworkerbd.com | Mohammad Saiful Islam">
<meta name="google-site-verification" content="TRLqgfZzlMbfa3nJuDaDayXsQe2L6NIJMbWby2mKwtU" />
<meta name="msvalidate.01" content="ED40933C7720DF7ACAE510BFDC672E38" />
<meta http-equiv="refresh" content="600">
<meta name="robots" content="all">
@yield('meta')
<!-- Stylesheets -->
<link href="{{url('css/bootstrap.css')}}" rel="stylesheet">
<link href="{{url('css/revolution-slider.css')}}" rel="stylesheet">
<link href="{{url('css/style.css')}}" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="{{url('css/responsive.css')}}" rel="stylesheet">
<link rel="icon" href="{{asset('images/favicon.ico')}}">

@stack('css')
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=1114136335427918&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="page-wrapper">

    <div class="preloader"></div>

    @include('layouts.header')

   
   	@yield('front')


    @include('layouts.footer')

</div>

<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>

<script src="{{url('js/jquery.js')}}"></script>
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/revolution.min.js')}}"></script>
<script src="{{url('js/jquery.fancybox.pack.js')}}"></script>
<script src="{{url('js/jquery.fancybox-media.js')}}"></script>
<script src="{{url('js/owl.js')}}"></script>
<script src="{{url('js/wow.js')}}"></script>
<script src="{{url('js/script.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57c7b3fa7f1eca21"></script>
@stack('scripts')
</body>
</html>
