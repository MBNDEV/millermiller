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
    
<?php while ( have_posts() ) : the_post(); ?> 
    <div class="bio-header">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-6 copy">
                    <h5>attorneys</h5>
                    <h1>Joseph Suntum</h1>
                    <ul class="email-vcard">
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a></li>
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a></li>
                    </ul>
                    <ul class="listed-in">
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/logo-preeminent.png" alt=""></a></li>
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/logo-best-lawyers.png" alt=""></a></li>
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/logo-super-lawyers.png" alt=""></a></li>
                    </ul>
                    <p>Joseph Suntum is an eminent domain trial attorney. He focuses his practice on representing owners of real property who are subject to having property condemned and taken by the government by eminent domain.</p>

                </div>
                <div class="cell large-6 align-self-bottom image">
                    <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-Joseph-Suntum-2.png" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
    <div class="bio-subhead show-for-large">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-8 sub-name">
                    <h5>attorneys</h5>
                    <img src="<?php bloginfo('template_url') ?>/assets/img/img-Joseph-Suntum-2.png" alt="">
                    <h2>Joseph Suntum</h2>
                </div>
                <div class="cell large-4 align-self-middle sub-ev">
                    <ul class="email-vcard">
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-email2.svg" alt=""> EMAIL</a></li>
                        <li><a href=""><img src="<?php bloginfo('template_url') ?>/assets/img/icn-vcard.svg" alt=""> vCard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="bio-content" id="bio">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-4">
                    <aside class="bio-side">
                        <div data-sticky-container>   
                            <div class="bio-menu sticky" data-sticky data-anchor="bio"  data-margin-top="5" data-sticky-on="large">
                                <ul data-magellan>
                                    <li><a href="#overview">Overview</a></li>
                                    <li><a href="#practice-areas">Practice Areas</a></li>
                                    <li><a href="#bar-admissions">Bar Admissions</a></li>
                                    <li><a href="#affiliations">Professional Affiliations</a></li>
                                    <li><a href="#education">Education</a></li>
                                    <li><a href="#awards">Honors and Awards</a></li>
                                    <li><a href="#appellate">Appellate Decisions</a></li>
                                    <li><a href="#publications">Publications</a></li>
                                    <li><a href="#representative">Representative Cases</a></li>
                                    <li><a href="#case-studies">Case Studies</a></li>
                                </ul>
                            </div>
                        </div> 
                    </aside>
                </div>
                <div class="cell large-8">
                    <article class="bio-copy">
                        
                        <div id="overview" class="bio-overview offtop" data-magellan-target="overview">
                            
                        <?php the_content(); ?>

                            <h2 class="hbg">Overview</h2>
                            <blockquote>
                                <p>
                                    It is my job to make sure a public project is properly authorized, its design is modified to mitigate impact on my client’s property as much as possible, and insure that my client receives full and fair compensation for both the property being taken by the government and any diminution in value caused to any portion of the property not being taken. I am committed to doing my job in every case and for every client.
                                </p>
                            </blockquote>
                            <p>Joseph P. Suntum is principal in the firm and the firm’s Eminent Domain/Condemnation Group Leader. His decades of trial experience and his in-depth knowledge of real property valuation and the law of eminent domain allow him to protect his clients’ property rights and maximize their compensation when their properties are targeted for condemnation. Mr. Suntum is the Owners’ Counsel of America member attorney for the State of Maryland and Chair of the Owners Counsel Board of Directors. The Owners’ Counsel of America (OCA) is a national network of experienced condemnation attorneys who represent property owners against federal, state and local governments. Membership in the Owners’ Counsel is selective and restricted to one member attorney per state.</p>
                            <p>Mr. Suntum is a rare trial lawyer who has successfully tried both murder cases and multi-million dollar civil actions. He has also successfully argued numerous appeals before the Maryland courts of appeal. Mr. Suntum joined the firm in 1988, and has been a principal in the firm since 1994. He served as Managing Partner of the firm from 1997 to 2008. Before joining Miller, Miller & Canby, he served as a law clerk to the Honorable Elsbeth Levy Bothe in Circuit Court for Baltimore City, and served as an Assistant Public Defender for Montgomery County for four years, where he first earned his reputation as an outstanding trial advocate.</p>
                            <p>Quality legal representation requires the trial advocate not only to apply exceptional analytical and trial advocacy skills to the case, but also be able to coordinate the many resources of the client, witnesses and expert consultants into a cohesive and ultimately persuasive team. Mr. Suntum works closely with his clients to identify and fully understand their goals. He uses all available tools in pursuit of a successful result for his clients as efficiently and economically as the case permits, including use of the latest in courtroom technology to most persuasively present his clients' cases.</p>
                            <p>The trial of condemnation actions requires full knowledge of the substantive issues concerning land valuation, as well as the unique procedural rules applicable to such matters. Mr. Suntum's knowledge in this area permits him to work effectively with experts such as appraisers, land planners, brokers, developers, and others to maximize the compensation paid to his clients for property taken by governmental agencies.</p>
                            <p>In addition to eminent domain cases, Mr. Suntum accepts select commercial litigation matters requiring advanced strategic and trial skills.</p>

                            <div class="bio-testimonials testi-s1 show-for-large">
                                <div class="testi-slider">
                                    <div class="testi-item">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        <h5>Mr. First Name Last Name</h5>
                                    </div>
                                    <div class="testi-item">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                        <h5>Mr. First Name Last Name</h5>
                                    </div>
                                </div>
                                <script>
                                    $(function(){
                                        $('.testi-s1 .testi-slider').slick({
                                            dots: false
                                        });
                                    });
                                </script>
                            </div>
                        </div>    
                        
                        <div id="practice-areas" class="bio-practice-areas offtop" data-magellan-target="practice-areas">
                            
                            <div class="text-center-medium">
                                <h2 class="hbg">Practice Areas</h2>
                            </div>
                            
                            <?php $practice_areas = get_field('af_practice_areas_practice_areas');
                            if( $practice_areas ): ?>
                            <ul>
                                <?php foreach( $practice_areas as $post ):  setup_postdata($post); ?>
                                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                <?php endforeach; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>

                        <hr>

                        <div id="bar-admissions" class="bio-bar-admissions offtop" data-magellan-target="bar-admissions">
                            <h2 class="hbg">Bar Admissions</h2>
                            <?php the_field('fa_bar_admissions'); ?>
                        </div> 

                        <hr>
                        
                        <div id="affiliations" class="bio-affiliations offtop" data-magellan-target="affiliations">  
                            <h2 class="hbg">Professional Affiliations</h2>
                            <ul>
                                <li>Bar Association of Montgomery County (Secretary, 1995-1996; Executive Committee, 1997-1999; Member, Federal Practice Section)</li>
                                <li>Maryland State Bar Association</li>
                                <li>American Bar Association (Member, Litigation Section)</li>
                                <li>Board of Directors of Montgomery General Hospital, 2003 - 2009</li>
                                <li>Board of Directors of the Montgomery County Bar Foundation, 2005 - 2009</li>
                            </ul>
                        </div> 

                        <hr>

                        <div id="education" class="bio-education offtop" data-magellan-target="education">
                            <h2 class="hbg">Education</h2>
                            <ul>
                                <li>University of Maryland, J.D., 1982</li>
                                <li>University of Maryland, B.A., 1979</li>
                                <li>University of Montana, 1975-1977</li>
                            </ul>
                        </div>

                        <hr>

                        <div id="awards" class="bio-awards offtop" data-magellan-target="awards">
                            <h2 class="hbg">Honors and Awards</h2>
                            <ul>
                                <li>Named by Super Lawyers magazine as top 5% of Litigation Attorneys in the state of Maryland</li>
                                <li>Member, Character Committee of The Court of Appeals of Maryland (1992-1997)</li>
                            </ul>
                        </div>

                        <hr>

                        <div id="appellate" class="bio-appellate offtop" data-magellan-target="appellate">
                        <h2 class="hbg">Appellate Decisions</h2>
                            <ul>
                                <li><a href="">Smith v. Edwards, 46 Md. App. 452 (1980)</a></li>
                                <li><a href="">Wallick v. Wallick, 25 Md. App. 706 (1975)</a></li>
                            </ul>
                        </div>

                        <hr>

                        <div id="publications" class="bio-publications offtop" data-magellan-target="publications">
                            <h2 class="hbg">Publications</h2>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum est ultricies integer quis. Iaculis urna id volutpat lacus</li>
                                <li>Ac odio tempor orci dapibus ultrices in.</li>
                            </ul>
                        </div>

                        <hr>

                        <div id="representative" class="bio-representative offtop" data-magellan-target="representative">
                            <h2 class="hbg">Representative Cases</h2>
                            <ul class="grid-x grid-margin-x rep-cases">
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-thumbnail.jpg" alt=""></figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3>Necessity to Take</h3>
                                        <p><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail. Although the State only required approximately 10’ along the road front of the client’s property, the acquisition would require the demolition of the grocery store. Consequently, the State chose to condemn and acquire the entire property, use the property for construction staging during construction, and then convey the remainder to the County in partial satisfaction of the State’s parkland mitigation obligation. </p>
                                    </div>
                                </li>
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-thumbnail.jpg" alt=""></figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3>Necessity to Take</h3>
                                        <p><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail. Although the State only required approximately 10’ along the road front of the client’s property, the acquisition would require the demolition of the grocery store. Consequently, the State chose to condemn and acquire the entire property, use the property for construction staging during construction, and then convey the remainder to the County in partial satisfaction of the State’s parkland mitigation obligation. </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="show-for-medium"><a href="" class="button primary round">more representative cases</a></div>
                        </div>

                        <hr>

                        <div id="case-studies" class="bio-case-studies offtop" data-magellan-target="case-studies">
                            <h2 class="hbg">Case Studies</h2>
                            <ul class="grid-x grid-margin-x rep-cases">
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-thumbnail.jpg" alt=""></figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3>Necessity to Take</h3>
                                        <p><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail. Although the State only required approximately 10’ along the road front of the client’s property, the acquisition would require the demolition of the grocery store. Consequently, the State chose to condemn and acquire the entire property, use the property for construction staging during construction, and then convey the remainder to the County in partial satisfaction of the State’s parkland mitigation obligation. </p>
                                    </div>
                                </li>
                                <li class="cell medium-6">
                                    <div class="bio-post">
                                        <figure><img src="<?php bloginfo('template_url') ?>/assets/img/img-thumbnail.jpg" alt=""></figure>
                                        <h6><a href="">Eminent Domain </a></h6>
                                        <h3>Necessity to Take</h3>
                                        <p><strong>Issue:</strong> Client owned 2-acre shopping center improved with a grocery store situated close to the roadway. The road needed to be widened to accommodate the construction of the State’s Purple Line Light Rail. Although the State only required approximately 10’ along the road front of the client’s property, the acquisition would require the demolition of the grocery store. Consequently, the State chose to condemn and acquire the entire property, use the property for construction staging during construction, and then convey the remainder to the County in partial satisfaction of the State’s parkland mitigation obligation. </p>
                                    </div>
                                </li>
                            </ul>
                            <div class="show-for-medium"><a href="" class="button primary round">more representative cases</a></div>
                        </div>
                   
                    </article>
                </div> 
            </div>        
                   
        </div>
    </section>
    <?php endwhile; ?>  
</main>

<?php

get_footer();

