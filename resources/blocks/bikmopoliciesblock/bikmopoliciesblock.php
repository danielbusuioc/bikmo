<section class="bikmopoliciesblock">
    <div class="wrapper">

        <div class="bikmopoliciesblock-header block_header">
            <h2 class="bikmopoliciesblock-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_policies_block_title')); ?>
            </h2>
            <div class="bikmopoliciesblock-header__subtitle block_header__subtitle block-text-regular"><?php the_field('bikmo_policies_block_subtitle'); ?></div>
        </div>

        <div class="bikmopoliciesblock-body">
            <?php if (have_rows('bikmo_policies_block_cards')) : ?>
                <?php $cards = count(get_field('bikmo_policies_block_cards')); ?>
                <?php while (have_rows('bikmo_policies_block_cards')) : ?>
                    <?php the_row(); ?>

                    <?php
                    $link = get_sub_field('button_link');
                    $link_url = "";
                    $link_title = "";
                    $link_target = "_self";

                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    endif; ?>

                    <div class="bikmopoliciesblock-card <?php echo 'bikmopoliciesblock-card--c' . $cards; ?>" data-desktopimg="<?php echo get_sub_field('image_desktop'); ?>" data-tabletimg="<?php echo get_sub_field('image_tablet'); ?>" data-mobileimg="<?php echo get_sub_field('image_mobile'); ?>">

                        <a href="<?php echo $link_url; ?>" target="<?php echo esc_attr($link_target); ?>">

                            <div class="bikmopoliciesblock-card__meta">
                                <div class="bikmopoliciesblock-card__tags">
                                    <div class="block_tag"><?php the_sub_field('tag_1'); ?></div>
                                    <div class="block_tag"><?php the_sub_field('tag_2'); ?></div>
                                </div>

                                <div class="bikmopoliciesblock-card__mobile_arrow">
                                    <span>
                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.78906 0.621094L7.08594 1.28906C6.91016 1.46484 6.91016 1.74609 7.08594 1.88672L12.5352 7.33594H0.546875C0.300781 7.33594 0.125 7.54688 0.125 7.75781V8.74219C0.125 8.98828 0.300781 9.16406 0.546875 9.16406H12.5352L7.08594 14.6484C6.91016 14.7891 6.91016 15.0703 7.08594 15.2461L7.78906 15.9141C7.92969 16.0898 8.21094 16.0898 8.38672 15.9141L15.7344 8.56641C15.9102 8.39062 15.9102 8.14453 15.7344 7.96875L8.38672 0.621094C8.21094 0.445312 7.92969 0.445312 7.78906 0.621094Z" fill="white" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="bikmopoliciesblock-card__title"><?php the_sub_field('title'); ?></div>

                            <div class="bikmopoliciesblock-card__buttons">
                                <span class="btn btn--white-border">
                                    <?php echo esc_html($link_title); ?>
                                </span>
                            </div>

                        </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>