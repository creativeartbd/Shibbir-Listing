<!-- Start listghor_add_listing section -->
<section class="listghor_add_listing listghor_add_listing_1 section_padding wow fadeInUp">
    <div class="container">
        <div class="add_listing_from">
            <form action="" method="POST" id="add_new_listing" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
                <div class="listing_form general_form" >
                    <h4>General Information :</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Listing Title :</label>
                                <input type="text" name="listing_title" class="form_control" placeholder="Title" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Select Category :</label>
                                <select class="search_select" name="listing_category">
                                    <option data-display="Select Category">Real Estate</option>
                                    <option>travel</option>
                                    <option>Beauty & Spa</option>
                                    <option>Night Club</option>
                                    <option>Shopping</option>
                                    <option>Resturaunt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Keywords:</label>
                                <input type="text" name="keywords" class="form_control" placeholder="Keyword should be separeted by commas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Website :</label>
                                <input type="text" name="website" class="form_control" placeholder="Enter website address">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form_group">
                                <label>Price :</label>
                                <input type="text" name="price" class="form_control" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form_group">
                                <label>Phone :</label>
                                <input type="text" name="phone" class="form_control" placeholder="Enter phone number" name="phone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form_group">
                                <label>E-mail :</label>
                                <input type="text" name="email" class="form_control" placeholder="Enter phone number">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form_group">
                                <label>About Listing :</label>
                                <textarea  class="form_control" name="about_listing" placeholder="Describe the listing"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="amenities_list">
                                <label>Amenities :</label>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check1" name="amenities[]" value="elevator-in-building">
                                    <label class="single_input_label sigle_input_check" for="check1"><span>Elevator in building</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check2" name="amenities[]" value="friendly-workspace">
                                    <label class="single_input_label sigle_input_check" for="check2"><span>Friendly Workspace</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check3" name="amenities[]" value="instant-book">
                                    <label class="single_input_label sigle_input_check" for="check3"><span>Instant Book</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check4" name="amenities[]" value="wireless-internet">
                                    <label class="single_input_label sigle_input_check" for="check4"><span>Wireless Internet</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check5" name="amenities[]" value="tv">
                                    <label class="single_input_label sigle_input_check" for="check5"><span>TV</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check6" name="amenities[]" value="refrigerator">
                                    <label class="single_input_label sigle_input_check" for="check6"><span>Refrigerator</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check7" name="amenities[]" value="events">
                                    <label class="single_input_label sigle_input_check" for="check7"><span>Events</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check8" name="amenities[]" value="free-parking">
                                    <label class="single_input_label sigle_input_check" for="check8"><span>Free Parking</span></label>
                                </div>
                                <div class="single_checkbox">
                                    <input type="checkbox" class="single_input" id="check10" name="amenities[]" value="security">
                                    <label class="single_input_label sigle_input_check" for="check10"><span>Security</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listing_form location_form">
                    <h4>Location :</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Address :</label>
                                <input type="text" name="address" class="form_control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>State :</label>
                                <select class="search_select" name="state">
                                    <option data-display="Select State">Alaska</option>
                                    <option>California</option>
                                    <option>Florida</option>
                                    <option>New York</option>
                                    <option>Texas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Country :</label>
                                <select class="search_select" name="country">
                                    <option data-display="Select Counry">Bangladesh</option>
                                    <option>China</option>
                                    <option>United States</option>
                                    <option>India</option>
                                    <option>Russia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Postal Code :</label>
                                <input type="text" name="postal_code" class="form_control" placeholder="Postal Code">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Google Maps Latitude :</label>
                                <input type="text" name="lat" class="form_control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Google Maps Longitude :</label>
                                <input type="text" name="long" class="form_control" placeholder="Address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listing_form opening_hours">
                    <h4>opening hours :</h4>
                    <div class="day_hours_list">
                        <?php for( $counter = 1; $counter <= 5; $counter++ ) : ?>
                            <div class="day_hours">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="weekday">
                                            <select class="search_select" name="opening[][day]">
                                                <option value="saturday" data-display="Add day">Saturday</option>
                                                <option value="sunday">Sunday</option>
                                                <option value="monday">Monday</option>
                                                <option value="tuesday">Tuesday</option>
                                                <option value="wednesday">Wednesday</option>
                                                <option value="thrusday">Thrusday</option>
                                                <option value="friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="st_time">
                                            <select class="search_select" name="opening[][from]">
                                                <option value="7am" data-display="Start Time">7.00 Am</option>
                                                <option value="8am">8.00 Am</option>
                                                <option value="9am">9.00 Am</option>
                                                <option value="10am">10.00 Am</option>
                                                <option value="11am">11.00 Am</option>
                                                <option value="12pm">12.00 Pm</option>
                                                <option value="1pm">01.00 pm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="ed_time">
                                            <select class="search_select" name="opening[][to]">
                                                <option value="5pm" data-display="Start Time">5.00 Pm</option>
                                                <option value="6pm">6.00 Pm</option>
                                                <option value="7pm">7.00 Pm</option>
                                                <option value="8pm">8.00 Pm</option>
                                                <option value="9pm">9.00 Pm</option>
                                                <option value="10pm">10.00 Pm</option>
                                                <option value="11pm">11.00 Pm</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="add_remove">
                                            
                                            <?php if( 5 == $counter ) : ?>
                                                <a href="javascript:void(0);" class="add_button plus" title="Add field"><i class="fas fa-plus"></i></a>
                                            <?php else : ?>
                                                <a href="javascript:void(0);" class="remove_button_2 times"><i class="fas fa-times"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>                        
                        <div class="field_wrapper"></div>
                    </div>
                </div>
                <div class="listing_form gallery_form">
                    <h4>gallery :</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="file_upload">
                                    <div class="input-images"></div>
                                    <!-- <input type="file" name="file" multiple> -->
                                    <!-- <div class="upload_content">
                                        <div class="upload_content_text">
                                            <i class="far fa-image"></i>
                                            <p>Drop Picture here to Upload</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listing_form social_form">
                    <h4>social networks :</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Facebook :</label>
                                <input type="text" name="socials[]" class="form_control" placeholder="Facebook URL" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Twitter :</label>
                                <input type="text" name="socials[]" class="form_control" placeholder="Twitter URL" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Linkedin :</label>
                                <input type="text" name="socials[]" class="form_control" placeholder="Linkedin URL" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form_group">
                                <label>Pinterest :</label>
                                <input type="text" name="socials[]" class="form_control" placeholder="Pinterest URL" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit_button">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form_result"></div>
                            <div class="form_btton text-right">
                                <?php wp_nonce_field( 'add_new_listing_nonce_action' ); ?>                         
                                <input type="hidden" name="action" value="add_new_listing_nonce_action">
                                <button class="listghor_btn form_btn"><?php _e( 'Submit Listing', 'shibbir-directory-listing' ); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End listghor_add_listing section -->