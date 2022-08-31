<?php

$max_number_of_card = intval(get_field('bikmo_table_block_no_of_cards'));
$max_vizible_features = get_field('max_number_of_features_to_be_displayed');
$load_more_text = get_field('bikmo_table_block_all_features_label');
$load_less_text = get_field('bikmo_table_block_less_features_label');

$features_type = get_field('bikmo_table_block_features_type');
$features_type_one = 'Simple value';
$features_type_two = 'Double values';

$features_name = get_field('bikmo_table_block_features_name');
$value_one_name = get_field('bikmo_table_block_feature_type_1_value_name');
$value_two_name = get_field('bikmo_table_block_feature_type_2_value_name');
?>

<section class="bikmotableblock <?php echo (get_field('bikmo_table_block_angled_top') ? 'bikmotableblock--angled-top' : ''); ?> <?php echo (get_field('bikmo_table_block_angled_bottom') ? 'bikmotableblock--angled-bottom' : ''); ?>">
    <div class="wrapper">
        
        <div class="bikmotableblock-header">
            <h2 class="bikmotableblock-header__title block_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_table_block_title')); ?>
            </h2>
        </div>

        <div class="bikmotableblock-body">

            <div class="bikmotableblock-nav bikmotableblock-nav--<?php echo $max_number_of_card; ?>elements">
                <?php for ($nav_col = 1; $nav_col <= $max_number_of_card; $nav_col++): ?>
                    <div class="bikmotableblock-nav__item <?php echo (2 == $nav_col ? 'bikmotableblock-nav__item--selected' : ''); ?>" data-tab="<?php echo $nav_col; ?>">
                        <?php the_field('bikmo_table_block_card_' . $nav_col . '_title'); ?>
                    </div>
                <?php endfor; ?>
            </div>

            <?php include 'tablehead.php'; ?>

            <div class="bikmotableblock-cards bikmotableblock-cards--<?php echo $max_number_of_card; ?>elements">
                <?php for ($col = 1; $col <= $max_number_of_card; $col++): ?>
                    <?php include 'tablecard.php';?>
                <?php endfor; ?>
            </div>

        </div>


        <div class="bikmotableblock-footer">
            <p><?php the_field('bikmo_table_block_info_text'); ?></p>
            <a href="<?php the_field('bikmo_table_block_info_button_link'); ?>">
                <span class="green_underline"><?php the_field('bikmo_table_block_info_button_text'); ?></span>
                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.78906 0.621094L7.08594 1.28906C6.91016 1.46484 6.91016 1.74609 7.08594 1.88672L12.5352 7.33594H0.546875C0.300781 7.33594 0.125 7.54688 0.125 7.75781V8.74219C0.125 8.98828 0.300781 9.16406 0.546875 9.16406H12.5352L7.08594 14.6484C6.91016 14.7891 6.91016 15.0703 7.08594 15.2461L7.78906 15.9141C7.92969 16.0898 8.21094 16.0898 8.38672 15.9141L15.7344 8.56641C15.9102 8.39062 15.9102 8.14453 15.7344 7.96875L8.38672 0.621094C8.21094 0.445312 7.92969 0.445312 7.78906 0.621094Z" fill="#1A1A1A"/>
                </svg>
            </a>
        </div>

    </div>
</section>