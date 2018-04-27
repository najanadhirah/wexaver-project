
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Register Offline</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for bootstrap form wizard demos using Twitter Bootstrap Wizard Plugin" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="index.html">
                            <img src="/assets/layouts/layout/img/wexaver.png" alt="logo" class="logo-default" /> </a>
                        <!-- <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div> -->
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    END RESPONSIVE MENU TOGGLER -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                

                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content" style="padding-top:25px;">
                        <!-- BEGIN PAGE HEADER-->
                        <div class="container">
                        <!-- BEGIN PAGE TITLE
                        <h1 class="page-title"> Bootstrap Form Wizard
                            <small>bootstrap form wizard demos using Twitter Bootstrap Wizard Plugin</small>
                        </h1>
                        END PAGE TITLE -->
                        &nbsp;
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- <div class="m-heading-1 border-green m-bordered">
                                    <h3>Twitter Bootstrap Wizard Plugin</h3>
                                    <p> This twitter bootstrap plugin builds a wizard out of a formatter tabbable structure. It allows to build a wizard functionality using buttons to go through the different wizard steps and using events allows to hook into
                                        each step individually. </p>
                                    <p> For more info please check out
                                        <a class="btn red btn-outline" href="http://vadimg.com/twitter-bootstrap-wizard-example" target="_blank">the official documentation</a>
                                    </p>
                                </div> -->
                                <div class="portlet light bordered" id="form_wizard_1">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-red"></i>
                                            <span class="caption-subject font-red bold uppercase"> Register Membership -
                                                <span class="step-title"> Offline </span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-cloud-upload"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-wrench"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form class="form-horizontal" action="#" id="submit_form" method="POST">
                                            <div class="form-wizard">
                                                <div class="form-body">
                                                    <ul class="nav nav-pills nav-justified steps">
                                                        <li>
                                                            <a href="#tab1" data-toggle="tab" class="step">
                                                                <span class="number"> 1 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Account Setup </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab2" data-toggle="tab" class="step">
                                                                <span class="number"> 2 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Profile Setup </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab3" data-toggle="tab" class="step active">
                                                                <span class="number"> 3 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Billing Setup </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#tab4" data-toggle="tab" class="step">
                                                                <span class="number"> 4 </span>
                                                                <span class="desc">
                                                                    <i class="fa fa-check"></i> Confirm </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div id="bar" class="progress progress-striped" role="progressbar">
                                                        <div class="progress-bar progress-bar-success"> </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="alert alert-danger display-none">
                                                            <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                        <div class="alert alert-success display-none">
                                                            <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                        <div class="tab-pane active" id="tab1">
                                                            <h3 class="block">Provide your account details</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Username
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="username" />
                                                                    <span class="help-block"> Provide your username </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Password
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="password" class="form-control" name="password" id="submit_form_password" />
                                                                    <span class="help-block"> Provide your password. </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Confirm Password
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="password" class="form-control" name="rpassword" />
                                                                    <span class="help-block"> Confirm your password </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Email
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="email" />
                                                                    <span class="help-block"> Provide your email address </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab2">
                                                            <h3 class="block">Provide your profile details</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Fullname
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="fullname" />
                                                                    <span class="help-block"> Provide your fullname </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Phone Number
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="phone" />
                                                                    <span class="help-block"> Provide your phone number </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <div class="radio-list">
                                                                        <label>
                                                                            <input type="radio" name="gender" value="M" data-title="Male" /> Male </label>
                                                                        <label>
                                                                            <input type="radio" name="gender" value="F" data-title="Female" /> Female </label>
                                                                    </div>
                                                                    <div id="form_gender_error"> </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="address" />
                                                                    <span class="help-block"> Provide your street address </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City/Town
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="city" />
                                                                    <span class="help-block"> Provide your city or town </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country</label>
                                                                <div class="col-md-4">
                                                                    <select name="country" id="country_list" class="form-control">
                                                                        <option value=""></option>
                                                                        <option value="AF">Afghanistan</option>
                                                                        <option value="AL">Albania</option>
                                                                        <option value="DZ">Algeria</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Remarks</label>
                                                                <div class="col-md-4">
                                                                    <textarea class="form-control" rows="3" name="remarks"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab3">
                                                            <h3 class="block">Provide your billing and credit card details</h3>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Card Holder Name
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="card_name" />
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Card Number
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="card_number" />
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">CVC
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" placeholder="" class="form-control" name="card_cvc" />
                                                                    <span class="help-block"> </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Expiration(MM/YYYY)
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" placeholder="MM/YYYY" maxlength="7" class="form-control" name="card_expiry_date" />
                                                                    <span class="help-block"> e.g 11/2020 </span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Payment Options
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <div class="checkbox-list">
                                                                        <label>
                                                                            <input type="checkbox" name="payment[]" value="1" data-title="Auto-Pay with this Credit Card." /> Auto-Pay with this Credit Card </label>
                                                                        <label>
                                                                            <input type="checkbox" name="payment[]" value="2" data-title="Email me monthly billing." /> Email me monthly billing </label>
                                                                    </div>
                                                                    <div id="form_payment_error"> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab4">
                                                            <h3 class="block">Confirm your account</h3>
                                                            <h4 class="form-section">Account</h4>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Username:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="username"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Email:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="email"> </p>
                                                                </div>
                                                            </div>
                                                            <h4 class="form-section">Profile</h4>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Fullname:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="fullname"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Gender:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="gender"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Phone:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="phone"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="address"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">City/Town:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="city"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="country"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Remarks:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="remarks"> </p>
                                                                </div>
                                                            </div>
                                                            <h4 class="form-section">Billing</h4>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Card Holder Name:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="card_name"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Card Number:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="card_number"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">CVC:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="card_cvc"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Expiration:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="card_expiry_date"> </p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Payment Options:</label>
                                                                <div class="col-md-4">
                                                                    <p class="form-control-static" data-display="payment[]"> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <a href="javascript:;" class="btn default button-previous">
                                                                <i class="fa fa-angle-left"></i> Back </a>
                                                            <a href="javascript:;" class="btn btn-outline green button-next"> Continue
                                                                <i class="fa fa-angle-right"></i>
                                                            </a>
                                                            <a href="javascript:;" class="btn green button-submit"> Submit
                                                                <i class="fa fa-check"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                    </div>
                
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2018 &copy; Wexaver Smart Saver</div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="/assets/global/plugins/respond.min.js"></script>
<script src="/assets/global/plugins/excanvas.min.js"></script> 
<script src="/assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

<!-- End -->
</body>


</html>