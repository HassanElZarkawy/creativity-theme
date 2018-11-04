<!-- Service -->
<div id="service" class="section md-padding">
	<!-- Container -->
	<div class="container">
		<!-- Row -->
		<div class="row">
			<!-- Section header -->
			<div class="section-header text-center">
				<h2 class="title"><?php echo $part_title ?></h2>
			</div>
			<!-- /Section header -->
			<?php foreach ($services as $service) { ?>
				<!-- service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<i class="fa fa-<?php echo $service['icon'] ?>"></i>
						<h3><?php echo $service['title'] ?></h3>
						<p><?php echo $service['content'] ?></p>
					</div>
				</div>
				<!-- /service -->
			<?php } ?>
		</div>
		<!-- /Row -->
	</div>
	<!-- /Container -->
</div>
<!-- /Service -->