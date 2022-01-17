<div class="row my-3">
    <div class="col-5">
        <?php if(has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url();?>" class="img-fluid" >
        <?php endif; ?>
    </div>
    <div class="col-7">
        <h5 class="text-start"> 
            <a target="_blank" href="<?php the_permalink();?>" class="klique-subheader" >
                <?php the_title(); ?>
            </a>
        </h5>
    
        <div class="text-start ">
            <p class="p-sm"> <?php echo get_the_date('j F Y'); ?> </p>
            
        </div> 
    </div>
</div>