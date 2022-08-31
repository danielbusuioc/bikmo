<section class="bikmo3columnextrablock <?php echo \App\columns_extra_styles(get_field('bikmo_3columnextra_block_style')) ?>">
    <div class="wrapper">

        <div class="bikmo3columnextrablock-header block_header">
            <h2 class="bikmo3columnextrablock-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_3columnextra_block_title')); ?>
            </h2>
            <div class="bikmo3columnextrablock-header__subtitle block_header__subtitle block-text-regular"><?php the_field('bikmo_3columnextra_block_subtitle'); ?></div>
        </div>

        <div class="bikmo3columnextrablock-body bikmo3columnextrablock-body--mobile">
            <?php if ( have_rows('bikmo_3columnextra_block_items') ): ?>
                <?php while ( have_rows('bikmo_3columnextra_block_items') ): ?> 
                    <?php the_row(); ?>

                        <div class="bikmo3columnextrablock-item">

                            <div class="bikmo3columnextrablock-item__head">
                                <div class="bikmo3columnextrablock-item__bignumber">
                                    <?php the_sub_field('background_number'); ?>
                                </div>
                                <div class="bikmo3columnextrablock-item__label">
                                    <?php the_sub_field('label'); ?>
                                </div>
                            </div>

                            <div class="bikmo3columnextrablock-item__body">
                                <div class="bikmo3columnextrablock-item__title">
                                    <?php the_sub_field('title'); ?>
                                </div>
                                <div class="bikmo3columnextrablock-item__text">
                                    <?php the_sub_field('text'); ?>
                                </div>
                            </div>

                        </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="bikmo3columnextrablock-body">
            <?php if ( have_rows('bikmo_3columnextra_block_items') ): ?>
                <?php while ( have_rows('bikmo_3columnextra_block_items') ): ?> 
                    <?php the_row(); ?>

                        <div class="bikmo3columnextrablock-item">
                            <div class="bikmo3columnextrablock-item__head">
                                <div class="bikmo3columnextrablock-item__bignumber">
                                    <?php the_sub_field('background_number'); ?>
                                </div>
                                <div class="bikmo3columnextrablock-item__label">
                                    <?php the_sub_field('label'); ?>
                                </div>
                            </div>

                            <div class="bikmo3columnextrablock-item__body">
                                <div class="bikmo3columnextrablock-item__title">
                                    <?php the_sub_field('title'); ?>
                                </div>
                                <div class="bikmo3columnextrablock-item__text">
                                    <?php the_sub_field('text'); ?>
                                </div>
                            </div>
                        </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>