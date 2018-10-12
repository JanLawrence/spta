<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        <?php echo form_open('home/login'); ?>
                            <div class="form-group">
                                <img src="<?= base_url('assets/images/spta-icon.png')?>"/>
                            </div><br/>
                            <?php
                            if (isset($message_display)) {
                                echo '<div class="alert alert-success">';
                                echo $message_display;
                                echo validation_errors();
                                echo '</div>';
                            }
                            if (isset($error_message)) {
                                echo '<div class="alert alert-danger">';
                                echo $error_message;
                                echo '</div>';
                            }
                            ?>
                            <div class="form-group">
                                <label class="label">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?= $username ?>" name="username" placeholder="Username">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" value="<?= $password ?>" name="password" placeholder="*********">
                                    <div class="input-group-append">
                                      <span class="input-group-text">
                                        <i class="mdi mdi-check-circle-outline"></i>
                                      </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Login</button>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> Keep me signed in
                                    </label>
                                </div>
                                <a href="#" class="text-small forgot-password text-black">Forgot Password</a>
                            </div>
                            <!--<div class="form-group">
                                <button class="btn btn-block g-login">
                                    <img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>
                            </div>-->
                            <!--<div class="text-block text-center my-3">
                                <span class="text-small font-weight-semibold">Not a member ?</span>
                                <a href="register.html" class="text-black text-small">Create new account</a>
                            </div>-->
                        <?php echo form_close(); ?>
                    </div>
                    <!--<ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>-->
                    <p class="footer-text text-center">copyright © 2018 SPTA. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->