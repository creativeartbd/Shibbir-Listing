<section class="listghor_login section_padding wow fadeInUp sdl-login-form">
    <div class="container">
        <div class="listghor_wrapper_form">
            <div class="wrapper_form_left bg_image" style="background-image: url(assets/images/login_bg.jpg);">
                <div class="content_text">
                    <h2>Find  Great Place <br>In Your City</h2>
                </div>
                <div class="brand_logo">
                    <img src="assets/images/logo.png" alt="">
                </div>
            </div>
            <div class="wrapper_form_right">
                <div class="form_title">
                    <h2>Hello!</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                </div>
                <div class="listghor_form">
                    <form action="" method="post" class="login_form">
                        <div class="form_group">
                            <input type="text" class="form_control" placeholder="Username" name="user_name" required>
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form_group">
                            <input type="password" class="form_control" placeholder="Password"  name="password" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="form_group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="single_checkbox">
                                        <input type="checkbox" class="single_input" id="check1" name="check1">
                                            <label class="single_input_label sigle_input_check" for="check1"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="forgot_link float-right">
                                        <a href="#">Forgot password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form_result"></div>                       
                        <div class="form_button">
                            <?php wp_nonce_field( 'log_nonce_action' ); ?>                         
                            <input type="hidden" name="action" value="log_nonce_action">
                            <button type="submit" class="listghor_btn form_btn login">
                                <?php _e( 'sign in', 'shibbir-listing' ) ?>
                            </button>
                        </div>
                        <div class="form_text">
                            <p>Don’t have an account?<a href="<?php echo wp_registration_url(); ?>"> Sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
