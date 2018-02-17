<?php  
/**
*Plugin Name: Custom Post Plugin
*Plugin URI: htttp://ideatree.com
*Description: Create a custom post for ideatree
*Author: Nicole Casares
*Author URI: nicolecasares.com
*Version: 1.0
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ){
	exit;
}


/**
======================================================
Post Type Section 
======================================================
*/



function idea_tree_post_type(){

    $labels = array(
    		'name' 			=> 'Property',
    		'singular_name' => 'Property',
    		'add_new' 		=> 'Add New Property',
    		'add_new_item' 	=> 'Add New',
    		'edit_item' 	=> 'Edit',

    );


	$args = array(
    		'labels'               => $labels,
    		'public'               => true,
    		'has_archive'          => true,
    		'publicly_queryable'   => true,
    		'show_in_nav_menue'    => true,
    		'show_in_admin_bar'    => true,
    		'can_export'           => true,
    		'query_var'            => true,
    		'rewrite'              => true,
    		'capability_type'      => 'post',
    		'menu_position' 	   => 2,
    		'hierarchical'         => false,
    		'menu_icon'			   => 'dashicons-admin-home',
    		'rewrite'              => array (
    			'slugs'            => 'Property',
    		),
    		'supports'             => array (
    			'title',
    			'editor',
    			'revision',
    			'author',
    			'custom-fields',

    		),
    		// 'taxonomies'    => array ('Sale', 'Rent'),
    		
    		// 'exclude_from_search' => false,

    	);

	register_post_type('place', $args);



}

add_action ('init', 'idea_tree_post_type');


/**
======================================================
Taxonomy Section 
======================================================
*/


function idea_tree_register_taxonomy (){


	$labels = array(
		'name'              		=> 'Property Status',
		'singular_name'     		=> 'Property Status',
		'search_items'      		=> 'Search',
		'all_items'        			=> 'All', 
		'parent_item'       		=> null,
		'parent_item_colon' 		=> null,
		'edit_item'         		=> 'Edit', 
		'update_item'       		=> 'Update',
		'add_new_item'      		=> 'Add New',
		'new_item_name'     		=> 'New Item', 
		'seperate_items_with_commas'=>'Seperate Status with commas',
		'add_or_remove_items' 		=> 'Add or Remove Status',
		'choose_from_most_used' 	=> 'Choose from most used',
		'not_found'         		=> 'Not found',
		'menu_name'         		=> 'Property Status',
	);



	$args = array (
		'hierarchical'  		=> true,
		'labels'        		=> $labels,
		'show_ui'       		=> true,
		'show_admin_column'  	=> true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'     		=> true,
		'rewrite'       		=> array(
			'slug'      =>'Property Status',

		 ),

	);


	register_taxonomy( 'Property Status', 'place', $args);

}

add_action( 'init', 'idea_tree_register_taxonomy' );


/**
======================================================
Metabox Section 
======================================================

    --Price

    --Location

    --Date of construction
*/


function idea_tree_add_custom_metabox() {

	add_meta_box(
		'idea_tree_meta',
		'Options for Property',
		'idea_tree_meta_callback',
		'place',
		'side'

	);
}

add_action('add_meta_boxes', 'idea_tree_add_custom_metabox' );

function idea_tree_meta_callback(){
	?>

<!-- 	<div>
		<div class="meta-row">
			<div class="meta-th">
				<label class="row-title"></label>
			</div>
			<div class="meta-td">
				<input type="text" name="property-id" value=""/>
			</div>
		</div>
	</div> -->
		<div>
		<div class="meta-row">
			<div class="meta-th">
				<label class="row-title"></label>
			</div>
			<div class="meta-td">
				Price
			</div>
			<div class="meta-td">
				<input type="text" name="property-id" value=""/>
			</div>
			<div>Location</div>
			<div class="meta-td">
				<input type="text" name="property-id" value=""/>
			</div>
			<div>Date of Construction</div>
			<div class="meta-td">
				<input type="text" name="property-id" value=""/>
			</div>
		</div>
	</div>

	<?php

}


















