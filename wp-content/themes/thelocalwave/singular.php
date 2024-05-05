<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Your_Theme_Name
 */

get_header();
?>

<main id="site-content" role="main">

    <?php the_content();
    ?>

</main><!-- #site-content -->

<?php get_footer(); ?>