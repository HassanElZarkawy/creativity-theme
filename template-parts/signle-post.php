<?php
    $id = get_the_ID();
    $thumbnail = '';
    if ( has_post_thumbnail( $id ) ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
        $thumbnail = $image[0];
    }
?>

<div id="blog" class="section" style="padding-top: 50px; padding-bottom: 50px;">
	<!-- Container -->
	<div class="container">

		<!-- Row -->
		<div class="row">

			<!-- Main -->
			<main id="main" class="col-md-9">
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
						<p><?php the_content() ?></p>
					</div>

                    <?php $tags = get_the_tags() ?>
                    <?php if ($tags) { ?>
                        <!-- blog tags -->
                        <div class="blog-tags">
                            <h5>Tags :</h5>
                            <?php foreach ($tags as $tag) { ?>
                                <a href="#"><i class="fa fa-tag"></i><?php echo $tag->name ?></a>
                            <?php } ?>
                        </div>
                        <!-- blog tags -->
                    <?php } ?>

					<!-- blog author -->
					<div class="blog-author">
						<div class="media">
							<div class="media-left">
                                <!-- <img class="media-object" src="./img/author.jpg" alt=""> -->
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 50, '', get_the_author(), array('class' => 'media-object', 'extra_attr' => 'style="max-width: 50px !important;"') ); ?>
							</div>
							<div class="media-body">
								<div class="media-heading">
									<h3><?php echo get_the_author_meta('display_name'); ?></h3>
								</div>
								<p><?php echo get_the_author_meta('description') ?></p>
							</div>
						</div>
					</div>
					<!-- /blog author -->

					<!-- blog comments -->
					<div class="blog-comments">
                        <?php $comments = get_comments( array( 'post_id' => get_the_ID() ) ); ?>
						<h3 class="title">(<?php echo count($comments) ?>) Comments</h3>
                        <?php if ($comments) { ?>
                            <?php foreach ($comments as $comment) { ?>
                                <!-- comment -->
                                <div class="media">
                                    <div class="media-left">
                                        <img class="media-object" src="./img/perso2.jpg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <?php echo $comment->comment_author; ?>
                                            <span class="time"><?php echo $comment->comment_date; ?></span>
                                        </h4>
                                        <p><?php echo $comment->comment_content; ?></p>
                                    </div>
                                </div>
                                <!-- /comment -->
                            <?php } ?>
                        <?php } ?>

					</div>
					<!-- /blog comments -->

					<!-- reply form -->
					<div class="reply-form">
						<h3 class="title">Leave a reply</h3>
						<form>
							<input class="input" type="text" placeholder="Name">
							<input class="input" type="email" placeholder="Email">
							<textarea placeholder="Add Your Commment"></textarea>
							<button type="submit" class="main-btn">Submit</button>
						</form>
					</div>
					<!-- /reply form -->
				</div>
			</main>
			<!-- /Main -->


			<!-- Aside -->
			<aside id="aside" class="col-md-3">

				<!-- Search -->
				<div class="widget">
					<div class="widget-search">
						<input class="search-input" type="text" placeholder="search">
						<button class="search-btn" type="button"><i class="fa fa-search"></i></button>
					</div>
				</div>
				<!-- /Search -->

				<!-- Category -->
				<div class="widget">
					<h3 class="title">Category</h3>
					<div class="widget-category">
                        <?php $categories = get_categories(array('order_by' => 'name', 'order' => 'ASC')) ?>
                        <?php foreach ($categories as $category) { ?>
                            <a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></a>
                        <?php } ?>
					</div>
				</div>
				<!-- /Category -->

				<!-- Posts sidebar -->
				<div class="widget">
					<h3 class="title">Recent Posts</h3>
                    <?php $recent_posts = wp_get_recent_posts(array('numberposts' => 3, 'post_status' => 'publish')); ?>
                    <?php foreach ($recent_posts as $post) { ?>
                        <!-- single post -->
                        <div class="widget-post">
                            <a href="<?php echo get_permalink($post['ID']) ?>">
                                <?php echo get_the_post_thumbnail($post['ID'], 'full'); ?>
                                <?php echo $post['post_title'] ?>
                            </a>
                            <ul class="blog-meta">
                                <li><?php echo date('j-n-Y', strtotime($post['post_date'])); ?></li>
                            </ul>
                        </div>
                        <!-- /single post -->
                    <?php } ?>

				</div>
				<!-- /Posts sidebar -->

				<!-- Tags -->
				<div class="widget">
                    <h3 class="title">Tags</h3>
                    <?php $tags = get_tags(); ?>
					<div class="widget-tags">
                        <?php foreach ($tags as $tag) { ?>
                            <a href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?></a>
                        <?php } ?>
					</div>
				</div>
				<!-- /Tags -->
			</aside>
			<!-- /Aside -->
		</div>
		<!-- /Row -->
	</div>
	<!-- /Container -->
</div>