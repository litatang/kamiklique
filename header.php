<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Klique is a Human Resources Consultant that focuses on the growth of Indonesian Businesses especially startups and SMEs">
    <!-- <title> </title> -->

    <?php wp_head(); ?>
</head>
<body>


<nav class="navbar sticky-top navbar-expand-md navbar-light klique-primary-menu" role="navigation">
  <div class="container-fluid m-0 p-0 menu-container">
    <a class="navbar-brand ms-3" href="https://theblobstudio.com/klique/">
        <img class="img-fluid navbar-logo ms-1" src="<?php echo get_template_directory_uri() . '/images/logo-klique.png'?>"/>        
    </a>

    <button class="navbar-toggler custom-toggler"  onclick="lockScroll();" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'klique' ); ?>">
        <div class="animated-icon menu-icon-white"><span></span><span></span><span></span><span></span></div>
    </button>    
    
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'top-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse primary-menu-nav',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </div>
</nav>

<script>
    document.querySelector('.custom-toggler').addEventListener('click', function () {
        document.querySelector('.animated-icon').classList.toggle('open');
    });

    function lockScroll() {
        document.body.classList.toggle('lock-scroll');
    }


    (function($){
        
    })(jQuery)
    

</script>