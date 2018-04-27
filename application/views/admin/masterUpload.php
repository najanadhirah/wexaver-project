<!-- BEGIN PAGE BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="index.html">Upload</a>
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
        <i class="icon-pencil font-green-jungle"></i>
        <span class="caption-subject font-green-jungle bold uppercase">Master Upload</span>
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
    <form enctype="multipart/form-data" method="post" action="<?php echo base_url()?>index.php/upload/masterUpload">
    
    <div class="form-group">
        <label class="col-md-3 control-label" for="exampleInputFile1">Zip File</label>
        <div class="col-md-4">
            <input type="file" id="exampleInputFile1" accept="application/csv" name="upload">
            <p class="help-block"> xls file only can be upload </p>
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