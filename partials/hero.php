<?php
$title_page = get_the_title();
if(is_front_page()) {
    $title_page = get_bloginfo('name');
}
?>

<section class="hero container">
    <div class="hero__desc">
        <h1 class="hero__title"><?php echo $title_page; ?></h1>
        <p><?php echo get_field('description'); ?></p>

        <?php if(is_front_page()) : ?>
            <ul class="hero__buttons">
                <li class="hero__button">
                    <a href="<?php echo get_link_by_slug('demande-de-devis', 'page'); ?>" class="button">Devis</a>
                </li>
                <li class="hero__button">
                    <a href="<?php echo get_post_type_archive_link('domaine_application') ?>" class="button button--outline">Domaines d'application</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
    <picture class="hero__img">
        <?php        
        echo srcset_source(get_field('image_desktop'), '100vw', '', $media='1024px', get_field('image_desktop')['title']);
        echo srcset_image(get_field('image_mobile'), '100vw', '', get_field('image_mobile')['title']);
        ?>
    </picture>
</section>