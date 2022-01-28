<?php get_header(); ?>
<section class=""> 
    <div class="container-fluid career-container m-0 p-0">
        <div class="header-container">
            <div class="career-hero">            
                <div class="text-center">
                    <h1 class="text-gradient-blue mb-3"> Careers</h1>
                    <p class="career-text p-md"> 

                        <?php if( have_posts() ) : ?>
                            We're actively hiring!                     
                            Please find the most suited job for you and apply. <br>We are looking forward to speak and get to know you better!
                        <?php else: ?>
                            There are no vacancies available right now.
                        <?php endif;?>

                    </p>
                </div>                                             
            </div>  

            <?php if( have_posts() ) : ?>
            <div class="mouse-scroll">
                <div class="mouse">
                    <div class="wheel"></div>
                </div>
                <div>
                    <span class="scroll-arrows unu"></span>                            
                </div>
            </div>
            <?php endif;?>
        </div>
              
        <div class="container career-accordion-container">
            <div class="career-list">
                <div class="accordion accordion-flush" id="myAccordion">
                    <?php if( have_posts() ) : ?>
                        <?php while(have_posts()): the_post(); ?>
                                <?php get_template_part('includes/section', 'archivecareer'); ?>
                        <?php endwhile; ?> 
                    <?php else: endif; ?>
                </div>  
            </div>  
        </div>  
    </div>



</section>

<?php get_footer(); ?>

<script> 
// (function($){

//     var divPosition = $('.career-list').offset();

//     $('.mouse-scroll').on('click', function(e) {
//         e.preventDefault();
//         $('html, body').animate({scrollTop: divPosition.top - 85}, "slow");
//     });
//     })(jQuery)

</script>