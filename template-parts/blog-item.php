<!-- Blog -->
<div id="blog" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title"><?php echo $part_title ?></h2>
            </div>
            <!-- /Section header -->
            <?php foreach ($posts as $post) { ?>
                <?php
                    $thumbnail = '';
                    $id = $post['post_id'];
                    if ( has_post_thumbnail( $id ) ) {
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
                        $thumbnail = $image[0];
                    }
                ?>
                <!-- blog -->
                <div class="col-md-4">
                    <div class="blog">
                        <div class="blog-img">
                            <!-- <img class="img-responsive" src="<?php echo $thumbnail ?>" alt=""> -->
                            <?php echo $post['thumbnail'] ?>
                        </div>
                        <div class="blog-content">
                            <ul class="blog-meta">
                                <li><i class="fa fa-user"></i><?php echo $post['author_name']; ?></li>
                                <li><i class="fa fa-clock-o"></i><?php echo $post['date'] ?></li>
                            </ul>
                            <h3><?php echo $post['title'] ?></h3>
                            <a href="<?php echo $post['permalink'] ?>">Read More!</a>
                        </div>
                    </div>
                </div>
                <!-- /blog -->
            <?php } ?>
        </div>
    </div>
</div>