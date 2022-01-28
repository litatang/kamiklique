<?php get_header(); ?>
<section class=""> 

    <div class="container-fluid single-container m-0 p-0">

        <?php get_template_part('includes/section', 'blogcontent'); ?>

        <?php wp_link_pages();?>
    </div>

    <div class="ms-5 recent-header">
        <h2 class="recent-articles"> Recent </h2>
    </div>
    

    <div class="container-fluid single-container slick-recent-slider m-0 p-0">

        <?php 
            $original_query = $wp_query;
            $wp_query = null;
            $args = array('posts_per_page' => 6 );
            $wp_query = new WP_Query($args);
              
            if (have_posts()) :
                while (have_posts()) : the_post();
                    if(get_the_ID() != $curPost): ?>                                          

                        <div class="text-center slick-slide-test d-inline-block">
                            <?php if(has_post_thumbnail()) : ?>
                                <img 
                                    src="<?php the_post_thumbnail_url();?>" 
                                    alt="<?php the_title();?>" 
                                    class="img-fluid mb-3 recent-slider"
                                    
                                />
                            <?php endif; ?>

                            <h6 class="featured-slider-header  mt-4"> <?php the_title(); ?> </h6>

                            <div class="featured-slider-excerpt"> 
                                <p> <?php the_excerpt(); ?> </p>
                                
                            </div>
                        </div>
                    <?php endif;
                endwhile;
            endif;

            $wp_query = null;
            $wp_query = $original_query;
            wp_reset_postdata();
        ?>        
    </div>

    <div class="slick-slider-nav"></div>
    <div class="slick-slider-dots"></div>
</section>


<?php 
    $original_query = $wp_query;
    $wp_query = null;
    $args = array('posts_per_page' => 6 );
    $wp_query = new WP_Query($args);
?>  
<script>var posts = <?php echo json_encode($wp_query->found_posts); ?>; </script>
<?php
    $wp_query = null;
    $wp_query = $original_query;

    wp_reset_postdata();
?>   



<script> 


    var slidesToShow = posts;
        
    (function($){
            $(document).ready(function(){
                $('.slick-recent-slider').slick({
                    // appendArrows: $('.slick-slider-nav'),
                    appendDots: $('.slick-slider-dots'),
                    centerMode: true,
                    arrows: false,
                    centerPadding: '50px',
                    slidesToShow: slidesToShow > 4 ? 4 : slidesToShow,
                    responsive: [
                        {
                            breakpoint: 1400,
                            settings: {
                                slidesToShow: slidesToShow > 3 ? 3 : slidesToShow,
                                slidesToScroll: 2,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: slidesToShow > 2 ? 2 : slidesToShow,
                                slidesToScroll: 2,
                                infinite: true,
                                dots: false
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: slidesToShow > 1.2 ? 1.2 : slidesToShow,
                                slidesToScroll: 1,
                                dots: false
                            }
                            },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: slidesToShow > 1 ? 1 : slidesToShow,
                                slidesToScroll: 1,
                                dots: false
                            }
                        }
                    ]
                });
        });
    })(jQuery)
</script>




<?php get_footer(); ?>