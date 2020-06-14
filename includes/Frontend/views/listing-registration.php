<section class="listghor_registration section_padding wow fadeInUp">
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
                    <h2>Sign up</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</p>
                </div>
                <div class="listghor_form">
                    <form action="<?php echo home_url( "/" ); ?>" method="post" id="registration_form">
                        <div class="form_group">
                            <input type="text" class="form_control" placeholder="Full Name"  name="full_name" >
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form_group">
                            <input type="text" class="form_control" placeholder="User Name"  name="user_name" >
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="form_group">
                            <input type="email" class="form_control" placeholder="E-mail address" name="email" >
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="form_group">
                            <input type="password" class="form_control" placeholder="Password"  name="password" >
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="form_group">
                            <div class="single_checkbox">
                                <input type="checkbox" class="single_input" id="check1" name="check1">
                                <label class="single_input_label sigle_input_check" for="check1"><span>By singing up I agree with <a href="#">terms & Condition</a></span></label>
                            </div>
                        </div>
                        <br>
                        <div class="form_result"></div>
                        <div class="form_button">
                            <?php wp_nonce_field( 'reg_nonce_action' ); ?>           
                            <input type="hidden" name="action" value="reg_nonce_action">
                            <button type="submit" class="listghor_btn form_btn registration">sign up</button>
                            <span>or</span>
                            <a href="<?php echo wp_login_url(); ?>">log in</a>                            
                        </div>
                        <div class="form_text">
                            <p>or use social network</p>
                            <a href="#" class="social_link facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                            <a href="#" class="social_link twitter"><i class="fab fa-twitter"></i>Twitter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>