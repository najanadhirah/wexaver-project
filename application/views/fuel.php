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
    <link href="../assets/home/vendor/style.css" rel="stylesheet">

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
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/motor">Insurans Kenderaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/fuel">Petrol & Diesel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/grocer">Barang Dapur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/insurance">Manfaat Perlindungan</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/faq">FAQ</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="<?php echo base_url()?>welcome/table">Log Masuk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <div class="card">
      <div class="card text-center" style="padding-top: 10%" >
        <!-- <div class="card-header">Manfaat Petrol & Diesel</div> -->
          <div class="card-body" >
            <h5 class="card-title">Beli petrol atau diesel dan dapatkan ganjaran tunai 3 sen setiap liter</h5>
              <div class="row">
                <div class="card col-sm-4" style=" border: transparent;">
                  <br>
                  <i class="fa fa-users" style="font-size:68px;color:black"></i>
                  <div class="card-body">
                    <p class="card-text">Pengguna kenderaan yang ingin mengisi petrol dan diesel di semua stesen minyak jenama Petronas.</p>
                  </div>
                </div>
                <div class="card col-sm-4" style=" border: transparent;">
                  <br>
                  <i class="fa fa-credit-card" style="font-size:68px;color:black"></i>
                  <div class="card-body">
                    <p class="card-text">Guna kad Wexaver untuk pembelian Petrol dan Diesel di stesen minyak jenama Petronas.</p>
                  </div>
                </div>
                <div class="card col-sm-4" style=" border: transparent;">
                  <br>
                  <i class="fa fa-money" style="font-size:68px;color:black"></i>
                  <div class="card-body">
                    <p class="card-text">Dapatkan ganjaran tunai 3 sen untuk setiap liter pembelian petrol dan diesel sepanjang tahun.</p>
                  </div>
                </div>
              </div>
          </div>
          <div class="card-header">Kalkulator Penjimatan</div>
          <div class="card-body" >
            <div class="container">
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-8">

                  
<form>
                 <select class="col-sm-8 form-control form-control-sm" name="term">
                   <option value = 2.20>RON 95</option>
                   <option value = 2.18>DIESEL</option>
                 </select>
                 <br>
                 <div class="form-group row">
                   <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jumlah Perbelanjaan</label>
                   <div class="col-sm-6">
                     <input type="email" class="form-control form-control-sm" name="nprice">
                   </div>
                 </div>
                 <div class="form-group row">
                   <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm" style="text-align: left;">Harga Petrol &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; RM</label>
                   <div class="col-sm-2">
                    <!--  <input type="email" id = "fuelprice" class="form-control form-control-sm"> -->
                     <div id = "fuelprice" style="font-size: 18px; font-weight: bold; padding-top: 2%; color: #000; text-align: left"> 0 </div>
                   </div>
                 </div>
                 <button type="button" class="btn btn-outline-success" onclick="calcpayments()">KIRA</button>

                 <br>

                 <div class="form-group row">
                   <label for="cashback" class="col-sm-6 col-form-label" style="font-size: 20px; font-weight: bold; text-align: left; color: black;"> Jumlah Ganjaran Tunai &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; RM</label>
                   <div class="col-sm-3">
                     <div id = "monthlypayment" style="font-size: 25px; font-weight: bold; padding-top: 2%; color: #000; text-align: left;">0 </div>
                   </div>
                 </div>

                 </form>
                </div>
              </div>
            </div>
          </div>  
        </div>
    </div>

    <!-- Footer -->
    <footer>
      <center>
      <a href="<?php echo base_url()?>welcome/table" class="btn btn-success btn-lg active" role="button" aria-pressed="true">DAFTAR</a></center>
      <br>
      <div class="container text-center">
        <p>Copyright &copy; Your Website 2018</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../assets/home/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../assets/home/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../assets/home/vendor/js/grayscale.js"></script>

  </body>

</html>


