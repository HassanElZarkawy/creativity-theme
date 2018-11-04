<!-- About -->
<div id="about" class="section md-padding">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Section header -->
			<div class="section-header text-center">
				<h2 class="title"><?php echo $part_title ?></h2>
			</div>
			<!-- /Section header -->
			<?php foreach ($features as $feature) { ?>
				<!-- about -->
				<div class="col-md-4">
					<div class="about">
						<i class="fa fa-<?php echo $feature['icon'] ?>"></i>
						<h3><?php echo $feature['title']; ?></h3>
						<p><?php echo $feature['content']; ?></p>
					</div>
				</div>
				<!-- /about -->
			<?php } ?>
		</div>
		<!-- /Row -->
	</div>
	<!-- /Container -->
</div>
<!-- /About -->