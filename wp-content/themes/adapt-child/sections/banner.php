<?php 
$sectionID = 'home-banner-'. get_row_index();
?>

<section class="home-banner" id="<?= $sectionID; ?>">
    <div class="container text-center">
        <div class="home-banner-wrapper">
            <h1 class="banner-title text-light fw-medium lh-1">
                <?= get_field('heading'); ?>
            </h1>
            <?php if( get_field('description') ) : ?>
            <div class="banner-description text-light fs-4 fw-medium lh-1 mt-4 pt-2">
                <?= get_field('description'); ?>
            </div>
            <?php endif; ?>

            <?php if( get_field('primary_button') || get_field('secondary_button') ) : ?>
            <div class="d-flex justify-content-center gap-2 mt-5 pt-2">
                <?php if( get_field('primary_button') ) : ?>
                <a href="<?= get_field('primary_button')['url']; ?>" class="btn btn-primary"><?= get_field('primary_button')['title']; ?></a>
                <?php endif; ?>

                <?php if( get_field('secondary_button') ) : ?>
                <a href="<?= get_field('secondary_button')['url']; ?>" class="btn btn-outline-primary"><?= get_field('secondary_button')['title']; ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<style>
#<?= $sectionID; ?>{
    background-color: var(--adapt-secondary-black);
    padding-top: var(--adapt-section-space);
    padding-bottom: var(--adapt-section-space);
}
#<?= $sectionID; ?> .banner-title{
    font-size: 88px;
}
#<?= $sectionID; ?> .home-banner-wrapper{
    max-width: 826px;
    margin: auto;
}
</style>