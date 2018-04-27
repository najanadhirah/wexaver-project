
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Table</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Summary</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        &nbsp;
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                               <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Basic</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th class="all">Wexaver ID</th>
                                                    <th class="min-phone-l">Date</th>
                                                    <th class="min-tablet">Time</th>
                                                    <th class="desktop">Product</th>
                                                    <th class="desktop">Brands</th>
                                                    <th class="desktop">Transaction Type</th>
                                                    <th class="none">Card Number</th>
                                                    <th class="none">Transaction Amount</th>
                                                    <th class="none">Station Name</th>
                                                    <th class="none">Odomoter</th>
                                                    <th class="none">Litre</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $data) { ?>
                                                <tr>
                                                    <td><?php echo $data['w_id'];?></td>
                                                    <td><?php echo $data['date'];?></td>
                                                    <td><?php echo $data['time'];?></td>
                                                    <td><?php echo $data['product'];?></td>
                                                    <td><?php echo $data['type'];?></td>
                                                    <td><?php echo $data['tx_type'];?></td>
                                                    <td><?php echo $data['card_numb'];?></td>
                                                    <td><?php echo $data['tx_amount'];?></td>
                                                    <td><?php echo $data['st_name'];?></td>
                                                    <td><?php echo $data['odometer'];?></td>
                                                    <td><?php echo $data['litre'];?></td>
                                                </tr>
                                                <?php  } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                <div align="center"><a href="<?php echo base_url()?>admin/promo" class="btn green btn-outline">SUBMIT</a></div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->