<?php $no_of_cards = count(get_field('bikmo_iconsgrid_block_items')); ?>

<section class="bikmoiconsgridblock">
    <div class="wrapper">

        <div class="bikmoiconsgridblock-header">
            <h2 class="bikmoiconsgridblock-header__title block_title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_iconsgrid_block_title')); ?>
            </h2>
        </div>

        <div class="bikmoiconsgridblock-body">
            <?php if ( have_rows('bikmo_iconsgrid_block_items') ): ?>
                <?php while ( have_rows('bikmo_iconsgrid_block_items') ): ?> 
                    <?php the_row(); ?>

                    <div class="bikmoiconsgridblock-item bikmogridcard">
                        <div class="bikmoiconsgridblock-item__icon bikmogridcard__icon">
                            <?php echo App\wp_image(get_sub_field('icon'), 'full', false, []); ?>
                        </div>

                        <h4 class="bikmoiconsgridblock-item__title bikmogridcard__title">
                            <?php the_sub_field('title'); ?>
                        </h4>

                        <div class="bikmoiconsgridblock-item__text bikmogridcard__text">
                            <?php the_sub_field('text'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ($no_of_cards > 0 && $no_of_cards % 3 != 0): ?>
                <?php for ($i = 0; $i < 3 - ($no_of_cards % 3); $i++) : ?>
                    <div class="bikmoiconsgridblock-item bikmogridcard"></div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

    </div>
</section>