<?php if (get_field('bikmo_bgimage_block_has_bg') == 'Yes'): ?>
<section class="bikmobgimageblock bikmobgimageblock--<?php echo get_field('bikmo_bgimage_block_orientation'); ?> bikmobgimageblock--with-img"  
    data-img1="<?php echo get_field('bikmo_bgimage_block_desktop_image'); ?>" 
    data-img2="<?php echo get_field('bikmo_bgimage_block_tablet_image'); ?>" 
    data-img3="<?php echo get_field('bikmo_bgimage_block_mobile_image'); ?>"
    style="background-image: url(<?php echo get_field('bikmo_bgimage_block_desktop_image'); ?>)">
<?php else: ?>
<section class="bikmobgimageblock bikmobgimageblock--<?php echo get_field('bikmo_bgimage_block_orientation'); ?> bikmobgimageblock--no-img">
<?php endif; ?>

    <div class="wrapper">

        <div class="bikmobgimageblock__card bikmobgimageblock-card">
            <h2 class="bikmobgimageblock-card__title block_title"><?php the_field('bikmo_bgimage_block_title'); ?></h2>
            <div class="bikmobgimageblock-card__text block-text-regular"><?php the_field('bikmo_bgimage_block_text'); ?></div>

            <?php if ( have_rows('header_buttons') ): ?>
                <div class="block_cta_list bikmobgimageblock-card__buttons">
                <?php while ( have_rows('header_buttons') ): ?> 
                    <?php the_row(); ?>

                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/themes/bikmo/resources/blocks/partials/buttons.php'); ?>
                
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>