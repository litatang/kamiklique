<?php 
/* 
Template Name: Contact Us
*/
?>

<?php get_header(); ?>

<div class="container-fluid contactus-container m-0 p-0">
    <div class="row contactrow">
        <div class=
            "col-contactform 
            col-xxl-6 order-xxl-1
            col-xl-6 order-xl-1
            col-lg-6 order-lg-1
            col-md-6  order-md-1
            col-sm-12 order-sm-2
            col-xs-12 order-xs-2"
        >
            <div class="contactform-container">
                <?php echo do_shortcode('[wpforms id="212" title="false"]');?> 
            </div>
            
        </div>

        <div class=
            "contactus-info-container 
            col-xxl-5 order-xxl-2
            col-xl-5 order-xl-2
            col-lg-5 order-lg-2
            col-md-6 order-md-2
            col-sm-12 order-sm-1
            col-xs-12 order-xs-1
            order-first"
        >
            <div class="contactus-info">
                <img class=" img-fluid contact-team-photo"  src="<?php echo get_template_directory_uri() . '/images/contactus.png'?>" />
            
                <div class="contactus-info-desc">
                    <h3 class="text-gradient-blue mt-4 contactus-info-content"> We would love to have coffee <span class="nowrap">with you</span></h3>
                    <p class="mt-3" >  We really like to discuss, expand our <span class="nowrap">horizon and network.</span>  </p>
                    <p class="contactus-info-content"> We would love to get to know you more, and you get to know us more as well, <span class="nowrap"> we will be happy.</span></p>
                    <br> 
                    
                    <a class="work-with-us-link" href="mailto:hello@klique.id">
                        <p style="display: inline;">hello@klique.id </p>
                    </a>
                    <br>

                    <a class="work-with-us-link" href="mailto:vonny@klique.id">
                        <p style="display: inline;">vonny@klique.id</p>
                    </a>
                        
                    <br> 
                </div>
                </p>
            </div>
        </div>
    </div>
    
</div>
<?php get_footer(); ?>