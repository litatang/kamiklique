<div class="post-section card h-100 border-0 p-4">
    <?php if(has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url();?>" class="blog-featured-image card-img-top img-fluid">
    <?php endif; ?>
    <div class="card-body">
        <h3 class="card-title text-center mt-2"> 
            <a target="_blank" href="<?php the_permalink();?>" class="klique-subheader" >
                <?php the_title(); ?>
            </a>
        </h3>
        <div class="text-center mt-4">
            <?php the_excerpt(); ?>
        </div>                                    
    </div>
</div>