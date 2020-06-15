<div class="sl-row">
     <div class="sl-col-4">
          <label for="keywords"><?php _e( 'Keywords', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_keywords" placeholder="Keywords" id="keywords" class="sl-field">
     </div>
     <div class="sl-col-4">
          <label for="website"><?php _e( 'Website', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_website" placeholder="Website" id="website" class="sl-field">	
     </div>
     <div class="sl-col-4">
          <label for="price"><?php _e( 'Price', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_price" placeholder="Price" id="price" class="sl-field">	
     </div>
</div>
<div class="sl-row">
     <div class="sl-col-4">
          <label for="phone"><?php _e( 'Phone', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_phone" placeholder="Phone" id="phone" class="sl-field">	
     </div>
     <div class="sl-col-4">
          <label for="email"><?php _e( 'Email', 'shibbir-listing' ); ?></label>
          <input type="email" name="sl_email" placeholder="Email" id="email" class="sl-field">	
     </div>
     <div class="sl-col-4">
          <label for="address"><?php _e( 'Address', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_text" placeholder="Address" id="address" class="sl-field">	
     </div>
</div>
<div class="sl-row">
     <div class="sl-col-4">
          <label for="state"><?php _e( 'State', 'shibbir-listing' ); ?></label>
          <select name="sl_state" id="state" class="sl-field">
               <option value="alaska">Alaska</option>
               <option value="california">California</option>
               <option value="florida">Florida</option>
               <option value="newyork">New York</option>
               <option value="texas">Texas</option>
          </select>
     </div>
     <div class="sl-col-4">
          <label for="country"><?php _e( 'Country', 'shibbir-listing' ); ?></label>
          <select name="sl_country" id="country"  class="sl-field">
               <option value="bangladesh">Bangladesh</option>
               <option value="china">China</option>
               <option value="unitedstate">United State</option>
               <option value="india">India</option>
               <option value="russia">Russia</option>
          </select>
     </div>
     <div class="sl-col-4">
          <label for="postal"><?php _e( 'Postal Code', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_postal" placeholder="Postal code" id="postal" class="sl-field">	
     </div>
</div>
<div class="sl-row">
     <div class="sl-col-4">
          <label for=glat"><?php _e( 'Google map lattitude', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_glat" placeholder="Google map lattitude" id="glat" class="sl-field">	
     </div>
     <div class="sl-col-4">
          <label for=glong"><?php _e( 'Google map longitude', 'shibbir-listing' ); ?></label>
          <input type="text" name="sl_glong" placeholder="Google map lonitude" id="glong" class="sl-field">	
     </div>
     <div class="sl-col-4"></div>
</div>
<div class="sl-row">
     <div class="sl-col-12">
          <label for="opening-hour">Opening Hours</label>
     </div>
     <div class="sl-col-3">
          <select class="sl-field" name="opening[][day]">
               <option value="saturday" data-display="Add day">Saturday</option>
               <option value="sunday">Sunday</option>
               <option value="monday">Monday</option>
               <option value="tuesday">Tuesday</option>
               <option value="wednesday">Wednesday</option>
               <option value="thrusday">Thrusday</option>
               <option value="friday">Friday</option>
          </select>
     </div>
     <div class="sl-col-3">
          <select class="sl-field" name="opening[][from]">
               <option value="7am" data-display="Start Time">7.00 Am</option>
               <option value="8am">8.00 Am</option>
               <option value="9am">9.00 Am</option>
               <option value="10am">10.00 Am</option>
               <option value="11am">11.00 Am</option>
               <option value="12pm">12.00 Pm</option>
               <option value="1pm">01.00 pm</option>
          </select>
     </div>
     <div class="sl-col-3">
          <select class="sl-field" name="opening[][to]">
               <option value="5pm" data-display="Start Time">5.00 Pm</option>
               <option value="6pm">6.00 Pm</option>
               <option value="7pm">7.00 Pm</option>
               <option value="8pm">8.00 Pm</option>
               <option value="9pm">9.00 Pm</option>
               <option value="10pm">10.00 Pm</option>
               <option value="11pm">11.00 Pm</option>
          </select>
     </div>
     <div class="sl-col-3">
          <div class="add_remove">
               <a href="javascript:void(0);" class="add_button plus" title="Add field">(+)</a>          
          </div>
     </div>
     <div class="field_wrapper"></div>
     <?php wp_nonce_field( 'sl_meta_boxes_action' ); ?>
     <input type="hidden" name="action" value="sl_meta_boxes_action">
</div>

