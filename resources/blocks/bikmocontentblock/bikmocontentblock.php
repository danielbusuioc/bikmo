<section class="bikmocontentblock <?php echo (get_field('bikmo_content_block_image_position') == 'Image on the left' ? 'bikmocontentblock--image_left' : 'bikmocontentblock--image_right'); ?>">

    <div class="wrapper">
        <div class="bikmocontentblock__half bikmocontentblock_content">

            <?php if (get_field('bikmo_content_block_tag')) : ?>
                <div class="bikmocontentblock_content__tag block_tag"><?php the_field('bikmo_content_block_tag'); ?></div>
            <?php endif; ?>

            <h2 class="bikmocontentblock_content__title block_title"><?php the_field('bikmo_content_block_title'); ?></h2>
            <div class="bikmocontentblock_content__text block-text-regular"><?php the_field('bikmo_content_block_text'); ?></div>

            <?php if (have_rows('header_buttons')) : ?>
                <div class="block_cta_list bikmocontentblock_content__buttons">
                    <?php while (have_rows('header_buttons')) : ?>
                        <?php the_row(); ?>

                        <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/themes/bikmo/resources/blocks/partials/buttons.php'); ?>

                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="bikmocontentblock__half bikmocontentblock_image <?php the_field('bikmo_content_block_buttons_show_gr'); ?>">

            <?php if (get_field('bikmo_content_block_show_gr')) : ?>
                <div class="bikmocontentblock_image__green-bar"></div>
            <?php endif; ?>

            <?php if (get_field('bikmo_content_block_image')) : ?>
                <?php echo App\wp_image(get_field('bikmo_content_block_image'), 'full', false, ['class' => 'block_image']); ?>
            <?php endif; ?>
        </div>
    </div>

</section>