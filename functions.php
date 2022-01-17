<?php 


    // Load Stylesheet
    function load_css(){
        wp_register_style('kamiklique-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-bootstrap');

        wp_register_style('kamiklique-slick', get_template_directory_uri() . '/css/slick/slick.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-slick');

        wp_register_style('kamiklique-slicktheme', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-slicktheme');

        wp_register_style('kamiklique-main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-main'); 

        wp_register_style('kamiklique-about', get_template_directory_uri() . '/css/about.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-about'); 

        wp_register_style('kamiklique-service', get_template_directory_uri() . '/css/service.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-service'); 

        wp_register_style('kamiklique-clients', get_template_directory_uri() . '/css/clients.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-clients'); 

        wp_register_style('kamiklique-career', get_template_directory_uri() . '/css/career.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-career'); 

        wp_register_style('kamiklique-blog', get_template_directory_uri() . '/css/blog.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-blog'); 

        wp_register_style('kamiklique-contact', get_template_directory_uri() . '/css/contact.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-contact'); 

        wp_register_style('kamiklique-footer', get_template_directory_uri() . '/css/footer.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-footer'); 

        wp_register_style('kamiklique-home', get_template_directory_uri() . '/css/home.css', array(), false, 'all');
        wp_enqueue_style('kamiklique-home'); 
        
        wp_register_style('klique-font', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Quattrocento:wght@400;700&display=swap', array(), false, 'all');
        wp_enqueue_style('klique-font');

        wp_register_style('klique-faicon', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), false, 'all');
        wp_enqueue_style('klique-faicon');


        
    }

    add_action('wp_enqueue_scripts', 'load_css');

    
   // Load Javascript
   function load_js(){
    wp_enqueue_script('jquery');        
    wp_register_script('kamiklique-bootstrap', get_template_directory_uri(). '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('kamiklique-bootstrap');    

    wp_register_script('kamiklique-slick', get_template_directory_uri(). '/js/slick.js', 'jquery', false, true);
    wp_enqueue_script('kamiklique-slick');

    wp_register_script('kamiklique-js', get_template_directory_uri(). '/js/main.js', 'jquery', false, '5.8.4');
    wp_enqueue_script('kamiklique-js');

    wp_register_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js', array(), false, true);
    wp_enqueue_script('gsap-js');

    wp_register_script('gsap-scroll-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js', array(), false, true);
    wp_enqueue_script('gsap-scroll-js');


    // wp_register_script('gsap-custom-js', get_template_directory_uri(). '/js/custom.gsap.js', array(), false, true);
    // wp_enqueue_script('gsap-custom-js');

    // wp_register_script('lottie-js', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array(), false, true);
    // wp_enqueue_script('lottie-js');
    
    
    }

    add_action('wp_enqueue_scripts', 'load_js');
  
 


    // Theme Option
    add_theme_support('menus');
    add_theme_support('post-thumbnails');


    add_theme_support( 'featured-content', array(
        'filter'     => 'mytheme_get_featured_posts',
        'max_posts'  => 20,
        'post_types' => array( 'post', 'page' ),
    ) );



    // Menus
    register_nav_menus([
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    ]);


    // Custom Image Sizes
    add_image_size('blog-large', 900, 400, false);
    add_image_size('blog-small', 300, 300, false);

    function my_first_post_type() {
        $args = [
            'labels' => [
                'name' => 'Careers',
                'singular_name' => 'Career',                
            ],
            'hierarchical' => true,
            'public' => true,
            'has_archive' => true, 
            'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
            'menu_icon' => 'dashicons-buddicons-buddypress-logo'
            // 'rewrite' => ['slug' => 'my-cars'],

        ];

        register_post_type('careers', $args);
    }

    add_action('init', 'my_first_post_type');

    // function my_first_taxonomy(){
    //     $args = [
    //         'labels' => [
    //             'name' => 'Brands',
    //             'singular_name' => 'Brand',
    //         ],
    //         'public' => true,
    //         'hierarchical' => true,
    //     ];

    //     register_taxonomy( 'brands', ['careers'], $args);
    // }

    // add_action('init', 'my_first_taxonomy');


    function set_posts_per_page_for_careers( $query ) {
        if ( !is_admin() && $query -> is_main_query() && is_post_type_archive( 'careers' ) ) {
          $query -> set( 'posts_per_page', '10' );
        }
      }
      add_action( 'pre_get_posts', 'set_posts_per_page_for_careers' );


    add_action('wp_ajax_enquiry', 'enquiry_form');
    add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
    function enquiry_form(){
        $formdata = [];

        wp_parse_str($_POST['enquiry'], $formdata);
        
        $admin_email = get_option( 'admin_email');
        $headers[]  = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: My Website <' . $admin_email. '>';
        $headers[] = 'Reply-to' . $formdata['email'];
        // $headers[] = 'BCC:' .  $formdata['email'];

        $send_to = $admin_email;

        $subject = 'Enquiry from ' . $formdata['fname'] . ' ' . $formdata['lname'];

        $message = '';
        foreach($formdata as $index => $field) {
            $message .= '<strong>' . $index . '</strong>: ' . $field . '<br></br>';
        }

        try{
            if(wp_mail( $send_to, $subject, $message, $headers)){
                wp_send_json_success('Email Sent');
            } else {
                wp_send_json_error('Error');            
            }
        } catch (Exception $e){
            wp_send_json_error($e -> getMessage());
        }
        

        wp_send_json_success($formdata['fname']);
    }


    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );


    add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
    /**
     * Use namespaced data attribute for Bootstrap's dropdown toggles.
     *
     * @param array    $atts HTML attributes applied to the item's `<a>` element.
     * @param WP_Post  $item The current menu item.
     * @param stdClass $args An object of wp_nav_menu() arguments.
     * @return array
     */
    function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
        if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
            if ( array_key_exists( 'data-toggle', $atts ) ) {
                unset( $atts['data-toggle'] );
                $atts['data-bs-toggle'] = 'dropdown';
            }
        }
        return $atts;
    }

    
   
    function wpdocs_excerpt_more( $more ) {
        return '...';
    }
    add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

    /**
     * Filter the except length to 20 words.
     *
     * @param int $length Excerpt length.
     * @return int (Maybe) modified excerpt length.
     */
    function wpdocs_custom_excerpt_length( $length ) {
        return 30;
    }
    add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

    //estimated reading time
    function reading_time() {
        $content = get_post_field( 'post_content', $post->ID );
        $word_count = str_word_count( strip_tags( $content ) );
        $readingtime = ceil($word_count / 300);
        if ($readingtime == 1) {
            $timer = " min";
        } else {
            $timer = " mins";
        }

        $totalreadingtime = $readingtime . $timer;
        
        return $totalreadingtime;
    }
    

    add_action( 'wp_ajax_nopriv_btn_load_more', 'btn_load_more' );
    add_action( 'wp_ajax_btn_load_more', 'btn_load_more' );

    function btn_load_more(){
        $paged = $_POST["page"]+1;
        $prev = $_POST["prev"];
        $maxpage = $_POST["maxpage"];     
        $innerwidth =   $_POST["innerwidth"];

        if($prev == 1 &&  $_POST["page"] != 1){
            $paged = $_POST["page"]-1;
        }
        

        $query = new WP_Query(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => $paged
        ));

        if($query -> have_posts()):
            
            while($query -> have_posts()) : $query -> the_post();
                
                if($innerwidth > 576):
                    echo '<div class="col page-limit" data-maxpage="' . $maxpage . '" data-page="/page/' . $paged . '/">';
                    get_template_part('includes/section', 'archive');
                    echo '</div>';
                else:
                    echo '<div class="page-limit" data-maxpage="' . $maxpage . '" data-page="/page/' . $paged . '/">';
                    get_template_part('includes/section', 'archive-mobile');
                    echo '</div>';
                endif;

                
            endwhile;
            
        else:
            echo 0;
        endif;

        wp_reset_postdata();

        die();
    }

    
    function check_paged($num = null, $autoLoadPrev = false){
        if($autoLoadPrev){
            $output = '';
            if( is_paged() ){
                $output = 'page/' . get_query_var('paged') . '/';
            }
    
            if($num == 1){
                if(get_query_var('paged') > 0){
                    return '';    
                }
                $paged = (get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
                return $paged;
            } else if($num > 1){
                return 'page/' . $num . '/';
            } else {
                return $output;
            }
        } else {
            $output = '';
            if( is_paged() ){
                $output = 'page/' . get_query_var('paged') . '/';
            }
    
            if($num == 1){
                $paged = (get_query_var('paged') == 0 ? 1 : get_query_var('paged'));
                return $paged;
            } else {
                return $output;
            }
        }
    }




    function show_max_post() {
        global $wp_query;
        return ($wp_query-> max_num_pages);
    }


    /**
     * If last post in query, return TRUE.
     */
    function is_last_post($wp_query) {        
        return $wp_query->get( 'paged' ) == show_max_post();  
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
    
        echo "<script>console.log('Debug: " . $output . "' );</script>";
    }
    

    //Add category automatically

    add_action( 'wp_insert_post', 'update_post_terms' );
 
    function update_post_terms( $post_id ) {
        if ( $parent = wp_is_post_revision( $post_id ) )
            $post_id = $parent;
        $post = get_post( $post_id );
        if ( $post->post_type != 'post' )
            return;
    
        // add a tag
        // wp_set_post_terms( $post_id, 'new tag', 'post_tag', true );
    
        // add a category
        $categories = wp_get_post_categories( $post_id );
        $newcat    = get_term_by( 'name', 'Blog', 'category' );
    
        array_push( $categories, $newcat->term_id );
        wp_set_post_categories( $post_id, $categories );
    }
 

    add_theme_support( 'title-tag' );


?>