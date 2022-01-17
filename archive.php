<?php get_header(); ?>
<section class="page-wrap"> 

    <div class="container">

        <!-- <h1> <?php echo single_cat_title();?> </h1> -->

        <?php get_template_part('includes/section', 'archive'); ?>
        <?php previous_posts_link();?>
        <?php next_posts_link();?>


        <!-- <?php 
        global $wp_query;
        $big = 9999999;

        echo paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link( $big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query -> max_num_pages
        ]);
        ?> -->

    </div>
</section>

<?php get_footer(); ?>