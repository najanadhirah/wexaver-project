<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Wexaver</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <?php echo $css_page_level_plugins ?>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <?php echo $css_page_level_styles ?>
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo base_url()?>index.php/welcome">
                             <img src="/assets/layouts/layout/img/wexaver.png" alt="logo" class="logo-default" /> </a> 
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- BEGIN SIDEBAR MENU -->
                            <li class="nav-item active open">
                                <a href="<?php echo base_url()?>index.php/welcome" class="nav-link nav-toggle">
                                    <i class="fa fa-home"></i>
                                    <span class="title">Dashboard</span>

                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-edit"></i>
                                    <span class="title">Form</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/uploadMonthly" class="nav-link ">
                                            <span class="title">upload</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url()?>index.php/admin/promo" class="nav-link ">
                                            <span class="title">promo</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/uploadFuel" class="nav-link ">
                                            <span class="title">fuel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/uploadGrocery" class="nav-link ">
                                            <span class="title">grocery</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-database"></i>
                                    <span class="title">Data</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableMembers" class="nav-link ">
                                            <span class="title">Members</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="<?php echo base_url()?>index.php/admin/tableUnassigned" class="nav-link ">
                                            <span class="title">Unassigned</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableLogs" class="nav-link ">
                                            <span class="title">Log</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableSummary" class="nav-link ">
                                            <span class="title">Summary</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableFuel" class="nav-link ">
                                            <span class="title">Fuel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableGrocery" class="nav-link ">
                                            <span class="title">Grocery</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo base_url()?>index.php/admin/tableReceipt" class="nav-link ">
                                            <span class="title">Receipt</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a href="<?php echo base_url()?>index.php/Authenticate/seeYaa" class="nav-link">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="title">Logout</span>
                                </a>
                            </li>
                            <!-- END SIDEBAR MENU -->
                        </ul>
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
