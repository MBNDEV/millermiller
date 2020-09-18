<?php
/**
	Template Name: Contact Us Template
 */

get_header();
?>

<main id="content" class="contact-page">
    <div class="wp-block-group sec-banner">
        <div class="wp-block-group__inner-container">
            <h1 class="hbg"><?php the_title(); ?></h1>
            <h5>Start working with a law firm that <span>values clients and delivers results.</span></h5>
        </div>
    </div>
    
    <div class="page-content sec-firm-s1">
        <div class="grid-container">
            <div class="grid-x grid-margin-x cols2-s4">
                <div class="cell medium-6">

                    <p>Please fill in the following form to contact us:</p>

                    <div class="form-control">

                        <?= do_shortcode( '[contact-form-7 id="1301" title="Contact Us Form"]' ); ?>


                    </div>
                    
                </div>
                <div class="cell medium-6 overlap-image">

                    <div class="wp-block-image size-full col-image">
                        <a href="https://goo.gl/maps/HE55AEui3iRUqSdL9" target="_blank">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/map.jpg" alt="200-B Monroe Street, Rockville, MD 20850" title="200-B Monroe Street, Rockville, MD 20850">
                        </a>
                    </div>

                    <div class="grid-x footer-contact-info">
                        <div class="cell small-12 medium-6">
                            <div class="margin-bottom-2">
                                <a href="/">
                                    <img src="<?= get_template_directory_uri(); ?>/assets/img/contact-us-footer-logo.jpg" title="millermiller-canby" alt="millermiller-canby">
                                </a>
                            </div>

                            <div class="control-footer-contact margin-bottom-2">
                                <p>CONNECT WITH US: <a href="https://www.linkedin.com/company/miller-miller-&-canby?trk=prof-exp-company-name" target="_blank"><img src="<?= get_template_directory_uri(); ?>/assets/img/icon-linked-in.png" alt="linkedin" title="linkedin"></a></p>
                            </div>
                            <div class="control-footer-contact margin-bottom-2">
                                <p>MAKE A PAYMENT: <a href="https://secure.lawpay.com/pages/millermillercanby/operating" target="_blank"><img src="<?= get_template_directory_uri(); ?>/assets/img/lawpay.jpg" alt="law pay" title="law pay"></a></p>
                            </div>
                        </div>
                        <div class="cell small-12 medium-6">
                            <ul class="footer-lists">
                                <li>
                                    <span><img src="<?= get_template_directory_uri(); ?>/assets/img/icn-location.svg" alt="location" title="location"></span>
                                    <span>
                                        <a href="https://goo.gl/maps/Dbvxrd4KgecodzgPA" target="_blank">200-B Monroe Street, <br>Rockville, MD 20850</a>
                                    </span>
                                </li>
                                <li>
                                    <span><img src="<?= get_template_directory_uri(); ?>/assets/img/icn-phone.svg" alt="location" title="location"></span>
                                    <span><a href="tel:3017625212">301-762-5212</a></span>
                                </li>
                                <li>
                                    <span><img src="<?= get_template_directory_uri(); ?>/assets/img/icn-fax.svg" alt="location" title="location"></span>
                                    <span><a href="tel:3017626044">301-762-6044</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>


<footer id="footer" class="foot-s2">
    <div class="grid-container">
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

<?php

wp_footer();