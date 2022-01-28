<?php get_header(); ?>
<section class="">
    <div class="container-fluid m-0 p-0 mb-5">
        <div id="carouselFeatured" class="carousel slide" data-bs-ride="carousel">
                <?php 
                    $original_query = $wp_query;
                    $wp_query = null;
                    $args = array('posts_per_page' => 3, 'tag' => 'featured');
                    $wp_query = new WP_Query($args);                    
                ?>

                <div class="featured-desktop">
                    <div class="carousel-indicators">
                        <?php if (have_posts()) : $postCount = -1;
                            while (have_posts()) : $postCount++; the_post();?>                            
                                    <?php if($postCount == 0) { ?>
                                        <button data-bs-target="#carouselFeatured" data-bs-slide-to="<?php echo $postCount ?>" class="active" aria-current="true" aria-label="Slide <?php echo $postCount?>"></button>
                                    <?php } else { ?>
                                        <button data-bs-target="#carouselFeatured" data-bs-slide-to="<?php echo $postCount ?>"  aria-label="Slide <?php echo $postCount?>"></button>
                                    <?php } ?>
                        <?php endwhile; endif; ?>                        
                    </div>
                    <div class="carousel-inner">
                        <?php if (have_posts()) : $postCount = 0;
                        while (have_posts()) : $postCount++; the_post();?>                            

                        <?php if($postCount == 1) { ?>
                            <div class="carousel-item active">
                        <?php } else { ?>
                            <div class="carousel-item" >
                        <?php } ?>
                            <div class="carousel-image-slider">
                                <img  style="height: 90vh; object-fit: cover" src="<?php the_post_thumbnail_url();?>" class="d-block w-100" alt="...">
                            </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <h2 class="text-start mb-2">
                                                <a target="_blank" class="side-featured-post-list text-light" href="<?php the_permalink();?>"> 
                                                    <?php the_title() ?> 
                                                </a>
                                            </h2>
                                            <div class="text-start mt-1">
                                                <p class="text-light text-lato">
                                                    <?php echo get_the_author_meta('first_name'); ?> <?php echo get_the_author_meta('last_name'); ?> | <?php echo get_the_date('j F Y'); ?>
                                                </p>
                                            </div>
                                            
                                            <div class="blog-carousel-excerpt"><?php the_excerpt() ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                        
                        <?php
                            $wp_query = null;
                            $wp_query = $original_query;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>


                <div class="featured-mobile">
                    <?php 
                        $original_query = $wp_query;
                        $wp_query = null;
                        $args = array('posts_per_page' => 3, 'tag' => 'featured');
                        $wp_query = new WP_Query($args);                    
    
                        if (have_posts()) : $postCount = 0;
                        while (have_posts()) : $postCount++; the_post();?>     
                        <div class="featured-mobile-single">
                        
                            <img class="featured-mobile-image img-fluid" src="<?php the_post_thumbnail_url();?>" class="d-block w-100" alt="...">

                            <div class="featured-text-container">
                                <div class="featured-text-header">
                                    <a target="_blank" class="side-featured-post-list text-light" href="<?php the_permalink();?>"> 
                                        <h2> <?php the_title() ?>  </h2>
                                    </a>                                    
                                </div>
    
                                <div class="featured-text-excerpt">
                                    <?php the_excerpt() ?>

                                </div>
                            </div>
                        </div>

                    <?php endwhile; endif; ?>


                    <?php
                        $wp_query = null;
                        $wp_query = $original_query;
                        wp_reset_postdata();
                    ?>
                </div>
        </div>
    </div>

    <div class="container-fluid px-4 container-blog">        

        <?php if( is_paged() ):?>
            <?php
                $the_page = str_replace("page", "", (str_replace("/", "", check_paged())));
                $counter = 1;

                while($counter < $the_page ){
                    $query = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'paged' => $counter,
                    ));
                ?>
                <div class="row row-cols-1 row-cols-md-2 post-container-prev">
                    <?php if($query-> have_posts() ) : ?>
                        <?php while($query->have_posts()): $query->the_post(); ?>
                            <div class="page-limit blog-col-container post-mobile"  data-maxpage="<?php echo show_max_post();?>" data-page='/<?php echo check_paged($counter, true);?>' data-url="<?php echo admin_url('admin-ajax.php')?>" >
                                <?php get_template_part('includes/section', 'archive-mobile'); ?>            
                            </div>

                            <div class="col page-limit blog-col-container post-desktop"  data-maxpage="<?php echo show_max_post();?>" data-page='/<?php echo check_paged($counter, true);?>' data-url="<?php echo admin_url('admin-ajax.php')?>" >
                                <?php get_template_part('includes/section', 'archive'); ?>            
                            </div>
                        <?php endwhile; ?> 
                    <?php else: endif; ?>
                </div>
                
            <?php $counter = $counter + 1;} ?>                            
            
            <!-- <div class="container d-flex text-center text-align justify-content-center mb-5">
                <a class="gradient-button-blue btn-load-more btn-load" data-maxpage="<?php echo show_max_post();?>" data-prev="1" data-page="<?php echo check_paged(1);?>" data-url="<?php echo admin_url('admin-ajax.php')?>">
                    <span class="text"> Load Previous </span>
                    <span class="text-loading d-none"> Loading </span>
                </a>        
            </div> -->
        <?php endif;?>
                
        <div class="post-desktop">
            <div class="row row-cols-1 row-cols-md-2 post-container">
                <?php if( have_posts() ) : ?>
                    <?php while(have_posts()): the_post(); ?>
                        <div class="col page-limit blog-col-container"  data-maxpage="<?php echo show_max_post();?>" data-page='/<?php echo check_paged();?>' data-url="<?php echo admin_url('admin-ajax.php')?>" >
                            <?php get_template_part('includes/section', 'archive'); ?>            
                        </div>
                    <?php endwhile; ?> 
                <?php else: endif; ?>
            </div> 
            
                    
            <?php if(show_max_post() == 0):?>
                <div class="text-center no-post-blog-header">
                    <h1 class="text-gradient-blue"> Blog </h1>
                    <p class="mt-5"> Currently there are no post to show. Stay tuned for the updates!</p>
                </div>                            
            <?php elseif(show_max_post() == 1):?>
                <div class="container d-flex text-center text-align justify-content-center pb-5 blog-loadmore-container"></div> 
            <?php else:?>
                    <div class="container d-flex text-center text-align justify-content-center pb-5 blog-loadmore-container">                
                        <a class="gradient-button-blue btn-load-more btn-load" data-maxpage="<?php echo show_max_post();?>"  data-page="<?php echo check_paged(1);?>" data-url="<?php echo admin_url('admin-ajax.php')?>">
                            <span class="text"> Load More </span>
                            <span class="text-loading d-none"> Loading </span>
                        </a>
                    </div> 
                <?php endif;?>
        </div>

        <div class="post-mobile">
            <div class="row post-container post-container-mobile">
                <?php if( have_posts() ) : ?>
                    <?php while(have_posts()): the_post(); ?>
                        <div class="page-limit blog-col-container"  data-maxpage="<?php echo show_max_post();?>" data-page='/<?php echo check_paged();?>' data-url="<?php echo admin_url('admin-ajax.php')?>" >
                            <?php get_template_part('includes/section', 'archive-mobile'); ?>            
                        </div>        
                    <?php endwhile; ?> 
                <?php else: endif; ?>
            </div>
            
            <?php if(show_max_post() == 0):?>
                <div class="text-center no-post-blog-header">
                    <h1 class="text-gradient-blue"> Blog </h1>
                    <p class="mt-5"> Currently there are no post to show. Stay tuned for the updates!</p>
                </div>                            
            <?php elseif(show_max_post() == 1):?>
                    <div class="container d-flex text-center text-align justify-content-center pb-5 blog-loadmore-container"></div> 
            <?php else:?>
                <div class="container d-flex text-center text-align justify-content-center pb-5 blog-loadmore-container">                
                    <a class="gradient-button-blue btn-load-more btn-load" data-maxpage="<?php echo show_max_post();?>"  data-page="<?php echo check_paged(1);?>" data-url="<?php echo admin_url('admin-ajax.php')?>">
                        <span class="text"> Load More </span>
                        <span class="text-loading d-none"> Loading </span>
                    </a>
                </div> 
            <?php endif;?>
            
        </div>    
    </div>

   
</section>

<?php get_footer(); 