<!-- Portfolio -->
<div id="portfolio" class="section md-padding bg-grey">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Section header -->
			<div class="section-header text-center">
				<h2 class="title">Featured Works</h2>
			</div>
			<!-- /Section header -->
			<?php foreach ($portfolios as $portfolio) { ?>
				<!-- Work -->
				<div class="col-md-4 col-xs-6 work">
					<img class="img-responsive" src="<?php echo $portfolio['thumbnail'] ?>" alt="">
					<div class="overlay"></div>
					<div class="work-content">
						<span><?php echo $portfolio['category'] ?></span>
						<h3><?php echo $portfolio['title'] ?></h3>
						<div class="work-link">
							<a href="<?php echo $portfolio['link'] ?>"><i class="fa fa-external-link"></i></a>
							<a class="lightbox" href="<?php echo $portfolio['thumbnail'] ?>"><i class="fa fa-search"></i></a>
						</div>
					</div>
				</div>
				<!-- /Work -->
			<?php } ?>
		</div>
		<!-- /Row -->
	</div>
	<!-- /Container -->
</div>
<!-- /Portfolio -->