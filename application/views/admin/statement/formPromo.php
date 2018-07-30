                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Promo</a>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        &nbsp;
                        <!-- END PAGE TITLE-->
                        <div class="tab-pane" id="tab_2">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Promo Form</div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <!-- BEGIN FORM-->
                                                    <form class="form-horizontal" method="post" action="<?php echo base_url()?>statement/Calcpromo">
                                                        <div class="form-body">
                                                            <h3 class="form-section">Topup card </h3>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Minimum Amount</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" class="form-control" id="promo_amount" name="min_amount" placeholder="0.00">
                                                                            <span class="help-block"> This form input must be in decimal places </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Rebate</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" class="form-control" id="promo_rebate_amount" name="rebate_amount" placeholder="0.00">
                                                                            <span class="help-block"> This form input must be in decimal places </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            
                                                          
                                                            <h3 class="form-section">Overriding Petrol</h3>
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Minimum Petrol</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" class="form-control" id="promo_petrol" name="min_petrol" placeholder="0.00">
                                                                            <span class="help-block"> This form input must be in decimal places </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-3">Rebate</label>
                                                                        <div class="col-md-9">
                                                                            <input type="number" class="form-control" id="promo_rebate_petrol" name="rebate_petrol" placeholder="0.00">
                                                                            <span class="help-block"> This form input must be in decimal places </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="month" value="<?php echo $month ?>">
                                                        <div id="promo-result"></div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn btn-transparent green-haze btn-outline btn-sm" id="promo-submit-btn">Submit</button>
                                                                            <a href="<?php echo base_url() ?>index.php/admin/log" class="btn btn-transparent grey-salsa btn-outline btn-sm">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>