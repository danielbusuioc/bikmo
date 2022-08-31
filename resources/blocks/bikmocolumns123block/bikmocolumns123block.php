<section class="bikmocolumns123block <?php echo \App\columns123_styles(get_field('bikmo_columns123_block_style')) ?>">
    <div class="wrapper">

        <div class="bikmocolumns123block-header block_header">
            <h2 class="bikmocolumns123block-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_columns123_block_title')); ?>
            </h2>
            <div class="bikmocolumns123block-header__subtitle block_header__subtitle block-text-regular"><?php the_field('bikmo_columns123_block_subtitle'); ?></div>
        </div>

        <div class="bikmocolumns123block-body bikmocolumns123block-body--mobile">
            <?php if ( have_rows('bikmo_columns123_block_items') ): ?>
                <?php while ( have_rows('bikmo_columns123_block_items') ): ?> 
                    <?php the_row(); ?>

                        <div class="bikmocolumns123block-item">
                            <div class="bikmocolumns123block-item__head">
                                <div class="bikmocolumns123block-item__bignumber">
                                    <?php the_sub_field('background_number'); ?>
                                </div>
                                <div class="bikmocolumns123block-item__title">
                                    <?php the_sub_field('title'); ?>
                                </div>
                            </div>
                            <div class="bikmocolumns123block-item__body">
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="bikmocolumns123block-body">
            <?php if ( have_rows('bikmo_columns123_block_items') ): ?>
                <?php while ( have_rows('bikmo_columns123_block_items') ): ?> 
                    <?php the_row(); ?>

                        <div class="bikmocolumns123block-item">
                            <div class="bikmocolumns123block-item__head">
                                <div class="bikmocolumns123block-item__bignumber">
                                    <?php the_sub_field('background_number'); ?>
                                </div>
                                <div class="bikmocolumns123block-item__title">
                                    <?php the_sub_field('title'); ?>
                                </div>
                            </div>
                            <div class="bikmocolumns123block-item__body">
                                <?php the_sub_field('text'); ?>
                            </div>
                        </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>