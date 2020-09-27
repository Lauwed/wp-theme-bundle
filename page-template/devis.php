<?php
/**
 * Template Name: Devis Page
 */
?>

<?php
get_header();
?>

<main id="content" class="neve-main" role="main">
    <?php 
    if(have_posts()) :
        while(have_posts()) : the_post();
    ?>
        <section class="container devis">
            <h1><?php the_title(); ?></h1>
            <section class="avantages container">
                <?php 
                    get_template_part( 'partials/avantages' );
                ?>
            </section>
            <div class="devis__content">
                <?php the_content(); ?>
            </div>
        </section>
    <?php        
        endwhile;
    endif;
    ?>
</main>

<?php
get_footer();
?>