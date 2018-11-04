<?php
    $id = get_the_ID();
    $thumbnail = '';
    if ( has_post_thumbnail( $id ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
        $thumbnail = $image[0];
    }
?>
<!-- blog -->
<div class="col-md-4">
	<div class="blog">
		<div class="blog-img">
			<img class="img-responsive" src="<?php echo $thumbnail ?>" alt="">
		</div>
		<div class="blog-content">
			<ul class="blog-meta">
                <li><i class="fa fa-user"></i><?php echo get_the_author_meta('display_name'); ?></li>
				<li><i class="fa fa-clock-o"></i><?php echo get_the_date() ?></li>
			</ul>
			<h3><?php the_title() ?></h3>
			<a href="<?php echo get_permalink(get_the_ID()) ?>">Read More!</a>
		</div>
	</div>
</div>
<!-- /blog -->