<!-- Pricing -->
<div id="pricing" class="section md-padding">

<!-- Container -->
<div class="container">

    <!-- Row -->
    <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
            <h2 class="title"><?php echo $part_title ?></h2>
        </div>
        <!-- /Section header -->

        <?php foreach ($prices as $price) { ?>
            <!-- pricing -->
            <div class="col-sm-4">
                <div class="pricing">
                    <div class="price-head">
                        <span class="price-title"><?php echo $price['title'] ?></span>
                        <div class="price">
                            <h3><?php echo $price['price'] . $price['currency'] ?><span class="duration">/ <?php echo $price['duration'] ?></span></h3>
                        </div>
                    </div>
                    <!-- <ul class="price-content">
                        <li>
                            <p>1GB Disk Space</p>
                        </li>
                        <li>
                            <p>100 Email Account</p>
                        </li>
                        <li>
                            <p>24/24 Support</p>
                        </li>
                    </ul> -->
                    <?php echo $price['content']; ?>
                    <div class="price-btn">
                        <a class="outline-btn" href="<?php echo $price['action_link'] ?>"><?php echo $price['action_text'] ?></a>
                    </div>
                </div>
            </div>
            <!-- /pricing -->
        <?php } ?>

    </div>
    <!-- Row -->

</div>
<!-- /Container -->

</div>
<!-- /Pricing -->