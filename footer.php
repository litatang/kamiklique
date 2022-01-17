<?php wp_footer();?>


<div class="footer-section">
    <div class="footer-container">
        <div class="footer-content">
            <div class="footer-address">
                <img class="footer-logo img-fluid mb-4" src="<?php echo get_template_directory_uri() . '/images/footer-logo.png'?>" />
                <p class="text-light text-lato footer-lineheight"> PT. Kami Klique  <span class="lineheightwrap"> Indonesia </span></p>
                <p class="text-light text-lato footer-lineheight"> Jl. Iskandar Muda  <span class="lineheightwrap"> No.8 </span> </p>
                <p class="text-light text-lato footer-lineheight"> Kota Tangerang,  <span class="lineheightwrap"> Banten 15129 </span> </p>
                <br>
                                
                <p class="text-light text-lato footer-lineheight">                
                    <a class="footer-contact text-light" href="https://www.instagram.com/kliqueindonesia/"> 
                        @kliqueindonesia
                    </a> </span>
                </p>

                <p class="text-light text-lato footer-lineheight">    
                    <a class="footer-contact text-light" href="https://www.instagram.com/thepeopleinsight/"> 
                        @thepeopleinsight
                    </a>
                </p>
                
                <br>
                <p class="text-light text-lato footer-lineheight">    
                    <a class="footer-contact text-light" href="mailto:hello@klique.id"> 
                        hello@klique.id
                    </a>
                </p>

                <p class="footer-number text-light text-lato footer-lineheight">    
                    +62 812 9100 1866  
                </p>
                </div>

            <!-- <div class="flex-break"></div> -->

            <div class="footer-menu">
                <nav class="navbar navbar-expand-md navbar-light klique-footer-menu" role="navigation">
                    <div class="container menu-container">                        
                    
                        <?php
                            wp_nav_menu( array(
                                'theme_location'    => 'footer-menu',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'navbar footer-menu-nav footer-text',
                                'container_id'      => 'bs-navbar-collapse-2',
                                'menu_class'        => 'nav navbar-nav-footer',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            ) );
                            ?>
                        </div>
                    </nav>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <p class="text-light text-lato footer-text"> 
            © 2022 PT. Kami Klique Indonesia. All rights reserved.
        </p>
    </div>                
</div>

</body>
</html>