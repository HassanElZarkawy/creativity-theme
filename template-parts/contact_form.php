<!-- Contact -->
<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">
            
        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Phone</h3>
                    <p><?php echo $phone ?></p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p><?php echo $email ?></p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-map-marker"></i>
                    <h3>Address</h3>
                    <p><?php echo $address ?></p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact form -->
            <div class="col-md-8 col-md-offset-2">
                <form id="contact_form" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php') ?>" class="contact-form">
                    <input name="name" id="name" type="text" class="input" placeholder="Name" require>
                    <input name="email" id="email" type="email" class="input" placeholder="Email" require>
                    <input name="subject" id="subject" type="text" class="input" placeholder="Subject" require>
                    <textarea name="message" id="message" class="input" placeholder="Message" require></textarea>
                    <button class="main-btn">Send message</button>
                    <p style="display: none;" id="status">Email sent successfully</p>
                </form>
            </div>
            <!-- /contact form -->

        </div>
        <!-- /Row -->


    </div>
    <!-- /Container -->

</div>
<!-- /Contact -->

<script>
    $('#contact_form').on('submit', function(event){
        event.preventDefault();
        let form = $(this),
            name = form.find('#name').val(),
            email = form.find('#email').val(),
            subject = form.find('#subject').val(),
            message = form.find('#message').val(),
            status = form.find('#status'),
            ajaxUrl = form.data('url');
        
        if (name === '' || email === '' || subject === '' || message === '') {
            return;
        }

        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message,
                action: 'creativity_save_contact_form'
            },
            error: function (error) {
                status.innerHeight = 'Somthing went wrong and we couldn\'t complete this request.';
                $(status).css({'display' : 'block'});
            },
            success: function (data) {
                status.innerHeight = data.message;
                $(status).css({'display' : 'block'});
            }
        });

    });
</script>