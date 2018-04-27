
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Table</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Members</span>
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
                                            <span class="caption-subject bold uppercase">Membership</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th class="all">Full Name</th>
                                                    <th class="min-phone-l">Email</th>
                                                    <th class="none">Phone Number</th>
                                                    <th class="min-tablet">Wexaver Number</th>
                                                    <th class="none">Fuel Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $data ) { ?>
                                                <tr>
                                                    <td><?php echo $data['name'];?></td>
                                                    <td><?php echo $data['email'];?></td>
                                                    <td><?php echo $data['phone_no'];?></td>
                                                    <td><?php echo $data['w_numb'];?></td>
                                                    <td><?php echo $data['type'];?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->