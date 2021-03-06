<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Fuel</a>
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
        <i class="icon-pencil font-green-meadow"></i>
        <span class="caption-subject font-green-meadow bold uppercase">Fuel Brand Upload</span>
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
    <!-- BEGIN FORM-->
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/upload/fuelUpload" >
    <div class="form-group">
        <label class="col-md-3 control-label">Brands</label>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Brand Name" name="name" required>
            <span class="help-block"> This form input must be in decimal places </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Price Per Litre</label>
        <div class="col-md-4">
            <input type="number" class="form-control" placeholder="Price Per Litre" name="price" step="0.01" required>
            <span class="help-block">This form input must be in decimal places </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Month</label>
        <div class="col-md-4">
            <select class="form-control" name="month" required>
                <?php foreach ($month as $value){ ?>
                    <option><?php echo $value['month'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="exampleInputFile1">Image Brand</label>
        <div class="col-md-4">
            <input type="file" id="exampleInputFile1" accept="image/*" name="upload" required>
            <p class="help-block"> Image file only can be upload </p>
        </div>
    </div>
    </div>
    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-4">
                <button type="submit" id="uploadbtn" value="upload" class="btn green">Submit</button>
                <button type="button" class="btn default">Cancel</button>
            </div>
         </div>
    </div>
    </form>
    <!-- END FORM-->
    </div>
</div>
