<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dex
 */

get_header();
?>

<header class="header">
    <div class="container">
        <div class="top_line">
            <?php the_custom_logo(); ?>
            <!-- <img src="<?php bloginfo("template_directory"); ?>/img/logo.svg" alt="logo"> -->
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Key indicators</a></li>
                <li><a href="#">Process</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
            <button class="hamburger hamburger--collapse d-xl-none d-lg-none" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
            <div class="top_line__right_side">
                <div class="top_line__right_side__phone">
                    <img src="<?php bloginfo("template_directory"); ?>/img/phohe.svg" alt="phone-icon">
                    <a href="tel: +38 (044) 000-00-00">+38 (044) 000-00-00</a>
                </div>
                <div class="btn btn-mini btn-transparent">
                    <button>Leave a request</button>
                </div>
            </div>
        </div>

        <div class="header__content">
            <div class="left_sign">CONSULTING AGENCY</div>
            <div class="left_sign left_sign__img" style="top: 75%">
                <img src="<?php bloginfo("template_directory"); ?>/img/mouse.svg" alt="mouse-icon">
            </div>
            <div class="left_sign" style="top: 90%">TWIST DOWN</div>
            <div class="main__grid header__content__grid">
                <div class="header__content__left_side">
                    <div class="header__content__left_side__overtitle">
                        <?php the_field('overtitle'); ?>
                    </div>
                    <div class="header__content__left_side__title">
                        <?php the_title(); ?>
                    </div>
                    <div class="header__content__left_side__description">
                        <?php the_field('undertitle'); ?>
                    </div>
                    <div class="btn btn_header">
                        <button>Create</button>
                    </div>
                </div>
                <div class="header__content__right__side">
                    <?php the_field("calculator"); ?>
                </div>
            </div>
        </div>
    </div>

</header>

<section class="about">
    <div class="container">
        <div class="circle_number">1</div>
        <div class="main__grid">
            <div class="about__left">
                <div class="about__title">
                    <?php the_field('left_title'); ?>
                </div>
                <div class="about__description">
                    <?php the_field('left_description'); ?>
                </div>
                <div class="about__img">
                    <img src="<?php the_field('about_image'); ?>" alt="img">
                </div>
            </div>
            <div class="about__right">
                <div>
                    <div class="about__right__title">
                        <div>
                            <?php the_field('right_title'); ?>
                            <span>Help you</span>
                        </div>
                        <div class="about__description about__description__sm d-xl-none d-lg-none">
                            <?php the_field('right_undertitle'); ?>
                        </div>

                        <img src="<?php bloginfo("template_directory"); ?>/img/about-img-2.jpg" alt="image" />

                    </div>
                    <div class="about__description about__description__lg d-none d-xl-block d-lg-block">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Enim sed porttitor in et
                        scelerisque
                        blandit tincidunt in.
                    </div>

                </div>

                <div class="about__bottom_block">
                    <div class="about__bottom_block__content">
                        <ul class="about__bottom_block__content__left">
                            <?php $letters = explode(",", get_field('letters')); ?>
                            <li><?php echo $letters[0]; ?></li>
                            <li><?php echo $letters[1]; ?></li>
                            <li><?php echo $letters[2]; ?></li>
                        </ul>
                        <ul class="about__bottom_block__content__right">
                            <li>
                                Consultation
                                <span>Customer satisfaction guarantee</span>
                            </li>
                            <li>
                                Consultation
                                <span>Customer satisfaction guarantee</span>
                            </li>
                            <li>
                                Consultation
                                <span>Customer satisfaction guarantee</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="keys">
    <div class="container">
        <div class="col-12">
            <div class="keys__title">
                <?php the_field('key_title'); ?>
            </div>
            <div class="key__description">
                <?php the_field('key_undertitle'); ?>
            </div>
        </div>
        <div class="main__grid">
            <?php 
                        $args = array( 'post_type' => 'key_indicators', 'posts_per_page' => 6 );
                        $the_query = new WP_Query( $args );
                        
                    ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="circle__item">
                <div class="circle__wrap">
                    <div class="circle">
                        <?php the_field('key_indicator_number'); ?>
                    </div>
                </div>
                <div class="circle__title">
                    <?php the_title(); ?>
                </div>
                <div class="circle__description">
                    <?php the_field('key_indicator_description'); ?>
                </div>
            </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="steps">
    <div class="container">
        <div class="circle_number circle_number__dark">03</div>
        <div class="step__titles">
            <div class="steps__title">
                <?php the_field('steps_left_title'); ?>
            </div>
            <div class="steps__right_title">
                <?php the_field('steps_right_title'); ?>
            </div>
        </div>
        <div class="main__grid">
            <?php 
                $args = array( 'post_type' => 'steps', 'posts_per_page' => 6 );
                $the_query = new WP_Query( $args );
                $i = 1;
                        
            ?>
            <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="step_item_wrap">
                <div class="step__item">
                    <div class="step__item__number">
                        0<?php echo $i; ?>
                        <div>step</div>
                    </div>
                    <div class="step_title">
                        <?php the_title(); ?>
                    </div>
                    <div class="step_description">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php $i++; endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <div class="circle_number">4</div>
        <div class="main__grid">
            <div class="testi__title__wrap">
                <div class="testi__title">
                    What we are <br />
                    proud of:
                    <span>
                        Feedback from those who have <br />
                        already collaborated with us
                    </span>
                </div>
            </div>
            <div class="testi__right_side">

                <div class="testi__slick">
                    <?php
                        $content = file_get_contents("https://jsonplaceholder.typicode.com/posts/1/comments");

                        $result  = json_decode($content);

                        for ($i = 0; $i < count($result); $i ++) { ?>

                    <div class="testi_item">
                        <div class="testi_item__top">
                            <div class="testi_item__avatar"></div>
                            <div class="testi_item__name">
                                <?php echo $result[$i] -> email; ?>
                            </div>

                        </div>
                        <div class="testi_item__right__side">
                            <div class="testi_item__quote">
                                <img src="<?php bloginfo("template_directory"); ?>/img/quote.svg" alt="#" />
                            </div>
                            <div class="testi_item__text">
                                <?php echo $result[$i] -> body; ?>
                            </div>

                        </div>
                    </div>

                    <?php }; ?>

                </div>
                <div class="testi__controls">
                    <div class="testi__arrows" data-uri="<?php bloginfo("template_directory"); ?>"></div>
                    <div class="testi__arrows__dots"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact">
    <div class="main__grid">
        <div class="step__titles">
            <div class="steps__title">
                RESOLUTE IS <br />
                <span>
                    ALWAYS GET <br />
                    MORE
                </span>
            </div>
            <div class="steps__right_title">
                Leave the application and get <br />
                <span>10% discount</span> when ordering <br />
                business plan
            </div>
        </div>
        <div>
            <form action="#">
                <input type="text" placeholder="Your name*" data-plc="Your name*" required>
                <input type="email" placeholder="Your email*" data-plc="Your email*" required>
                <input type="phone" class="phone_input" placeholder="+380 000 000 000" data-plc="+380 000 000 000"
                    required>
                <div class="btn">
                    <button>Order Quickly</button>
                </div>
                <div class="form__notif">
                    <img src="<?php bloginfo("template_directory"); ?>/img/lock.svg" alt="#">
                    Your data is safe, and will not <br />
                    be transferred to third parties
                </div>
            </form>
        </div>
    </div>
</section>



<?php

get_footer();