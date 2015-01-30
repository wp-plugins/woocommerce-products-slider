<?php


function wcps_posttype_register() {
 
        $labels = array(
                'name' => _x('WCPS', 'WCPS'),
                'singular_name' => _x('WCPS', 'wcps'),
                'add_new' => _x('New WCPS', 'wcps'),
                'add_new_item' => __('New WCPS'),
                'edit_item' => __('Edit WCPS'),
                'new_item' => __('New WCPS'),
                'view_item' => __('View WCPS'),
                'search_items' => __('Search WCPS'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'wcps' , $args );

}

add_action('init', 'wcps_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_wcps()
	{
		$screens = array( 'wcps' );
		foreach ( $screens as $screen )
			{
				add_meta_box('wcps_metabox',__( 'Woocommerce Products Slider Options','wcps' ),'meta_boxes_wcps_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_wcps' );


function meta_boxes_wcps_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_wcps_input', 'meta_boxes_wcps_input_nonce' );
	
	
	$wcps_bg_img = get_post_meta( $post->ID, 'wcps_bg_img', true );
	$wcps_themes = get_post_meta( $post->ID, 'wcps_themes', true );
	$wcps_total_items = get_post_meta( $post->ID, 'wcps_total_items', true );	
	
	$wcps_column_number = get_post_meta( $post->ID, 'wcps_column_number', true );

		
	$wcps_auto_play = get_post_meta( $post->ID, 'wcps_auto_play', true );
	$wcps_stop_on_hover = get_post_meta( $post->ID, 'wcps_stop_on_hover', true );
	$wcps_slider_navigation = get_post_meta( $post->ID, 'wcps_slider_navigation', true );
	$wcps_slider_navigation_speed = get_post_meta( $post->ID, 'wcps_slider_navigation_speed', true );
		
	$wcps_slider_pagination = get_post_meta( $post->ID, 'wcps_slider_pagination', true );
	$wcps_pagination_slide_speed = get_post_meta( $post->ID, 'wcps_pagination_slide_speed', true );
	$wcps_slider_pagination_count = get_post_meta( $post->ID, 'wcps_slider_pagination_count', true );
	
	
	$wcps_slider_touch_drag = get_post_meta( $post->ID, 'wcps_slider_touch_drag', true );
	$wcps_slider_mouse_drag = get_post_meta( $post->ID, 'wcps_slider_mouse_drag', true );
	
	$wcps_content_source = get_post_meta( $post->ID, 'wcps_content_source', true );
	$wcps_content_year = get_post_meta( $post->ID, 'wcps_content_year', true );
	$wcps_content_month = get_post_meta( $post->ID, 'wcps_content_month', true );
	$wcps_content_month_year = get_post_meta( $post->ID, 'wcps_content_month_year', true );	
	
	$wcps_taxonomy = get_post_meta( $post->ID, 'wcps_taxonomy', true );
	$wcps_taxonomy_category = get_post_meta( $post->ID, 'wcps_taxonomy_category', true );
	
	$wcps_product_ids = get_post_meta( $post->ID, 'wcps_product_ids', true );	
	
	
	
	$wcps_cart_bg = get_post_meta( $post->ID, 'wcps_cart_bg', true );	

	$wcps_items_thumb_size = get_post_meta( $post->ID, 'wcps_items_thumb_size', true );	
	$wcps_items_thumb_max_hieght = get_post_meta( $post->ID, 'wcps_items_thumb_max_hieght', true );	
	
	$wcps_items_empty_thumb = get_post_meta( $post->ID, 'wcps_items_empty_thumb', true );		
	
	
	
	
	



?>













    <div class="para-settings">
        <div class="option-box">
            <p class="option-title">Shortcode</p>
            <p class="option-info">Copy this shortcode and paste on page or post where you want to display slider. <br />Use PHP code to your themes file to display slider.</p>
			<textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[wcps <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[wcps id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
		</div>


        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active">Options</li>
            <li nav="2" class="nav2">Style</li>
            <li nav="3" class="nav3">Content</li>
        </ul> <!-- tab-nav end -->
        
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
				<div class="option-box">
                    <p class="option-title">Slider Total Items</p>
                    <p class="option-info"></p>
					<input type="text" size="5"  name="wcps_total_items" value="<?php if(!empty($wcps_total_items))echo $wcps_total_items; else echo 15; ?>" />                   
                </div>
                
				<div class="option-box">
                    <p class="option-title">Slider Column Number</p>
                    <p class="option-info"></p>
                    In Destop: <br />
					<input type="text" size="5"  name="wcps_column_number" value="<?php if(!empty($wcps_column_number))echo $wcps_column_number; else echo 5; ?>" />
            
                </div>   
                

                
				<div class="option-box">
                    <p class="option-title">Slider Auto Play</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_auto_play" name="wcps_auto_play" value="true" <?php if(($wcps_auto_play=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_auto_play=="true")) { ?>
                        <label for="wcps_auto_play" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="wcps_auto_play" >Inactive</label>
                                <?php
                                }
                        ?>             
                </div>     
				<div class="option-box">
                    <p class="option-title">Slider Stop on Hover</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_stop_on_hover" name="wcps_stop_on_hover" value="true" <?php if(($wcps_stop_on_hover=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_stop_on_hover=="true")) { ?>
                        <label for="wcps_stop_on_hover" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="wcps_stop_on_hover" >Inactive</label>
                                <?php
                                }
                        ?>                 
                </div>   
				<div class="option-box">
                    <p class="option-title">Slider Navigation at Top</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_slider_navigation" name="wcps_slider_navigation" value="true" <?php if(($wcps_slider_navigation=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_slider_navigation=="true")) { ?>
                        <label for="wcps_slider_navigation" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="wcps_slider_navigation" >Inactive</label>
                                <?php
                                }
                        ?>                 
                </div> 
                
				<div class="option-box">
                    <p class="option-title">Slider Pagination at Bottom</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_slider_pagination" name="wcps_slider_pagination" value="true" <?php if(($wcps_slider_pagination=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_slider_pagination=="true")) { ?>
                        <label for="wcps_slider_pagination" >Active</label>
                        <?php } 
                            
                            else
                                {
                                ?>
                                <label for="wcps_slider_pagination" >Inactive</label>
                                <?php
                                }
                        ?>                 
                </div>  
				<div class="option-box">
                    <p class="option-title">Pagination Number Counting</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_slider_pagination_count" name="wcps_slider_pagination_count" value="true" <?php if(($wcps_slider_pagination_count=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_slider_pagination_count=="true")) { ?>
                        <label for="wcps_slider_pagination_count" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="wcps_slider_pagination_count" >Inactive</label>
                            <?php
                            }
                        ?>                 
                </div>     
				<div class="option-box">
                    <p class="option-title">Slide Speed</p>
                    <p class="option-info"></p>
					<input type="text" id="wcps_slide_speed" name="wcps_slide_speed" value="<?php if(!empty($wcps_slide_speed)) echo $wcps_slide_speed; else echo "1000"; ?>"  />                 
                </div>   
				<div class="option-box">
                    <p class="option-title">Pagination Slide Speed</p>
                    <p class="option-info"></p>
					<input type="text" id="wcps_pagination_slide_speed" name="wcps_pagination_slide_speed" value="<?php if(!empty($wcps_pagination_slide_speed)) echo $wcps_pagination_slide_speed; else echo "1000"; ?>"  />                 
                </div> 
                
				<div class="option-box">
                    <p class="option-title">Slider Touch Drag Enabled</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_slider_touch_drag" name="wcps_slider_touch_drag" value="true" <?php if(($wcps_slider_touch_drag=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_slider_touch_drag=="true")) { ?>
                        <label for="wcps_slider_touch_drag" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="wcps_slider_touch_drag" >Inactive</label>
                            <?php
                            }
                        ?>                 
                </div>       
				<div class="option-box">
                    <p class="option-title">Slider Mouse Drag Enabled</p>
                    <p class="option-info"></p>
					<input type="checkbox" id="wcps_slider_mouse_drag" name="wcps_slider_mouse_drag" value="true" <?php if(($wcps_slider_mouse_drag=="true")) echo "checked"; else echo ""; ?> />
                        <?php if(($wcps_slider_mouse_drag=="true")) { ?>
                        <label for="wcps_slider_mouse_drag" >Active</label>
                        <?php } 
                            
                        else
                            {
                            ?>
                            <label for="wcps_slider_mouse_drag" >Inactive</label>
                            <?php
                            }
                        ?>                 
                </div>         
               
            </li>
            <li style="display: none;" class="box2 tab-box ">
				<div class="option-box">
                    <p class="option-title">Themes</p>
                    <p class="option-info"></p>
					<select name="wcps_themes"  >
                    <option class="wcps_themes_flat" value="flat" <?php if($wcps_themes=="flat")echo "selected"; ?>>Flat</option>
                    <option class="wcps_themes_rossi" value="rossi" <?php if($wcps_themes=="rossi")echo "selected"; ?>>Rossi</option>
                  
                    </select>                 
                </div> 
				 
                
				<div class="option-box">
                    <p class="option-title">Slider Thumbnail Size</p>
                    <p class="option-info"></p>
					<select name="wcps_items_thumb_size" >
                    <option value="thumbnail" <?php if($wcps_items_thumb_size=="thumbnail")echo "selected"; ?>>Thumbnail</option>
                    <option value="medium" <?php if($wcps_items_thumb_size=="medium")echo "selected"; ?>>medium</option>
                    <option value="large" <?php if($wcps_items_thumb_size=="large")echo "selected"; ?>>large</option>                               
                    <option value="full" <?php if($wcps_items_thumb_size=="full")echo "selected"; ?>>full</option>   

                    </select>                 
                </div> 
                
				<div class="option-box">
                    <p class="option-title">Slider thumb max hieght(px)</p>
                    <p class="option-info"></p>
					<input type="text" name="wcps_items_thumb_max_hieght" placeholder="14px" id="wcps_items_thumb_max_hieght" value="<?php if(!empty($wcps_items_thumb_max_hieght)) echo $wcps_items_thumb_max_hieght; else echo "200px"; ?>" />                 
                </div> 
                
				<div class="option-box">
                    <p class="option-title">Background Image</p>
                    <p class="option-info"></p>
					<script>
                    jQuery(document).ready(function(jQuery)
                        {
                                jQuery(".wcps_bg_img_list li").click(function()
                                    { 	
                                        jQuery('.wcps_bg_img_list li.bg-selected').removeClass('bg-selected');
                                        jQuery(this).addClass('bg-selected');
                                        
                                        var wcps_bg_img = jQuery(this).attr('data-url');
                    
                                        jQuery('#wcps_bg_img').val(wcps_bg_img);
                                        
                                    })	
                    
                                        
                        })
                    
                    </script> 
                    
            <?php
            
            
            
                $dir_path = wcps_plugin_dir."css/bg/";
                $filenames=glob($dir_path."*.png*");
            
            
                $wcps_bg_img = get_post_meta( $post->ID, 'wcps_bg_img', true );
                
                if(empty($wcps_bg_img))
                    {
                    $wcps_bg_img = "";
                    }
            
            
                $count=count($filenames);
                
            
                $i=0;
                echo "<ul class='wcps_bg_img_list' >";
            
                while($i<$count)
                    {
                        $filelink= str_replace($dir_path,"",$filenames[$i]);
                        
                        $filelink= wcps_plugin_url."css/bg/".$filelink;
                        
                        
                        if($wcps_bg_img==$filelink)
                            {
                                echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                            }
                        else
                            {
                                echo '<li   data-url="'.$filelink.'">';
                            }
                        
                        
                        echo "<img  width='70px' height='50px' src='".$filelink."' />";
                        echo "</li>";
                        $i++;
                    }
                    
                echo "</ul>";
                
                echo "<input style='width:100%;' value='".$wcps_bg_img."'    placeholder='Please select image or left blank' id='wcps_bg_img' name='wcps_bg_img'  type='text' />";
            
            
            
            ?>
                    
                    
                                    
                </div>  
                
				<div class="option-box">
                    <p class="option-title">Add to cart Background Color</p>
                    <p class="option-info"></p>
					<input type="text" name="wcps_cart_bg" id="wcps_cart_bg" value="<?php if(!empty($wcps_cart_bg)) echo $wcps_cart_bg; else echo "#0fcd95"; ?>" />                 
                </div> 

            </li>
            <li style="display: none;" class="box3 tab-box ">
            
				<div class="option-box">
                    <p class="option-title">Empty Thumbnail</p>
                    <p class="option-info"></p>
					<input type="text" name="wcps_items_empty_thumb" id="wcps_items_empty_thumb" value="<?php if(!empty($wcps_items_empty_thumb)) echo $wcps_items_empty_thumb; ?>" /><br />
                    <input id="wcps_items_empty_thumb_upload" class="wcps_items_empty_thumb_upload button" type="button" value="Upload Image" />
                       <br />
                       
                       
                        <?php
                        	if(empty($wcps_items_empty_thumb))
								{
								?>
                                <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo wcps_plugin_url.'css/no-thumb.png'; ?>" />
                                <?php
								}
							else
								{
								?>
                                <img class="wcps_items_empty_thumb_display" width="300px" src="<?php echo $wcps_items_empty_thumb; ?>" />
                                <?php
								}
						?>
                       
                       
                       
                       
                       
					<script>
                        jQuery(document).ready(function($){

                            var custom_uploader; 
                         
                            jQuery('#wcps_items_empty_thumb_upload').click(function(e) {
													
                                e.preventDefault();
                         
                                //If the uploader object has already been created, reopen the dialog
                                if (custom_uploader) {
                                    custom_uploader.open();
                                    return;
                                }
                        
                                //Extend the wp.media object
                                custom_uploader = wp.media.frames.file_frame = wp.media({
                                    title: 'Choose Image',
                                    button: {
                                        text: 'Choose Image'
                                    },
                                    multiple: false
                                });
                        
                                //When a file is selected, grab the URL and set it as the text field's value
                                custom_uploader.on('select', function() {
                                    attachment = custom_uploader.state().get('selection').first().toJSON();
                                    jQuery('#wcps_items_empty_thumb').val(attachment.url);
                                    jQuery('.wcps_items_empty_thumb_display').attr('src',attachment.url);									
                                });
                         
                                //Open the uploader dialog
                                custom_uploader.open();
                         
                            });
                            
                            
                        })
                    </script>      
                </div> 
            
				<div class="option-box">
                    <p class="option-title">Filter Slider Content.</p>
                    <p class="option-info"></p>
                    <ul class="content_source_area" >
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_latest" type="radio" value="latest" <?php if($wcps_content_source=="latest")  echo "checked";?> /> <label for="wcps_content_source_latest">Display from Latest Published</label>
                        <div class="wcps_content_source_latest content-source-box">Slider items will query from latest published product.</div>
                        </li>
                        
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_older" type="radio" value="older" <?php if($wcps_content_source=="older")  echo "checked";?> /> <label for="wcps_content_source_older">Display from Older Published</label>
                        <div class="wcps_content_source_older content-source-box">Slider items will query from older published product.</div>
                        </li>            
                        
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_featured" type="radio" value="featured" <?php if($wcps_content_source=="featured")  echo "checked";?> /> <label for="wcps_content_source_featured">Display from Featured Product</label>
                        
                        <div class="wcps_content_source_featured content-source-box">Slider items will query from featured marked product.</div>
                        </li>

                        
                        
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_year" type="radio" value="year" <?php if($wcps_content_source=="year")  echo "checked";?> /> <label for="wcps_content_source_year">Display from Only Year</label>
                        
                        <div class="wcps_content_source_year content-source-box">Slider items will query from a year.
                        <input type="text" size="7" class="wcps_content_year" name="wcps_content_year" value="<?php if(!empty($wcps_content_year))  echo $wcps_content_year;?>" placeholder="2014" />
                        </div>
                        </li>
                        
                        
                        <li><input class="wcps_content_source" name="wcps_content_source" id="wcps_content_source_month" type="radio" value="month" <?php if($wcps_content_source=="month")  echo "checked";?> /> <label for="wcps_content_source_month">Display from Month</label>
                        
                        <div class="wcps_content_source_month content-source-box">Slider items will query from Month of a year.		<br />
                        <input type="text" size="7" class="wcps_content_month_year" name="wcps_content_month_year" value="<?php if(!empty($wcps_content_month_year))  echo $wcps_content_month_year;?>" placeholder="2014" />            
                        <input type="text" size="7" class="wcps_content_month" name="wcps_content_month" value="<?php if(!empty($wcps_content_month))  echo $wcps_content_month;?>" placeholder="06" />
                        </div>
                        </li>            
           
                                     
                    </ul>                 
                </div>            
            
            </li>
        </ul>













    
    </div>
<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_wcps_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_wcps_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_wcps_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_wcps_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$wcps_bg_img = sanitize_text_field( $_POST['wcps_bg_img'] );	
	$wcps_themes = sanitize_text_field( $_POST['wcps_themes'] );
	$wcps_total_items = sanitize_text_field( $_POST['wcps_total_items'] );	

	$wcps_column_number = sanitize_text_field( $_POST['wcps_column_number'] );

		
	if(empty($_POST['wcps_auto_play']))
		{
			$wcps_auto_play = '';
		}
	else
		{
		$wcps_auto_play = sanitize_text_field( $_POST['wcps_auto_play'] );
		}
	
	
	if(empty($_POST['wcps_stop_on_hover']))
		{
			$wcps_stop_on_hover = '';
		}
	else
		{
		$wcps_stop_on_hover = sanitize_text_field( $_POST['wcps_stop_on_hover'] );
		}
	
	
	if(empty($_POST['wcps_slider_navigation']))
		{
			$wcps_slider_navigation = '';
		}
	else
		{
			$wcps_slider_navigation = sanitize_text_field( $_POST['wcps_slider_navigation'] );
		}
	
		
	
	$wcps_slide_speed = sanitize_text_field( $_POST['wcps_slide_speed'] );
	
	
	if(empty($_POST['wcps_slider_pagination']))
		{
			$wcps_slider_pagination = '';
		}
	else
		{
			$wcps_slider_pagination = sanitize_text_field( $_POST['wcps_slider_pagination'] );	
		}
	
	
	
	$wcps_pagination_slide_speed = sanitize_text_field( $_POST['wcps_pagination_slide_speed'] );
	
	
	if(empty($_POST['wcps_slider_pagination_count']))
		{
			$wcps_slider_pagination_count = '';
		}
	else
		{
			$wcps_slider_pagination_count = sanitize_text_field( $_POST['wcps_slider_pagination_count'] );
		}
	
	
	
	
	
	if(empty($_POST['wcps_slider_touch_drag']))
		{
			$wcps_slider_touch_drag = '';
		}
	else
		{
			$wcps_slider_touch_drag = sanitize_text_field( $_POST['wcps_slider_touch_drag'] );
		}
	
	if(empty($_POST['wcps_slider_mouse_drag']))
		{
			$wcps_slider_mouse_drag = '';
		}
	else
		{
			$wcps_slider_mouse_drag = sanitize_text_field( $_POST['wcps_slider_mouse_drag'] );	
		}
		
	
	
	$wcps_content_source = sanitize_text_field( $_POST['wcps_content_source'] );
	$wcps_content_year = sanitize_text_field( $_POST['wcps_content_year'] );
	$wcps_content_month = sanitize_text_field( $_POST['wcps_content_month'] );
	$wcps_content_month_year = sanitize_text_field( $_POST['wcps_content_month_year'] );	
	
	
	
	
	
	if(empty($_POST['wcps_taxonomy']))
		{
			$wcps_taxonomy = '';
		}
	else
		{
			$wcps_taxonomy = sanitize_text_field( $_POST['wcps_taxonomy'] );
		}
	

	if(empty($_POST['wcps_taxonomy_category']))
		{
			$wcps_taxonomy_category = '';
		}
	else
		{
			$wcps_taxonomy_category = stripslashes_deep( $_POST['wcps_taxonomy_category'] );
		}
	
	
	
	
	
	if(empty($_POST['wcps_product_ids']))
		{
			$wcps_product_ids = '';
		}
	else
		{
			$wcps_product_ids = stripslashes_deep( $_POST['wcps_product_ids'] );
		}
	
	
		
	
	
	$wcps_cart_bg = sanitize_text_field( $_POST['wcps_cart_bg'] );

	$wcps_items_thumb_size = sanitize_text_field( $_POST['wcps_items_thumb_size'] );
	$wcps_items_thumb_max_hieght = sanitize_text_field( $_POST['wcps_items_thumb_max_hieght'] );	
			
	$wcps_items_empty_thumb = sanitize_text_field( $_POST['wcps_items_empty_thumb'] );	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'wcps_bg_img', $wcps_bg_img );	
	update_post_meta( $post_id, 'wcps_themes', $wcps_themes );
	update_post_meta( $post_id, 'wcps_total_items', $wcps_total_items );

	update_post_meta( $post_id, 'wcps_column_number', $wcps_column_number );
	
		
	update_post_meta( $post_id, 'wcps_auto_play', $wcps_auto_play );
	update_post_meta( $post_id, 'wcps_stop_on_hover', $wcps_stop_on_hover );	
	update_post_meta( $post_id, 'wcps_slider_navigation', $wcps_slider_navigation );
	update_post_meta( $post_id, 'wcps_slide_speed', $wcps_slide_speed );
		
	update_post_meta( $post_id, 'wcps_slider_pagination', $wcps_slider_pagination );
	update_post_meta( $post_id, 'wcps_pagination_slide_speed', $wcps_pagination_slide_speed );
	update_post_meta( $post_id, 'wcps_slider_pagination_count', $wcps_slider_pagination_count );

	update_post_meta( $post_id, 'wcps_slider_touch_drag', $wcps_slider_touch_drag );
	update_post_meta( $post_id, 'wcps_slider_mouse_drag', $wcps_slider_mouse_drag );
	
	update_post_meta( $post_id, 'wcps_content_source', $wcps_content_source );
	update_post_meta( $post_id, 'wcps_content_year', $wcps_content_year );
	update_post_meta( $post_id, 'wcps_content_month', $wcps_content_month );
	update_post_meta( $post_id, 'wcps_content_month_year', $wcps_content_month_year );	
	
	update_post_meta( $post_id, 'wcps_taxonomy', $wcps_taxonomy );
	update_post_meta( $post_id, 'wcps_taxonomy_category', $wcps_taxonomy_category );
	
	update_post_meta( $post_id, 'wcps_product_ids', $wcps_product_ids );	

	update_post_meta( $post_id, 'wcps_cart_bg', $wcps_cart_bg );

	update_post_meta( $post_id, 'wcps_items_thumb_size', $wcps_items_thumb_size );	
	update_post_meta( $post_id, 'wcps_items_thumb_max_hieght', $wcps_items_thumb_max_hieght );
	
	update_post_meta( $post_id, 'wcps_items_empty_thumb', $wcps_items_empty_thumb );	
	
	

}
add_action( 'save_post', 'meta_boxes_wcps_save' );


























?>