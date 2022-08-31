<section class="bikmocategorizedblock <?php echo (get_field('bikmo_categorized1_block_border_top') == 'true' ? 'bikmocategorizedblock--border-top' : ''); ?>">
    <div class="wrapper">

        <div class="bikmocategorizedblock-header">
            <div class="bikmocategorizedblock-header__icon">
                <div class="bikmocategorizedblock-header__icon-bg-dark"></div>
                <div class="bikmocategorizedblock-header__icon-bg-green"></div>
                <?php echo App\wp_image(get_field('bikmo_categorized1_block_icon'), 'full', false, []); ?>
            </div>
            <h2 class="bikmocategorizedblock-header__title block_title section_title"><?php the_field('bikmo_categorized1_block_title'); ?></h2>
            <div class="bikmocategorizedblock-header__subtitle block-text-regular"><?php the_field('bikmo_categorized1_block_subtitle'); ?></div>
        </div>

        <div class="bikmocategorizedblock-body">
            <?php if (have_rows('bikmo_categorized1_block_items')) : ?>
                <?php while (have_rows('bikmo_categorized1_block_items')) : ?>
                    <?php the_row(); ?>

                    <div class="bikmocategorizedblock-item bikmogridcard">
                        <div class="bikmocategorizedblock-item__icon bikmogridcard__icon">
                            <?php echo App\wp_image(get_sub_field('icon'), 'full', false, []); ?>
                        </div>

                        <h4 class="bikmocategorizedblock-item__title bikmogridcard__title">
                            <?php the_sub_field('title'); ?>
                        </h4>

                        <div class="bikmocategorizedblock-item__text bikmogridcard__text">
                            <?php the_sub_field('text'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>