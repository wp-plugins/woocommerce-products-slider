<?php

function wcps_body_flat($post_id)
	{
		
		$wcps_ribbons = array('none'=>'none');
		
		
		$wcps_bg_img = get_post_meta( $post_id, 'wcps_bg_img', true );
		$wcps_themes = get_post_meta( $post_id, 'wcps_themes', true );
		$wcps_total_items = get_post_meta( $post_id, 'wcps_total_items', true );
				
		$wcps_total_items_price_format = 'full';				
				
		$wcps_column_number = get_post_meta( $post_id, 'wcps_column_number', true );
		$wcps_column_number_mobile = 1;
			
		$wcps_auto_play = get_post_meta( $post_id, 'wcps_auto_play', true );
		$wcps_stop_on_hover = get_post_meta( $post_id, 'wcps_stop_on_hover', true );
		$wcps_slider_navigation = get_post_meta( $post_id, 'wcps_slider_navigation', true );
		$wcps_slide_speed = get_post_meta( $post_id, 'wcps_slide_speed', true );
				
		$wcps_slider_pagination = get_post_meta( $post_id, 'wcps_slider_pagination', true );
		$wcps_pagination_slide_speed = get_post_meta( $post_id, 'wcps_pagination_slide_speed', true );
		$wcps_slider_pagination_count = get_post_meta( $post_id, 'wcps_slider_pagination_count', true );

		$wcps_slider_touch_drag = get_post_meta( $post_id, 'wcps_slider_touch_drag', true );
		$wcps_slider_mouse_drag = get_post_meta( $post_id, 'wcps_slider_mouse_drag', true );
		
		$wcps_content_source = get_post_meta( $post_id, 'wcps_content_source', true );
		$wcps_content_year = get_post_meta( $post_id, 'wcps_content_year', true );
		$wcps_content_month = get_post_meta( $post_id, 'wcps_content_month', true );
		$wcps_content_month_year = get_post_meta( $post_id, 'wcps_content_month_year', true );
		
		$wcps_taxonomy = get_post_meta( $post_id, 'wcps_taxonomy', true );		
		$wcps_taxonomy_category = get_post_meta( $post_id, 'wcps_taxonomy_category', true );		
		
		$wcps_product_ids = get_post_meta( $post_id, 'wcps_product_ids', true );		
		
		$wcps_cart_bg = get_post_meta( $post_id, 'wcps_cart_bg', true );

		$wcps_items_thumb_size = get_post_meta( $post_id, 'wcps_items_thumb_size', true );
		$wcps_items_thumb_max_hieght = get_post_meta( $post_id, 'wcps_items_thumb_max_hieght', true );
		
		$wcps_items_empty_thumb = get_post_meta( $post_id, 'wcps_items_empty_thumb', true );	
		
		$wcps_ribbon_name = 'none';		
		
		
		
		
		$wcps_body = '';
		$wcps_body = '<style type="text/css">
		
		.wcps-container #wcps-'.$post_id.' div.wcps-items-cart a.add_to_cart_button,
		.wcps-container #wcps-'.$post_id.' div.wcps-items-cart a.added_to_cart
			{
			 background: '.$wcps_cart_bg .';

			} 
		
			
			
		
		</style>';
		
		
		$wcps_body .= '
		<div  class="wcps-container" style="background-image:url('.$wcps_bg_img.')">
		<div class="wcps-ribbon wcps-ribbon-'.$wcps_ribbon_name.'" style="background:url('.$wcps_ribbons[$wcps_ribbon_name].') no-repeat scroll 0 0 rgba(0, 0, 0, 0);)"></div>
		
		<div  id="wcps-'.$post_id.'" class="owl-carousel  wcps-'.$wcps_themes.'">
		
		';
		
		global $wp_query;
		

		
		if(($wcps_content_source=="latest"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $wcps_total_items,
						
						) );
			
			
			}		
		
		else if(($wcps_content_source=="older"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'ASC',
						'posts_per_page' => $wcps_total_items,
						
						) );

			}		

		else if(($wcps_content_source=="featured"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'meta_query' => array(
							array(
								'key' => '_featured',
								'value' => 'yes',
								)),
						'posts_per_page' => $wcps_total_items,
						
						) );

			}
			
			
		else if(($wcps_content_source=="on_sale"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'order' => 'asc',
						'posts_per_page' => $wcps_total_items,
						'meta_query' => array(
								array(
								'key' => '_visibility',
								'value' => array('catalog', 'visible'),
								'compare' => 'IN'
								),
								array(
								'key' => '_sale_price',
								'value' => 0,
								'compare' => '>',
								'type' => 'NUMERIC'
								)
								) ));

			}			
			
			
			
				


		else if(($wcps_content_source=="year"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'year' => $wcps_content_year,
						'posts_per_page' => $wcps_total_items,
						) );

			}

		else if(($wcps_content_source=="month"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'year' => $wcps_content_month_year,
						'monthnum' => $wcps_content_month,
						'posts_per_page' => $wcps_total_items,
						
						) );

			}

		else if($wcps_content_source=="taxonomy")
			{
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',							
						'posts_per_page' => $wcps_total_items,
						
						'tax_query' => array(
							array(
								   'taxonomy' => $wcps_taxonomy,
								   'field' => 'id',
								   'terms' => $wcps_taxonomy_category,
							)
						)
						
						) );
			}


		
		else if(($wcps_content_source=="product_id"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'post__in' => $wcps_product_ids,
						'posts_per_page' => $wcps_total_items,
						
						
						) );
			
			
			}
			
		else
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => 'product',
						'post_status' => 'publish',
						'posts_per_page' => $wcps_total_items,
						
						
						) );
			
			
			}			
			

								
		
		if ( $wp_query->have_posts() ) :
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
		global $product;

		$wcps_featured = get_post_meta( get_the_ID(), '_featured', true );
		
		
		
		
		$wcps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $wcps_items_thumb_size );
		
		$wcps_thumb_url = $wcps_thumb['0'];
		
		if(empty($wcps_thumb_url))
			{
				$wcps_thumb_url = $wcps_items_empty_thumb;
			}
		
		
		
		$currency = get_woocommerce_currency_symbol();
		
		
		if($wcps_total_items_price_format=='full')
			{
				$price = $product->get_price_html();	
			}
		elseif($wcps_total_items_price_format=='sale')
			{

				$price= $currency.get_post_meta( get_the_ID(), '_sale_price', true);
			}
		elseif($wcps_total_items_price_format=='regular')
			{

				$price = $currency.get_post_meta( get_the_ID(), '_regular_price', true);

			}
		else
			{
				$price = $product->get_price_html();
			}

		
		$wcps_body.= '<div class="wcps-items" >';
		$wcps_body.= '<div style="max-height:'.$wcps_items_thumb_max_hieght.';" class="wcps-items-thumb"><a href="'.get_permalink().'"><img alt="'.get_the_title().'" src="'.$wcps_thumb_url.'" /></a>';
		if($wcps_featured=="yes")
			{
			$wcps_body.= '<div class="wcps-featured">Featured</div>';
			}
		$wcps_body.= '</div>';
		
				$wcps_body.= '<div class="items-info">
					<div class="wcps-items-title" style="">'.get_the_title().'</div>
					<div class="wcps-items-price" style="">'.$price .'</div>
					<div class="wcps-items-cart">'.do_shortcode('[add_to_cart id="'.get_the_ID().'"]').'</div>
				</div>
			</div>';
		
		endwhile;
		
		wp_reset_query();
		endif;
		

			
		$wcps_body .= '</div></div>';
		
		$wcps_body .='<script>
		jQuery(document).ready(function($)
		{
			$("#wcps-'.$post_id.'").owlCarousel({
				
				items : '.$wcps_column_number.', //10 items above 1000px browser width
				itemsDesktop : [1000,'.$wcps_column_number.'], //5 items between 1000px and 901px
				itemsDesktopSmall : [900,2], // betweem 900px and 601px
				itemsTablet: [600,2], //2 items between 600 and 0
				itemsMobile : [479,'.$wcps_column_number_mobile.'], 
				navigationText : ["",""],
				';
				
			
		if($wcps_auto_play=="true")
			{
				
		$wcps_body .='autoPlay: '.$wcps_auto_play.',';
		
			}	
		
		if($wcps_stop_on_hover=="true")
			{
				
		$wcps_body .='stopOnHover: '.$wcps_stop_on_hover.',';
		
			}				
				
		if($wcps_slider_navigation=="true")
			{
				
		$wcps_body .='navigation: '.$wcps_slider_navigation.',';
		
			}				
				
		if(!empty($wcps_slider_pagination))
			{
				
		$wcps_body .='pagination: '.$wcps_slider_pagination.',';
		
			}
		else
			{
			$wcps_body .='pagination: false,';
			}
				
				
		if(!empty($wcps_slider_pagination_count))
			{
				
		$wcps_body .='paginationNumbers: true,';
		
			}
		else
			{
			$wcps_body .='paginationNumbers: false,';
			}				
				
				
				
		if(!empty($wcps_slide_speed))
			{
				
		$wcps_body .='slideSpeed: '.$wcps_slide_speed.',';
		
			}
			
				
		if(!empty($wcps_pagination_slide_speed))
			{
				
		$wcps_body .='paginationSpeed: '.$wcps_pagination_slide_speed.',';
		
			}			
			
			
		if(!empty($wcps_slider_touch_drag))
			{
				
		$wcps_body .='touchDrag : true,';
		
			}			
		else
			{
			$wcps_body .='touchDrag: false,';
			}
			
			
			
		if(!empty($wcps_slider_mouse_drag ))
			{
				
		$wcps_body .='mouseDrag  : true,';
		
			}			
		else
			{
			$wcps_body .='mouseDrag : false,';
			}			
			
			
			
			
							
				
				
				
		$wcps_body .='});
		
		});</script>';
		
		
		
		
		
		
		
		
		
		
		return $wcps_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}