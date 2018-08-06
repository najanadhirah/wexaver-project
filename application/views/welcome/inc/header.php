<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wexaver Smart Saver</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../assets/home/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../assets/home/vendor/css/grayscale.css" rel="stylesheet">
    <link href="../assets/home/newcustom.css" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script language="JavaScript" type="text/javascript">
     function calcpayments()

     {
     var nprice=document.forms[0].nprice.value;

     var t;

     for (i=0; i<document.forms[0].term.options.length; i++)

     {

     if (document.forms[0].term.options[i].selected)
     t = document.forms[0].term.options[i].value;
     }

     var result1=(nprice/t) * 0.03 ;
     var result = result1.toFixed(2); 

     document.getElementById("monthlypayment").innerHTML=result;
     document.getElementById("fuelprice").innerHTML=t;

     }
   </script>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo base_url()?>welcome/home">WeXaver</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/aboutus">Tentang Kami</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/motor">Insuran Kenderaan</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/fuel"></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/grocer">Barang Dapur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/insurance">Manfaat Perlindungan</a>
            </li>
           <!--  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/faq">FAQ</a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Petrol & SME
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: linear-gradient(to right top, rgb(31, 128, 104), rgb(43, 68, 132)) rgb(31, 128, 104);">
                  <a class="dropdown-item" href="<?php echo base_url()?>welcome/fuel">Petrol & Diesel</a>
                  <a class="dropdown-item" href="<?php echo base_url()?>welcome/sme">SME</a>
<!--                   <div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Something else here</a> -->
                </div>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>user/login">Log Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
