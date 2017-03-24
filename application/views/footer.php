


<script src="<?php echo base_url("upload/js/bootstrap.min.js"); ?>"></script>

<!-- bootstrap progress js -->
<script src="<?php echo base_url("upload/js/progressbar/bootstrap-progressbar.min.js")?>"></script>
<script src="<?php echo base_url("upload/js/nicescroll/jquery.nicescroll.min.js") ?>" ></script>
<!-- icheck -->
<script src="<?php echo base_url("upload/js/icheck/icheck.min.js");?>" ></script>
<!-- pace -->
<script src="<?php echo base_url("upload/js/pace/pace.min.js");?>"></script>
<script src="<?php echo base_url("upload/js/custom.js");?>"></script>




<?php if ($this->session->userdata('username')) {?>

</div>

</div>

<!-- footer content -->

<footer>
    <div class="copyright-info">
        <p class="pull-right">expenses application @copyright <a href="<?php echo site_url()?>">expenses</a>
        </p>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
<!-- /page content -->

</div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>



<?php }?>









</body>
</html>