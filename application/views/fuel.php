


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <div class="card">
      <div class="card text-center" style="padding-top: 10%" >
        <!-- <div class="card-header">Manfaat Petrol & Diesel</div> -->
          <div class="card-body" >
            <h5 class="card-title"  style="font-family: &quot;Droid Serif&quot;, serif; font-size: 30px; color: black;">Beli petrol atau diesel dan dapatkan ganjaran tunai 3 sen setiap liter</h5>
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
