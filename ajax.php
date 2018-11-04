<?php

add_action('wp_ajax_nopriv_creativity_save_contact_form', 'creativity_save_contact_form_callback');
add_action('wp_ajax_creativity_save_contact_form', 'creativity_save_contact_form_callback');

function creativity_save_contact_form_callback() {
    $name = wp_strip_all_tags($_POST['name']);
    $email = wp_strip_all_tags($_POST['email']);
    $subject = wp_strip_all_tags($_POST['subject']);
    $message = wp_strip_all_tags($_POST['message']);

    $args = array(
        'post_title' => $subject,
        'post_content' => $message,
        'post_author' => 1,
        'post_type' => 'messages',
        'post_status' => 'publish',
        'meta_input' => array(
            'contact_email' => $email,
            'contact_ip' => $_SERVER['REMOTE_ADDR'],
            'contact_name' => $name
        )
    );

    $post_id = wp_insert_post($args);
    if ($post_id !== 0) {
        $to = get_bloginfo('admin_email');
        $subject = get_bloginfo('name') . ': ' . $subject;
        $headers = array(
            'From: ' . get_bloginfo('name') . '<'.$to.'>',
            'Reply-To: ' . $name . '<'.$email.'>',
            'Content-Type: text/html; charset=UTF-8'
        );
        wp_mail($to, $subject, $message, $headers);
    }
    $result = array(
        'status' => $post_id === 0 ? 0 : 1,
        'message' => $post_id === 0 ? 'Something went wrong and we couldn\'t complete your request.' : 'Message sent successfully'
    );
    echo json_encode($result);
    die();
}