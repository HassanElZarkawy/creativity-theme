<?php

function page_meta_box() {
    add_meta_box('page_display_feature_image', 'Full Size Feature Image', 'display_page_feature_image_meta_box', 'page', 'side');
}
add_action('add_meta_boxes', 'page_meta_box');

function display_page_feature_image_meta_box() {
    global $post;
	$display_feature = get_post_meta($post->ID, 'is_page_feature_image', true);
	$page_title = get_post_meta($post->ID, 'page_title', true);
    $page_subtitle = get_post_meta($post->ID, 'page_subtitle', true);
    
    $primary_button_text = get_post_meta($post->ID, 'primary_button_text', true);
    $primary_button_link = get_post_meta($post->ID, 'primary_button_link', true);

    $secondary_button_text = get_post_meta($post->ID, 'secondary_button_text', true);
    $secondary_button_link = get_post_meta($post->ID, 'secondary_button_link', true);
    ?>
		<label for="is_page_feature_image">Display Full Screen Feature Image?</label>
		<select name="is_page_feature_image" id="is_page_feature_image" class="widfat">
			<option value="yes" <?php echo $display_feature === 'yes' ? 'selected' : '' ?>>Yes</option>
			<option value="no"<?php echo $display_feature === 'no' ? 'selected' : '' ?>>No</option>
        </select>
        
        <br>
        <br>

        <label for="page_title">Title</label>
        <input class="widefat" type="text" name="page_title" id="page_title" placeholder="<?php echo bloginfo('name') ?>" value="<?php echo $page_title ?>">
        <label for="page_subtitle">Sub Title</label>
        <input class="widefat" type="text" name="page_subtitle" id="page_subtitle" placeholder="<?php echo bloginfo('description') ?>" value="<?php echo $page_subtitle ?>">
        
        <br>
        <br>
        
        <label for="">Primary Button Text</label>
        <input class="widefat" type="text" name="primary_button_text" id="primary_button_text" placeholder="Get Started!" value="<?php echo $primary_button_text ?>">
        <label for="">Primary Button Link</label>
        <input class="widefat" type="text" name="primary_button_link" id="primary_button_link" placeholder="http://google.com" value="<?php echo $secondary_button_text ?>">

        <br>
        <br>

        <label for="">Secondary Button Text</label>
        <input class="widefat" type="text" name="secondary_button_text" id="secondary_button_text" placeholder="Learn More" value="<?php echo $primary_button_link ?>">
        <label for="">Secondary Button Link</label>
        <input class="widefat" type="text" name="secondary_button_link" id="secondary_button_link" placeholder="http://google.com" value="<?php echo $secondary_button_link ?>">
    <?php
}

function save_display_page_feature_image($post_id) {
    if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
        return;
    }
    $post = get_post($post_id);
    if ($post->post_type !== 'page') {
        return;
    }
    if (array_key_exists('is_page_feature_image', $_POST)) {
        update_post_meta($post_id, 'is_page_feature_image', $_POST['is_page_feature_image']);
    }

    if (array_key_exists('page_title', $_POST)) {
        update_post_meta($post_id, 'page_title', $_POST['page_title']);
    }

    if (array_key_exists('page_subtitle', $_POST)) {
        update_post_meta($post_id, 'page_subtitle', $_POST['page_subtitle']);
    }

    if (array_key_exists('primary_button_text', $_POST)) {
        update_post_meta($post_id, 'primary_button_text', $_POST['primary_button_text']);
    }

    if (array_key_exists('primary_button_link', $_POST)) {
        update_post_meta($post_id, 'primary_button_link', $_POST['primary_button_link']);
    }

    if (array_key_exists('secondary_button_text', $_POST)) {
        update_post_meta($post_id, 'secondary_button_text', $_POST['secondary_button_text']);
    }

    if (array_key_exists('secondary_button_link', $_POST)) {
        update_post_meta($post_id, 'secondary_button_link', $_POST['secondary_button_link']);
    }
}
add_action('save_post', 'save_display_page_feature_image');