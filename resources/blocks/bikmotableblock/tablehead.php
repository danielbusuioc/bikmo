<div class="bikmotableblock-cards-head">
    <h2 class="bikmotableblock-cards-head__title block_title">
        <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_table_block_title')); ?>
    </h2>

    <?php if ($features_type == $features_type_two) : ?>
        <div class="bikmotableblock-cards-head__table_head">
            <div class="bikmotableblock-feature__name">
                <?php echo 'none'; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="bikmotableblocks-head__features bikmotableblock-features" data-maxnum="<?php echo $max_vizible_features; ?>">
        <?php if (have_rows('bikmo_table_block_features')) : ?>
            <?php while (have_rows('bikmo_table_block_features')) : ?>
                <?php the_row(); ?>

                <div class="bikmotableblock-features__item bikmotableblock-feature">
                    <div class="bikmotableblock-feature__name">
                        <?php the_sub_field('name'); ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php //if (): ?>
        <div class="bikmotableblock-card__load_more <?php echo ($max_vizible_features >= count(get_field('bikmo_table_block_features')) ? 'hidden-from-view' : '') ?>" data-more="<?php echo $load_more_text; ?>" data-less="<?php echo $load_less_text; ?>">
            <?php echo $load_more_text; ?>
        </div>
    <?php //endif; ?>
</div>