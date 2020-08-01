<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
 
    <footer id="footer" class="foot-s1">
        <div class="grid-container">    
 
            <div class="grid-x grid-margin-x">
                <div class="cell large-3">
                    <div class="foot-logo"><img src="<?php bloginfo('template_url') ?>/assets/img/logo3.png" alt=""></div>
                </div>
                <div class="cell large-4">
                    <ul class="foot-info">
                        <li class="loc">
                            <i class="icn-location light"></i> 
                            <a href="#" target="_blank">200-B Monroe Street, Rockville, MD 20850 </a>
                        </li>
                        <li class="ph">
                            <i class="icn-phone light"></i> 
                            <a href="tel:480 648 0017">301-762-5212</a>
                        </li>
                    </ul>
                    
                    <div class="foot-social">
                        <a class="foot-pay" href="#"><img src="<?php bloginfo('template_url') ?>/assets/img/logo-payonline.png" alt=""></a>
                        <span>CONNECT WITH US:</span>
                        <a href="https://www.linkedin.com/company/2743058?trk=prof-exp-company-name" target="_blank">
                            <img src="<?php bloginfo('template_url') ?>/assets/img/icn-instagram.svg" alt="">                        
                        </a>
                    </div>  
                </div>
                <div class="cell medium-6 large-3">
                    <div class="foot-panav">
                        <h5><a href="<?php the_permalink(9); ?>">PRACTICE AREAS</a></h5>
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'service-menu',
                                'menu'       => '',
                                'container'  => '',
                                'items_wrap' => '<ul>%3$s</ul>' 
                            ));
                        ?>
                    </div>
                </div>
                <div class="cell medium-6 large-2">
                    <div class="foot-menu">
                    <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'footer-menu',
                                'menu'       => '',
                                'container'  => '',
                                'items_wrap' => '<ul>%3$s</ul>' 
                            ));
                        ?>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <span class="copyright-text">
                    &copy; All rights reserved — <?php echo date('Y'); ?> &copy; Miller, Miller & Canby.  
                    <ul>
                        <li><a href="<?php the_permalink(104); ?>">Confidentiality</a></li>
                        <li><a href="<?php the_permalink(106); ?>">Privacy Policy</a></li>
                    </ul>
                </span>
                <span class="designby">
                    <a href="https://www.mybizniche.com/phoenix-web-design/" target="_blank">Website Design</a> by: My Biz Niche
                </span>
            </div>  
        </div>
    </footer>
</div>
<?php wp_footer(); ?>

</body>
</html>

