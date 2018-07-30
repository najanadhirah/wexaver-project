<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="#">Edit Profile</a>
        </li>
    </ul>
</div>
<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
&nbsp;
<!-- END PAGE TITLE-->
<div class="portlet light bordered">
<div class="portlet-title">
    <div class="caption">
        <i class="icon-pencil font-green-turquoise"></i>
        <span class="caption-subject font-green-turquoise bold uppercase"> Edit Profile </span>
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
<div class="portlet-body form form-horizontal">
    <?php echo validation_errors('<div class="alert alert-danger"> ', '</div>'); ?>
    <!-- BEGIN FORM-->
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>admin/editProfile/<?php echo $member['card_numb']?>" >
    <div class="form-group">
        <label class="col-md-3 control-label">Name</label>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="<?php echo $member['name']?>" name="name" autocomplete="off" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Email</label>
        <div class="col-md-4">
            <input type="email" class="form-control" placeholder="<?php echo $member['email']?>" name="email" autocomplete="off" required>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Phone Number</label>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="<?php echo $member['phone_no']?>" name="phone_number"  autocomplete="off" required>
        </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-4">
                <button type="submit" class="btn green">Submit</button>
                <button type="button" class="btn default">Cancel</button>
            </div>
         </div>
    </div>
    </form>
    <!-- END FORM-->
    </div>
</div>
