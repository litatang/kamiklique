
<div class="accordion-item">
    <h1 class="accordion-header" id="heading-<?php echo get_the_ID(); ?>" >
        <button 
            type="button" 
            class="accordion-button collapsed" 
            data-bs-toggle="collapse" 
            data-bs-target="#collapse-<?php echo get_the_ID(); ?>"  
            aria-expanded="false" 
            aria-controls="flush-collapse-<?php echo get_the_ID(); ?>"
        >
            <h4 class="career-list-header"> <?php the_title(); ?> </h4>
            
            
        </button>
        
    </h1>
    <hr class="career-divider" />
    <div id="collapse-<?php echo get_the_ID(); ?>" class="accordion-collapse collapse" data-bs-parent="#myAccordion">        
        <div class="card-body ms-4 my-2">
        
            <?php the_content(); ?>
            <?php if(get_field('linkedin_url')):?>
                <a href="<?php the_field('linkedin_url'); ?>"  target="_blank" class="gradient-button-blue"> 
                    <span> APPLY NOW </span>
                </a>
            <?php endif; ?>
            
        </div>
    </div>
</div>
