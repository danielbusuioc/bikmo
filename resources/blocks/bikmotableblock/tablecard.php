<?php

$value_format_one = 'True/False';
$value_format_two = 'Price';
$value_format_three = 'Text';
?>

<div class="bikmotableblock-card bikmotableblock-card--<?php echo $col; ?>  <?php echo (2 == $col ? 'bikmotableblock-card--active' : ''); ?>">

    <div class="bikmotableblock-card__title">
        <h3 class="bikmotableblock-card__name">
            <?php the_field('bikmo_table_block_card_' . $col .'_title') ?>
        </h3>

        <?php if (get_field('bikmo_table_block_card_' . $col .'_icon')): ?>
        <div class="bikmotableblock-card__icon">
            <?php echo App\wp_image(get_field('bikmo_table_block_card_' . $col .'_icon'), 'full', false, []); ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="bikmotableblock-card__text">
        <?php the_field('bikmo_table_block_card_' . $col .'_text') ?>
    </div>

    <?php if ($features_type == $features_type_two): ?>
        <div class="bikmotableblock-card__table_head">
            <div class="bikmotableblock-feature__name">
                <?php echo $features_name; ?>
            </div>

            <div class="bikmotableblock-feature__values">
                <div class="bikmotableblock-feature__value bikmotableblock-feature__value--first">
                    <?php echo $value_one_name; ?>
                </div>
                <div class="bikmotableblock-feature__value bikmotableblock-feature__value--second">
                    <?php echo $value_two_name; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="bikmotableblock-card__features bikmotableblock-features" data-maxnum="<?php echo $max_vizible_features; ?>">
        <?php if (have_rows('bikmo_table_block_features')): ?>
            <?php $table_row = 1; ?>
            <?php while ( have_rows('bikmo_table_block_features') ): ?>
                <?php the_row(); ?>

                <div class="bikmotableblock-features__item bikmotableblock-feature row_<?php echo $table_row++; ?> <?php echo ($features_type == $features_type_two ? 'bikmotableblock-feature--display_type_2' : ''); ?>">
                    <div class="bikmotableblock-feature__name">
                        <?php the_sub_field('name'); ?>
                    </div>

                    <div class="bikmotableblock-feature__values">

                        <div class="bikmotableblock-feature__value bikmotableblock-feature__value--first">
                            <?php if (get_sub_field('value_format') == $value_format_one): ?>
                                <?php echo App\bikmo_display_field_boolean(get_sub_field('column_' . $col . '_value_1')); ?>

                            <?php elseif (get_sub_field('value_format') == $value_format_two): ?>
                                <?php echo App\bikmo_display_field_price(get_sub_field('column_' . $col . '_value_1')); ?>

                            <?php else: ?>
                                <?php the_sub_field('column_' . $col . '_value_1'); ?>
                            <?php endif; ?>
                        </div>

                        <?php if ($features_type == $features_type_two): ?>
                            <div class="bikmotableblock-feature__value bikmotableblock-feature__value--second">
                                <?php if (get_sub_field('value_format') == $value_format_one): ?>
                                    <?php echo App\bikmo_display_field_boolean(get_sub_field('column_' . $col . '_value_2')); ?>

                                <?php elseif (get_sub_field('value_format') == $value_format_two): ?>
                                    <?php echo App\bikmo_display_field_price(get_sub_field('column_' . $col . '_value_2')); ?>

                                <?php else: ?>
                                    <?php the_sub_field('column_' . $col . '_value_2'); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <?php if ($max_vizible_features < count(get_field('bikmo_table_block_features'))): ?>
        <div class="bikmotableblock-card__load_more" data-more="<?php echo $load_more_text; ?>" data-less="<?php echo $load_less_text; ?>">
            <?php echo $load_more_text; ?>
        </div>
    <?php endif; ?>

    <div class="bikmotableblock-card__cta">
        <?php $link = get_field('bikmo_table_block_card_' . $col . '_button_link'); ?>
        <?php if ($link): ?>
            <?php
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="btn btn--magenta-full" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>
        <?php endif; ?>
    </div>

</div>