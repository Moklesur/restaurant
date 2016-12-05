<?php

/********************************************************
 * Header
 ********************************************************/
/**
 * Header My Account
 */
function header_account(){
    if (get_theme_mod('top_header_account_enable', '1')) {
        $login_register = get_permalink(get_theme_mod('header_login_register'));
        $header_myaccount = get_permalink(get_theme_mod('header_myaccount'));
        ?><li class="dropdown"><a data-toggle="dropdown" href="#" aria-expanded="true"><i class="fa fa-user"></i></a><ul class="dropdown-menu list-unstyled user-dropdown"><?php
        if (is_user_logged_in()) {
            echo '<li><a href="' . $header_myaccount . '">' . get_theme_mod('top_header_account', 'Account') . '</a></li><li><a href="' . wp_logout_url() . '">Logout</a></li>';
        } else {
            echo '<li><a href="' . $login_register . '">Login</a></li><li><a href="' . $login_register . '">Register</a></li>';
        }
        ?></li></ul><?php
    }
}
add_action( 'themetim_header_account', 'header_account' );
/********************************************************
 * Footer
 ********************************************************/
/**
 * Footer Newsletter
 */
function footer_newsletter(){
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12 newsletter">
        <h4>Newsletter</h4>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <form class="position-relative text-uppercase" action="<?php (get_theme_mod('top_footer_newsletter_url', 'https://www.yourmailchimpurl.com')) ?>" method="post" target="_blank">
            <input type="email" class="form-control" name="newsletter-email" id="newsletter-email" placeholder="info@yoursite.com" required="">
            <button type="submit" class="btn btn-primary"><i class="fa fa-long-arrow-right"></i></button>
        </form>
    </div>
    <?php
}
add_action( 'themetim_footer_newsletter', 'footer_newsletter' );

/**
 * Middle Footer Description
 */
function middle_footer_description(){
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <h4><?php echo get_theme_mod('footer_about_us','About Us'); ?></h4>
        <p class="margin-top-20"><?php echo get_theme_mod('middle_footer_text','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.'); ?></p>
    </div>
    <?php
}
add_action( 'themetim_middle_footer_description', 'middle_footer_description' );

/**
 * Middle Footer Nav 1
 */
function middle_footer_nav_1(){
    ?>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <h4><?php echo get_theme_mod('middle_footer_nav_heading_1','The Service'); ?></h4>
        <?php
        if ( has_nav_menu( 'footer-1' ) ) :
            wp_nav_menu( array( 'theme_location' => 'footer-1', 'menu_class' => 'list-unstyled text-capitalize', 'menu_id' => 'primary-menu','container' => '' ) );
        else: echo '<p class="text-capitalize">Please select <a href="/wp-admin/nav-menus.php" class="text-muted">Footer Nav 1</a> </p>';
        endif;
        ?>
    </div>
    <?php
}
add_action( 'themetim_middle_footer_nav_1', 'middle_footer_nav_1' );

/**
 * Middle Footer Nav 2
 */
function middle_footer_nav_2(){
    ?>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <h4><?php echo get_theme_mod('middle_footer_nav_heading_2','Information'); ?></h4>
        <?php
        if ( has_nav_menu( 'footer-2' ) ) :
            wp_nav_menu( array( 'theme_location' => 'footer-2', 'menu_class' => 'list-unstyled text-capitalize', 'menu_id' => 'primary-menu','container' => '' ) );
        else: echo '<p class="text-capitalize">Please select <a href="/wp-admin/nav-menus.php" class="text-muted">Footer Nav 2</a> </p>';
        endif;
        ?>
    </div>
    <?php
}
add_action( 'themetim_middle_footer_nav_2', 'middle_footer_nav_2' );


/**
 * Middle Footer Nav 3
 */
function middle_footer_nav_3(){
    ?>
    <div class="col-md-4 col-sm-6 col-xs-12 margin-top-30">
        <div class="footer-contact-info">
            <span><i class="fa fa-map-marker"></i></span>
            <h4>Location</h4>
            <p><?php echo get_theme_mod('middle_footer_nav_heading_3','Mirum est notare quam littera gothica'); ?></p>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 margin-top-30">
        <div class="footer-contact-info">
            <span><i class="fa fa-phone"></i></span>
            <h4>Phone</h4>
            <p><?php echo get_theme_mod('middle_footer_phone','+(88) 000 000'); ?></p>
        </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12 margin-top-30">
        <div class="footer-contact-info">
            <span><i class="fa fa-envelope"></i></span>
            <h4>Email</h4>
            <p><?php echo get_theme_mod('middle_footer_email','info@info.com'); ?></p>
        </div>
    </div>
    <?php
}
add_action( 'themetim_middle_footer_nav_3', 'middle_footer_nav_3' );

/**
 * Bottom Footer Copyright
 */
function bottom_footer_copyright(){
    ?>
    <div class="col-md-6 col-sm-6 col-xs-12 site-info">
        <p class="margin-null"><?php echo get_theme_mod('bottom_footer_copyright','© ThemeTim. All Rights Reserved.'); ?></p>
    </div>
    <?php
}
add_action( 'themetim_bottom_footer_copyright', 'bottom_footer_copyright' );

/**
 * Bottom Footer Nav
 */
function bottom_footer_nav(){
    ?>
    <div class="col-md-6 col-sm-6 col-xs-12 text-right payment">
        <ul class="list-inline margin-null">
            <li><i class="fa fa-cc-visa fa-2x"></i></li>
            <li><i class="fa fa-cc-mastercard fa-2x"></i></li>
            <li><i class="fa fa-cc-discover fa-2x"></i></li>
            <li><i class="fa fa-cc-paypal fa-2x"></i></li>
        </ul>
    </div>
    <?php
}
add_action( 'themetim_bottom_footer_nav', 'bottom_footer_nav' );


/**
 * Social Sharing
 */
function themetim_social_sharing(){
    ?>
    <ul class="list-inline">
        <li class="margin-top-10"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li class="margin-top-10"><a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li class="margin-top-10"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        <li class="margin-top-10"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
        <li class="margin-top-10"><a href="https://pinterest.com/pin/create/button/?url=&media=&description=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
    </ul>
    <?php
}