
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
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6"><h1 class="page-title">Summary</h1></div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Send as Email </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th> Wexaver ID         </th>
                                                    <th> Email              </th>
                                                    <th> Total Toppup       </th>
                                                    <th> Total Litre        </th>
                                                    <th> Total Rebate       </th>
                                                    <th> Rebate Overiding   </th>
                                                    <th> Rebate Topup       </th>
                                                    <th> Action             </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $data) { 
<<<<<<< HEAD
                                                   if ( $data['wexaver_id'] != null) { ?>
=======
                                                    if($data['email']  != null ){
                                                        ?>
>>>>>>> 9b7252922da934a0655491adf206afbf238cfb34
                                                <tr>
                                                    <td><?php echo $data['wexaver_id']; ?> </td>
                                                    <td><?php echo $data['email']; ?> </td>
                                                    <td><?php echo $data['total_topup']; ?> </td>
                                                    <td><?php echo $data['total_litre']; ?> </td>
                                                    <td><?php echo $data['total_transaction']; ?> </td>
                                                    <td><?php echo $data['rebate_petrol']; ?> </td>
                                                    <td><?php echo $data['rebate_topup']; ?> </td>
                                                    <td>
                                                        
                                                        <a href="<?php echo base_url()?>statement/pdf/<?php echo $data['card_numb']?>" class="btn dark btn-outline"> View PDF </a>
                                                    </td>
                                                </tr>
                                                <?php  } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->