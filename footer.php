<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dex
 */

?>
<footer>
    <div class="container">
        <div class="top_line">
            <img src="<?php bloginfo("template_directory"); ?>/img/logo-dark.svg" alt="logo">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Key indicators</a></li>
                <li><a href="#">Process</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>

            <div class="top_line__right_side">
                <div class="top_line__right_side__phone">
                    <img src="<?php bloginfo("template_directory"); ?>/img/phohe.svg" alt="phone-icon">
                    <a href="tel: +38 (044) 000-00-00">+38 (044) 000-00-00</a>
                </div>
                <div class="btn btn-mini">
                    <button>Call back</button>
                </div>
            </div>
        </div>
    </div>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

</body>

</html>