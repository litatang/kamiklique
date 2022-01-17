<?php if( have_posts() ) : while(have_posts()): the_post(); ?>
    <?php 
        $fname = get_the_author_meta('first_name');
        $lname = get_the_author_meta('last_name');
        $curPost = get_the_ID();
    ?>
    
    <div class="container-fluid m-0 p-0 article-container">
            
        <div class="row no-gutters">
            <div class="col-12">
                <div class="article-section">
                    <h2><?php the_title(); ?> </h2>
                </div>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="article-section">

                    <p class="article-meta">
                        Posted by <?php echo get_the_author_meta('first_name')?> <?php echo get_the_author_meta('last_name') ?>
                        | <?php echo get_the_date('j F Y '); echo get_the_time('G:i');?>
                        | <?php echo reading_time(); ?> reads
                        
                    </p>
                    <p class="article-second-title"><?php echo get_secondary_title(); ?></p>
                    <?php if(has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>" class="img-fluid mb-3 article-featured-image"/>
                    <?php endif; ?>

                    <div class="article-content">
                        <?php the_content(); ?>

                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-3 offset-1 side-article-container">

                <div class="feature-section">

                    <h4 class="featured-title"> Featured</h4>
                    <hr class="featured-divider"/>

                    <?php 
                        $original_query = $wp_query;
                        $wp_query = null;
                        $args = array('posts_per_page' => 3, 'tag' => 'featured');
                        $wp_query = new WP_Query($args);
                        
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                if(get_the_ID() != $curPost):
                                    echo '<li class="side-featured-post">'; ?>
                                    <h5> 
                                        <a  href="<?php the_permalink();?>" class="side-featured-post-list"> <?php the_title()?> </a>
                                    </h5>
                                        
                                    <?php echo '</li>';
                                endif;
                            endwhile;
                        endif;
                        
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                    ?>
                </div>

            </div>
        </div>

</div>
    
<?php endwhile; else: endif; ?>