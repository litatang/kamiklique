<?php get_header(); ?>
<section class="page-wrap"> 

    <div class="container">

    <h1><?php the_title(); ?> </h1>

        <?php if(has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('blog-large');?>" alt="<?php the_title();?>" class="img-fluid mb-3 img-thumbnail"/>
        <?php endif; ?>

        <div class="col-lg-6">
            <?php get_template_part('includes/section', 'careers'); ?>
            <?php wp_link_pages();?>
        </div>        
        
    </div>
</section>

<?php get_footer(); ?>