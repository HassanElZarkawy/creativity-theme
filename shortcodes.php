<?php

function shortcode_get_services($atts, $content, $tag) {
    $part_title = isset($atts['title']) ? $atts['title'] : 'What We Offer';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $args = array( 'post_type' => 'services', 'posts_per_page' => $num );
	$loop = new WP_Query( $args );
	$posts = array();
	while ( $loop->have_posts() ) : $loop->the_post();
		$id = get_the_ID();
		$icon = get_post_meta($id, 'service_icon', 'diamond', true);
		$posts[] = array(
			'title' => get_the_title(), 
			'icon' => $icon, 
			'content' => get_the_content(),
		);
    endwhile;
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('services', array('services' => $posts, 'part_title' => $part_title));
}
add_shortcode('creativity_services', 'shortcode_get_services');


function shortcode_get_features($atts, $content, $tag) {
    $part_title = isset($atts['title']) ? $atts['title'] : 'What We Offer';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $args = array( 'post_type' => 'features', 'posts_per_page' => $num );
	$loop = new WP_Query( $args );
	$posts = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $posts[] = array(
            'title' => get_the_title(), 
            'content' => get_the_content(), 
            'icon' => get_post_meta(get_the_ID(), 'feature_icon', 'diamond', true),
            'part_title' => $title
        );
    endwhile;
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('features', array('features' => $posts, 'part_title' => $part_title));
}
add_shortcode('creativity_features', 'shortcode_get_features');


function shortcode_get_portfolios($atts, $content, $tag) {
    $part_title = isset($atts['title']) ? $atts['title'] : 'Featured Works';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $args = array( 'post_type' => 'portfolios', 'posts_per_page' => $num );
	$loop = new WP_Query( $args );
	$posts = array();
	while ( $loop->have_posts() ) : $loop->the_post();
        $id = get_the_ID();
        $link = get_post_meta($id, 'project_link', '', true);
        $category = get_post_meta($id, 'project_category', '', true);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
        $posts[] = array(
            'title' => get_the_title(), 
            'link' => $link[0], 
            'thumbnail' => $image[0],
            'category' => $category[0]
        );
    endwhile;
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('portfolio', array('portfolios' => $posts));
}
add_shortcode('creativity_portfolios', 'shortcode_get_portfolios');

function shortcode_get_plans($atts, $content, $tag) {
    $part_title = isset($atts['title']) ? $atts['title'] : 'Our Plans';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $args = array( 'post_type' => 'plans', 'posts_per_page' => $num );
	$loop = new WP_Query( $args );
	$posts = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $metas = get_post_meta(get_the_ID());
        $price = $metas['price'][0];
        $duration = $metas['duration'][0];
        $currency = $metas['currency'][0];
        $action_link = $metas['action_link'][0];
        $action_text = $metas['action_text'][0];
        $posts[] = array(
            'title' => get_the_title(), 
            'content' => get_the_content(), 
            'price' => $price, 
            'duration' => $duration,
            'currency' => $currency,
            'action_link' => $action_link,
            'action_text' => $action_text,
        );
    endwhile;
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('pricing', array('prices' => $posts, 'part_title' => $part_title));
}
add_shortcode('creativity_plans', 'shortcode_get_plans');


function shortcode_get_recent_posts($atts, $content, $tag) {
    $part_title = isset($atts['title']) ? $atts['title'] : 'Our Plans';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $posts = array();
    $recent_posts = wp_get_recent_posts(array('numberposts' => $num, 'post_status' => 'publish'));
    foreach ($recent_posts as $post) {
        $posts[] = array(
            'permalink' => get_permalink($post['ID']),
            'thumbnail' => get_the_post_thumbnail($post['ID'], 'full'),
            'title' => $post['post_title'],
            'date' => date('j-n-Y', strtotime($post['post_date'])),
            'author_name' => get_the_author_meta('display_name', $post['ID']),
            'post_id' => $post['ID']
        );
    }
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('blog-item', array('posts' => $posts, 'part_title' => $part_title));
}
add_shortcode('creativity_recent_posts', 'shortcode_get_recent_posts');


function shortcode_get_testimonials($atts, $content, $tag) {
    $background = isset($atts['background']) ? $atts['background'] : '';
    $num = isset($atts['items']) ? $atts['items'] : 3;
    $args = array( 'post_type' => 'testimonials', 'posts_per_page' => $num );
	$loop = new WP_Query( $args );
	$posts = array();
    while ( $loop->have_posts() ) : $loop->the_post();
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
        $posts[] = array(
            'content' => get_the_content(),
            'image' => $image[0],
            'title' => get_the_title()
        );
    endwhile;
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('testimonials', array('posts' => $posts, 'background' => $background));
}
add_shortcode('creativity_testimonials', 'shortcode_get_testimonials');


function shortcode_get_contact_form($atts, $content, $tag) {
    $phone = isset($atts['phone']) ? $atts['phone'] : '';
    $email = isset($atts['email']) ? $atts['email'] : '';
    $address = isset($atts['address']) ? $atts['address'] : '';
    $template = new Template(dirname(__FILE__) . '/template-parts');
    return $template->render('contact_form', array(
        'phone' => $phone,
        'email' => $email,
        'address' => $address
    ));
}
add_shortcode('creativity_contact_form', 'shortcode_get_contact_form');