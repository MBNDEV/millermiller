<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>> 
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 

<div id="wrapper">
    <header id="header" data-sticky-container data-toggler=".show-menu">
        <div class="hsnav-s6 sticky" data-sticky data-options="marginTop:0">
            <div class="navbar">
                <a class="navlogo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.png" alt="">
                </a>
                <span class="navicon hide-for-large" data-toggle="header">mobile menu</span>

                <div class="navutil show-for-large">
                    <ul>
                        <li class="show-for-xlarge"><a href="tel:301-762-5212"><i class="icn-phone"></i> 301-762-5212</a></li>
                        <li class="nav-cta"><a href="<?php the_permalink(24); ?>">contact us</a></li>
                    </ul>
                </div>

                <nav class="navmenu show-for-large">
                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'main-menu',
                            'menu'       => '',
                            'container'  => '',
                            'items_wrap' => '<ul class="menu align-center dropdown" data-dropdown-menu>%3$s</ul>' 
                        ));
                    ?>
                </nav>
                <nav class="mobmenu hide-for-large">
                    <div class="moblogo">
                        <a href="<?php echo get_home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo3.png" alt=""></a>
                    </div>

                    <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'main-menu',
                            'menu'       => '',
                            'container'  => '',
                            'items_wrap' => '<ul class="menu accordion-menu" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">%3$s</ul>' 
                        ));
                    ?>
                </nav>
                
            </div>
        </div>            
    </header>

    <?php if(is_front_page()) { ?>

    <section id="hero" class="sec-hero hero-s2">
        <figure><img src="<?php bloginfo('template_url'); ?>/assets/img/hero.jpg" alt=""></figure>
        <div class="hero-caption middle">
            <div class="grid-container"> 
                <div class="grid-x grid-margin-x">
                    <div class="cell large-8 large-offset-2 align-self-middle">
                        <h6><img src="<?php bloginfo('template_url'); ?>/assets/img/logo2.png" alt=""></h6>
                        <h1>Client <strong>Focused. <br>Results</strong> Driven.</h1>
                        <p>Skilled attorneys. 70 years of success. Deep community roots. These are the foundations that have earned <strong>Miller, Miller & Canby</strong> its reputation as one of the most trusted law firms in Montgomery County.</p>
                        <a href="<?php the_permalink(24); ?>" class="button secondary large round">contact us </a>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn-scroll" href="#content" data-smooth-scroll>
            <i class="icn-arrow light down"></i> scroll next
        </a>
    </section>

    <?php } ?>


    


