<!-- Testimonial -->
<div id="testimonial" class="section md-padding">
	<!-- Background Image -->
	<div class="bg-img" style="background-image: url('<?php echo $background ?>');">
		<div class="overlay"></div>
	</div>
	<!-- /Background Image -->
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Testimonial slider -->
			<div class="col-md-10 col-md-offset-1">
				<div id="testimonial-slider" class="owl-carousel owl-theme">
                    <?php foreach ($posts as $post) { ?>
                        <!-- testimonial -->
                        <div class="testimonial">
                            <div class="testimonial-meta">
                                <img src="<?php echo $post['image'] ?>" alt="">
                                <h3 class="white-text"><?php echo $post['title'] ?></h3>
                            </div>
                            <p class="white-text"><?php echo $post['content'] ?></p>
                        </div>
                        <!-- /testimonial -->
                    <?php } ?>
				</div>
			</div>
			<!-- /Testimonial slider -->
		</div>
		<!-- /Row -->
	</div>
	<!-- /Container -->
</div>
<!-- /Testimonial -->