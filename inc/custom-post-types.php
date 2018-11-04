<?php

function get_labels($singular, $plu) {
	$uc_sing = ucfirst($singular);
	$uc_plu = ucfirst($plu);
	return array(
	   'name' => $uc_plu,
	   'singular_name' => $uc_sing,
	   'add_new' => 'Add New ' . $uc_sing,
	   'add_new_item' => 'Add New ' . $uc_sing,
	   'edit_item' => 'Edit ' . $uc_sing,
	   'new_item' => 'New ' . $uc_sing,
	   'all_items' => 'All ' . $uc_plu,
	   'view_item' => 'View ' . $uc_sing,
	   'search_items' => 'Search ' . $uc_plu,
	   'not_found' =>  'No '.$uc_plu.' Found',
	   'not_found_in_trash' => 'No '.$uc_plu.' found in Trash', 
	   'parent_item_colon' => '',
	   'menu_name' => $uc_plu,
   );
}

/* --------- PORTFOLIO POST TYPE --------- */

// register custom post type to work with
function creativity_features_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Features',
    	'singular_name' => 'Feature',
    	'add_new' => 'Add New Feature',
    	'add_new_item' => 'Add New Feature',
    	'edit_item' => 'Edit Feature',
    	'new_item' => 'New Feature',
    	'all_items' => 'All Feature',
    	'view_item' => 'View Feature',
    	'search_items' => 'Search Features',
    	'not_found' =>  'No Features Found',
    	'not_found_in_trash' => 'No Features found in Trash', 
    	'parent_item_colon' => '',
		'menu_name' => 'Features',
    );
    //register post type
	register_post_type( 'features', array(
		'labels' => $labels,
		'has_archive' => false,
 		'public' => true,
		'supports' => array( 'title', 'editor' ),
		'exclude_from_search' => true,
		'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'features' ),
		'register_meta_box_cb' => 'features_meta_box',
		'menu_icon' => 'dashicons-layout',
		)
	);
}
add_action( 'init', 'creativity_features_post_type' );

function features_meta_box() {
    add_meta_box('features_custom_post_type', 'Feature Options', 'display_features_meta_box', 'features', 'side');
}
add_action('add_meta_boxes', 'features_meta_box');

function display_features_meta_box() {
    global $post;
    $icon = get_post_meta($post->ID, 'feature_icon', true);
    ?>
        <label for="feature_icon">Icon</label>
        <input type="text" name="feature_icon" id="feature_icon" class="widefat" value="<?php echo $icon ? $icon : 'diamond' ?>" placeholder="any FontAwesome icon name. Please execlude fa and fa-, just the name">
    <?php
}

function save_feature($post_id) {
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }
    $post = get_post($post_id);
    if ($post->post_type !== 'features') {
        return;
    }
    if (array_key_exists('feature_icon', $_POST)) {
        update_post_meta($post_id, 'feature_icon', $_POST['feature_icon']);
    }
}
add_action('save_post', 'save_feature');



/* --------- PORTFOLIO POST TYPE --------- */

// register custom post type to work with
function creativity_portfolio_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Portfolios',
    	'singular_name' => 'Portfolio',
    	'add_new' => 'Add New Portfolio',
    	'add_new_item' => 'Add New Portfolio',
    	'edit_item' => 'Edit Portfolio',
    	'new_item' => 'New Portfolio',
    	'all_items' => 'All Portfolio',
    	'view_item' => 'View Portfolio',
    	'search_items' => 'Search Portfolios',
    	'not_found' =>  'No Portfolios Found',
    	'not_found_in_trash' => 'No Portfolios found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Portfolios',
    );
    //register post type
	register_post_type( 'portfolios', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'portfolios' ),
		'register_meta_box_cb' => 'features_meta_box',
		'menu_icon' => 'dashicons-money'
		)
	);
}
add_action( 'init', 'creativity_portfolio_post_type' );

function portfolios_meta_box() {
    add_meta_box('portfolios_custom_post_type', 'Portfolio Options', 'display_portfolios_meta_box', 'portfolios', 'side');
}
add_action('add_meta_boxes', 'portfolios_meta_box');

function display_portfolios_meta_box() {
    global $post;
    $link = get_post_meta($post->ID, 'project_link', true);
    $category = get_post_meta($post->ID, 'project_category', true);
    ?>
        <label for="project_link">Project Link</label>
		<input type="text" name="project_link" id="project_link" class="widefat" value="<?php echo $link ?>" placeholder="https://google.com">
		
		<br> <br>

		<label for="project_category">Project Category</label>
        <input type="text" name="project_category" id="project_category" class="widefat" value="<?php echo $category ?>" placeholder="E-Commerce">
    <?php
}

function save_portfolio($post_id) {
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }
    $post = get_post($post_id);
    if ($post->post_type !== 'portfolios') {
        return;
    }
    if (array_key_exists('project_link', $_POST)) {
        update_post_meta($post_id, 'project_link', $_POST['project_link']);
	}
	
	if (array_key_exists('project_category', $_POST)) {
        update_post_meta($post_id, 'project_category', $_POST['project_category']);
    }
}
add_action('save_post', 'save_portfolio');



/* --------- SERVICE POST TYPE --------- */

// register custom post type to work with
function creativity_services_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Services',
    	'singular_name' => 'Service',
    	'add_new' => 'Add New Service',
    	'add_new_item' => 'Add New Service',
    	'edit_item' => 'Edit Service',
    	'new_item' => 'New Service',
    	'all_items' => 'All Services',
    	'view_item' => 'View Service',
    	'search_items' => 'Search Services',
    	'not_found' =>  'No Services Found',
    	'not_found_in_trash' => 'No Services found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Services',
    );
    //register post type
	register_post_type( 'services', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'services' ),
		'menu_icon' => 'dashicons-businessman'
		)
	);
}
add_action( 'init', 'creativity_services_post_type');

function services_meta_box() {
    add_meta_box('services_custom_post_type', 'Service Options', 'display_services_meta_box', 'services', 'side');
}
add_action('add_meta_boxes', 'services_meta_box');

function display_services_meta_box() {
    global $post;
    $icon = get_post_meta($post->ID, 'service_icon', true);
    ?>
        <label for="service_icon">Icon</label>
        <input type="text" name="service_icon" id="service_icon" class="widefat" value="<?php echo $icon ? $icon : 'diamond' ?>" placeholder="any FontAwesome icon name. Please execlude fa and fa-, just the name">
    <?php
}

function save_service($post_id) {
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }
    $post = get_post($post_id);
    if ($post->post_type !== 'services') {
        return;
    }
    if (array_key_exists('service_icon', $_POST)) {
        update_post_meta($post_id, 'service_icon', $_POST['service_icon']);
	}
}
add_action('save_post', 'save_service');





/* --------- PLANS POST TYPE --------- */

// register custom post type to work with
function creativity_plans_post_type() {
	register_post_type( 'plans', array(
		'labels' => get_labels('plan', 'plans'),
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'plans' ),
		'menu_icon' => 'dashicons-tickets-alt'
		)
	);
}
add_action( 'init', 'creativity_plans_post_type');

function plans_meta_box() {
    add_meta_box('plans_plans_post_type', 'Plan Options', 'display_plans_meta_box', 'plans', 'side');
}
add_action('add_meta_boxes', 'plans_meta_box');

function display_plans_meta_box() {
	global $post;
	$all = get_post_meta($post->ID);
    $price = $all['price'][0];
    $currency = $all['currency'][0];
    $duration = $all['duration'][0];
    $action_text = $all['action_text'][0];
    $action_link = $all['action_link'][0];
    ?>
        <label for="plan_price">Price</label>
		<input type="text" name="plan_price" id="plan_price" class="widefat" value="<?php echo $price ?>" placeholder="The base price for your plan">
		
		<br> <br>

		<label for="plan_currency">Curreny</label>
		<input type="text" name="plan_currency" id="plan_currency" class="widefat" value="<?php echo $currency ?>" placeholder="$, GBP, Euro, etc...">
		
		<br> <br>

		<label for="plan_duration">Duration</label>
		<input type="text" name="plan_duration" id="plan_duration" class="widefat" value="<?php echo $duration ?>" placeholder="day, week, month, year">

		<br> <br>

		<label for="action_text">Call To Action Text</label>
		<input type="text" name="action_text" id="action_text" class="widefat" value="<?php echo $action_text ?>" placeholder="Buy Now!">

		<br> <br>

		<label for="action_link">Call To Action Link</label>
		<input type="text" name="action_link" id="action_link" class="widefat" value="<?php echo $action_link ?>" placeholder="http://example.com/purchase">
    <?php
}

function save_plan($post_id) {
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }
    $post = get_post($post_id);
    if ($post->post_type !== 'plans') {
        return;
    }
    if (array_key_exists('plan_price', $_POST)) {
        update_post_meta($post_id, 'price', $_POST['plan_price']);
	}

	if (array_key_exists('plan_duration', $_POST)) {
        update_post_meta($post_id, 'duration', $_POST['plan_duration']);
	}

	if (array_key_exists('plan_currency', $_POST)) {
        update_post_meta($post_id, 'currency', $_POST['plan_currency']);
	}

	if (array_key_exists('action_text', $_POST)) {
        update_post_meta($post_id, 'action_text', $_POST['action_text']);
	}

	if (array_key_exists('action_link', $_POST)) {
        update_post_meta($post_id, 'action_link', $_POST['action_link']);
	}
}
add_action('save_post', 'save_plan');





/* --------- TESTIMONIALS POST TYPE --------- */

function creativity_testimonials_post_type() {
	register_post_type( 'testimonials', array(
		'labels' => get_labels('testimonial', 'testimonials'),
		'has_archive' => false,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'exclude_from_search' => true,
		'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'testimonials' ),
		'register_meta_box_cb' => 'features_meta_box',
		'menu_icon' => 'dashicons-thumbs-up',
		)
	);
}
add_action( 'init', 'creativity_testimonials_post_type' );

function testimonial_columns($columns) {
	$new_columns = array();
	$new_columns['title'] = 'Person';
	$new_columns['message'] = 'Testimonial';
	$new_columns['date'] = 'Date';
	return $new_columns;
}
add_filter('manage_testimonials_posts_columns', 'testimonial_columns');

function get_testimonials_custom_columns_content($columns, $post_id) {
	switch ($columns) {
		case 'message':
			$content = get_the_content();
			echo strlen($content) > 100 ? substr($content, 0, 100) . '...' : $content; 
			break;
	}
}
add_action('manage_testimonials_posts_custom_column', 'get_testimonials_custom_columns_content', 10, 2);




/* --------- TESTIMONIALS POST TYPE --------- */

// register custom post type to work with
function creativity_messages_post_type() {
	// set up labels
	register_post_type( 'messages', array(
		'labels' => get_labels('message', 'messages'),
		'has_archive' => false,
 		'public' => true,
		'supports' => array( 'title', 'editor' ),
		'exclude_from_search' => true,
		'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'messages' ),
		'register_meta_box_cb' => 'messages_meta_box',
		'menu_icon' => 'dashicons-email',
		)
	);
}
add_action( 'init', 'creativity_messages_post_type' );

function messages_meta_box() {
    add_meta_box('messages_custom_post_type', 'Message Meta-data', 'display_messages_meta_box', 'messages', 'side');
}
add_action('add_meta_boxes', 'portfolios_meta_box');

function display_messages_meta_box() {
    global $post;
    $email = get_post_meta($post->ID, 'contact_email', true);
    $name = get_post_meta($post->ID, 'contact_name', true);
    $ip = get_post_meta($post->ID, 'contact_ip', true);
    ?>
        <label for="contact_email">Contact Email</label>
		<input type="text" name="contact_email" id="contact_email" class="widefat" value="<?php echo $email ?>" size="25" disabled>
		
		<br> <br>

		<label for="contact_name">Contact Name</label>
		<input type="text" name="contact_name" id="contact_name" class="widefat" value="<?php echo $name ?>" size="25" disabled>
		
		<br> <br>

		<label for="contact_ip">Contact IP</label>
        <input type="text" name="contact_ip" id="contact_ip" class="widefat" value="<?php echo $ip ?>" size="25" disabled>
    <?php
}