<?php
/**
 * Template Name: Contact Page
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
        <section class="container contact">
            <h1><?php the_title(); ?></h1>
            <div class="contact__content">
                <p>
J.L.K. sprl
Avenue Général de Longueville 8,
1150 Bruxelles
tel: 00 322 772 89 10
e-mail: info.jlk@gmail.com
                </p>
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