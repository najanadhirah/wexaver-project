    <!-- Custom styles for this template -->
    <link href="/assets/home/sme.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <header>
      <div class="container text-center">
        <img src="/assets/home/images/wexaver-logo.png" style=" width:40%; height: 4%;padding-bottom: 2%;"><br>
        <img src="/assets/home/images/petronas.png" style="width: 10%;padding-bottom: 2%">

        <p class="lead" style="font-size: 32px"><b>PETRONAS Fuel Cards Partner</b></p>
      </div>
    </header>
      <br>
    
    <!-- first -->
    <div class="first">
        <h3 style="color: green;padding-bottom: 2%" >POWER YOUR BUSINESS WITH PETRONAS FUEL CARDS</h3>
        <img src="/assets/home/images/Card.jpg" style="padding-bottom: 25px;width: 25%;display: block;margin: auto;">
        <h5 class="card-title">We are the right partner to help you to save on fuel costs and maximize your profit.</h5>
        <p class="card-text" style="font-size: 16px;">With PETRONAS fuel card, you can improve fuel efficiency, save money and focus on the most important aspect of business - GROWTH.</p>
    </div>     
    <!-- end first -->
    <h3 style="color: green;text-align: center;" >BENEFITS OF PETRONAS FUEL CARDS</h3>
    <div class="container">
    <br>
    <!-- second -->
      <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs" id="benefits" role="tablist" style="margin-left: 30%">
  <li class="nav-item" >
    <a class="nav-link active" id="cashback-tab" data-toggle="tab" href="#cashback" role="tab" aria-controls="cashback" aria-selected="true">Cashback</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" aria-selected="false">Security</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Network</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="control-tab" data-toggle="tab" href="#control" role="tab" aria-controls="control" aria-selected="false">Control</a>
  </li>
</ul>
  </div>
    <div class="tab-content" id="benefitsContent" >
      <div class="tab-pane fade show active" id="cashback" role="tabpanel" aria-labelledby="cashback-tab">
      <img src="/assets/home/images/cashback-icon.jpg" style="padding-top: 5%">
        <div class="card-body">
        <h5 class="card-title">CASHBACK ON YOUR FUEL PURCHASE</h5>
        <p class="card-text">Enjoy up to 3 cents cashback for every liter of Petrol/Diesel you fill up.​</p>
        </div>
      </div>

      <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
      <img src="/assets/home/images/security-icon.jpg" style="padding-top: 5%">
        <div class="card-body">
          <h5 class="card-title">SECURITY & REPORTING</h5>
          <p class="card-text">PIN Protection and online monitoring tools make Petronas fuel cards one of the most secure ways to purchase fuel.</p>
        </div>
      </div>

      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <img src="/assets/home/images/network-icon.jpg" style="padding-top: 5%">
        <div class="card-body">
          <h5 class="card-title">PETRONAS NETWORK</h5>
          <p class="card-text">Have access to more than 1,000 Petronas' stations nation wide.</p>
        </div>
      </div>

      <div class="tab-pane fade" id="control" role="tabpanel" aria-labelledby="control-tab">
      <img src="/assets/home/images/control-icon.jpg" style="padding-top: 5%">
        <div class="card-body">
          <h5 class="card-title">CONTROL</h5>
          <p class="card-text">Manage what, where, when and how cards are used by drivers
.</p>
        </div>
      </div>

  </div>


  </div>
    <!-- end second -->
     <h3 style="color: green;text-align: center;padding-top: 5%" >Get Petronas Fuel Cards today and enjoy fuel cashback<br>on every litre you fill up</h3>
      <div class="first">
        <img src="/assets/home/images/down.gif" style="width: 5%;height: 5%">
        <br>
        <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg" style="color: red;">Get Card Now !!</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Card Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>welcome/sme" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Company Name:</label>
            <input type="text" class="form-control" name="company_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Mobile Phone:</label>
            <input type="text" class="form-control" name="phone_number">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Address:</label>
            <textarea class="form-control" name="address"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Postcode:</label>
            <input type="text" class="form-control" name="postcode">
          </div>
          <div class="form-group" style="text-align: center;">
            <label for="spend">Monthly Petrol Spend:</label>
            <select class="form-control" name="petrol_spend">
              <option value='RM1 - RM100'>RM1 - RM100</option>
              <option value='RM101 - RM200'>RM101 - RM200</option>
              <option value='RM201 - RM300'>RM201 - RM300</option>
              <option value='RM301 - RM400'>RM301 - RM400</option>
              <option value='&gt; RM401'>&gt; RM401</option>
            </select>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">YES, I'M INTERESTED</button>
      </div>
    </div>
  </div>
</div>
</form>
      </div>
    </div>
    
  <br>
    <!-- Bootstrap core JavaScript -->
    <script src="/assets/home/vendor/jquery/jquery.js"></script>
    <script src="/assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/assets/home/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="/assets/home/vendor/js/sme.js"></script>

  </body>

</html>
