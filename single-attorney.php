<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */

get_header();
?>
<main id="content">
    <div class="bio-header">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6">
                    <h6>attorneys</h6>
                    <h1>Joseph Suntum</h1>
                    <ul class="email-vcard">
                        <li><a href=""><img src="" alt=""> EMAIL</a></li>
                        <li><a href=""><img src="" alt=""> vCard</a></li>
                    </ul>
                    <div class="affiliate"></div>

                </div>
                <div class="cell large-6"></div>
            </div>
        </div>
    </div>
    <section class="bio-content">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-4">
                    <div class="bio-menu">
                        <ul>
                            <li><a href="">Overview</a></li>
                            <li><a href="">Practice Areas</a></li>
                            <li><a href="">Bar Admissions</a></li>
                            <li><a href="">Professional Affiliations</a></li>
                            <li><a href="">Education</a></li>
                            <li><a href="">Honors and Awards</a></li>
                            <li><a href="">Appellate Decisions</a></li>
                            <li><a href="">Publications</a></li>
                            <li><a href="">Representative Cases</a></li>
                            <li><a href="">Case Studies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="cell large-8">
                    <?php
                        while ( have_posts() ) : the_post();
                            the_title();
                            the_content();
                        endwhile; // End of the loop.
                    ?>  
                    
                    <h3>Overview</h3>

                    <q>“It is my job to make sure a public project is properly authorized, its design is modified to mitigate impact on my client’s property as much as possible, and insure that my client receives full and fair compensation for both the property being taken by the government and any diminution in value caused to any portion of the property not being taken. I am committed to doing my job in every case and for every client.”</q>

                    <p>Joseph P. Suntum is principal in the firm and the firm’s Eminent Domain/Condemnation Group Leader. His decades of trial experience and his in-depth knowledge of real property valuation and the law of eminent domain allow him to protect his clients’ property rights and maximize their compensation when their properties are targeted for condemnation. Mr. Suntum is the Owners’ Counsel of America member attorney for the State of Maryland and Chair of the Owners Counsel Board of Directors. The Owners’ Counsel of America (OCA) is a national network of experienced condemnation attorneys who represent property owners against federal, state and local governments. Membership in the Owners’ Counsel is selective and restricted to one member attorney per state.</p>
                    <p>Mr. Suntum is a rare trial lawyer who has successfully tried both murder cases and multi-million dollar civil actions. He has also successfully argued numerous appeals before the Maryland courts of appeal. Mr. Suntum joined the firm in 1988, and has been a principal in the firm since 1994. He served as Managing Partner of the firm from 1997 to 2008. Before joining Miller, Miller & Canby, he served as a law clerk to the Honorable Elsbeth Levy Bothe in Circuit Court for Baltimore City, and served as an Assistant Public Defender for Montgomery County for four years, where he first earned his reputation as an outstanding trial advocate.</p>
                    <p>Quality legal representation requires the trial advocate not only to apply exceptional analytical and trial advocacy skills to the case, but also be able to coordinate the many resources of the client, witnesses and expert consultants into a cohesive and ultimately persuasive team. Mr. Suntum works closely with his clients to identify and fully understand their goals. He uses all available tools in pursuit of a successful result for his clients as efficiently and economically as the case permits, including use of the latest in courtroom technology to most persuasively present his clients' cases.</p>
                    <p>The trial of condemnation actions requires full knowledge of the substantive issues concerning land valuation, as well as the unique procedural rules applicable to such matters. Mr. Suntum's knowledge in this area permits him to work effectively with experts such as appraisers, land planners, brokers, developers, and others to maximize the compensation paid to his clients for property taken by governmental agencies.</p>
                    <p>In addition to eminent domain cases, Mr. Suntum accepts select commercial litigation matters requiring advanced strategic and trial skills.</p>

                    <div class="testi-s1">
                        <div class="testi-slider">
                            <div class="testi-item">
                                <h4>Mr. First Name Last Name</h4>
                                <div class="rates"><img src="assets/img/icn-star-ratings.svg" alt=""></div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                            <div class="testi-item">
                                <h4>Mr. First Name Last Name</h4>
                                <div class="rates"><img src="assets/img/icn-star-ratings.svg" alt=""></div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>

                        <div class="testi-buttons">
                            <a class="btn-link" href="#">Read More Reviews <i class="icn-arrow-r red"></i></a>
                            <a class="btn-link" href="#"><i class="icn-write red"></i>Write Us A Review</a>
                        </div>
                    </div>
                    <script>
                        $(function(){
                            $('.testi-s1 .testi-slider').slick({
                                dots: false
                            });
                        });
                    </script>

                    <hr>

                    <h3>Practice Areas</h3>
                    <ul>
                        <li><a href="">Appeals</a></li>
                        <li><a href="">Business & Commercial Litigation</a></li>
                        <li><a href="">Eminent Domain and Condemnation Law</a></li>
                        <li><a href="">Real Estate Litigation</a></li>
                    </ul>

                    <hr>

                    <h3>Bar Admissions</h3>
                    <ul>
                        <li><a href="">Maryland</a></li>
                        <li><a href="">U.S. District Court, District of Maryland (1983)</a></li>
                    </ul>
                    
                    


                </div> 
            </div>        
                   
        </div>
    </section>
</main>

<?php

get_footer();

