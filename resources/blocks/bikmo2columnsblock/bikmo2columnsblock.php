<section class="bikmo2columnsblock">
    <div class="wrapper">

        <?php if (have_rows('bikmo_2columns_block_columns')) : ?>
            <?php while (have_rows('bikmo_2columns_block_columns')) : ?>
                <?php the_row(); ?>
                <div class="bikmo2columnsblock__column">

                    <div class="bikmo2columnsblock_image">
                        <?php if (get_sub_field('show_green_line')) : ?>
                            <div class="bikmo2columnsblock_image__green-bar"></div>
                        <?php endif; ?>

                        <?php if (get_sub_field('image')) : ?>
                            <?php echo App\wp_image(get_sub_field('image'), 'full', false, ['class' => 'block_image']); ?>
                        <?php endif; ?>
                    </div>

                    <div class="bikmo2columnsblock_content">

                        <?php if (get_sub_field('tag')) : ?>
                            <div class="bikmo2columnsblock_content__tag block_tag"><?php the_sub_field('tag'); ?></div>
                        <?php endif; ?>

                        <h2 class="bikmo2columnsblock_content__title block_title"><?php the_sub_field('title'); ?></h2>
                        <div class="bikmo2columnsblock_content__text block-text-regular"><?php the_sub_field('description'); ?></div>

                        <?php if (have_rows('header_buttons')) : ?>
                            <div class="block_cta_list bikmo2columnsblock_content__buttons">
                                <?php while (have_rows('header_buttons')) : ?>
                                    <?php the_row(); ?>
                                    
                                    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/themes/bikmo/resources/blocks/partials/buttons.php'); ?>
                                    
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>
</section>