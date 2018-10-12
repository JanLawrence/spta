<?php

$user = $this->session->userdata('logged_in');

if($user){
   ?>
    <footer class="footer">
        <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">SPTA</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
            </span>
        </div>
    </footer>
    <?php
}

?>

</div>
</div>
</div>

<!-- plugins:js -->
<script src="<?=base_url();?>assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?=base_url();?>assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="<?=base_url();?>assets/js/off-canvas.js"></script>
<script src="<?=base_url();?>assets/js/misc.js"></script>
<!-- endinject -->
<script src="<?=base_url();?>assets/js/dashboard.js"></script>
<script src="<?=base_url();?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/js/js.js"></script>
</body>

</html>