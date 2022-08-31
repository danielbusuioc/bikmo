<?php $no_of_members = count(get_field('bikmo_team_block_members')); ?>

<section class="bikmoteamblock">
    <div class="wrapper">

        <div class="bikmoteamblock-header block_header">
            <h2 class="bikmoteamblock-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_team_block_title')); ?>
            </h2>
            <div class="bikmoteamblock-header__subtitle block_header__subtitle block-text-regular"><?php the_field('bikmo_team_block_subtitle'); ?></div>
        </div>

        <div class="bikmoteamblock-body">
            <?php if (have_rows('bikmo_team_block_members')) : ?>
                <?php while (have_rows('bikmo_team_block_members')) : ?>
                    <?php the_row(); ?>

                    <div class="bikmoteamcard">

                        <div class="bikmoteamcard__image">
                            <?php echo App\wp_image(get_sub_field('image'), 'full', false, []); ?>

                            <div class="bikmoteamcard__tags">
                                <div class="block_tag"><?php the_sub_field('first_name'); ?></div>
                                <div class="block_tag"><?php the_sub_field('last_name'); ?></div>
                            </div>
                        </div>

                        <div class="bikmoteamcard__content">
                            <div class="bikmoteamcard__job">
                                <?php the_sub_field('job_name'); ?>
                            </div>

                            <div class="bikmoteamcard__description">
                                <?php the_sub_field('short_description'); ?>
                            </div>

                            <?php $link = get_sub_field('profile_button_link'); ?>
                            <?php if ($link): ?>
                                <?php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <a href="<?php echo $link_url; ?>" class="bikmoteamcard__link" target="<?php echo esc_attr( $link_target ); ?>">
                                        <span class="green_underline"><?php echo esc_html( $link_title ); ?></span>

                                        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.78906 0.621094L7.08594 1.28906C6.91016 1.46484 6.91016 1.74609 7.08594 1.88672L12.5352 7.33594H0.546875C0.300781 7.33594 0.125 7.54688 0.125 7.75781V8.74219C0.125 8.98828 0.300781 9.16406 0.546875 9.16406H12.5352L7.08594 14.6484C6.91016 14.7891 6.91016 15.0703 7.08594 15.2461L7.78906 15.9141C7.92969 16.0898 8.21094 16.0898 8.38672 15.9141L15.7344 8.56641C15.9102 8.39062 15.9102 8.14453 15.7344 7.96875L8.38672 0.621094C8.21094 0.445312 7.92969 0.445312 7.78906 0.621094Z" fill="#1A1A1A" />
                                        </svg>
                                    </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ($no_of_members > 0 && $no_of_members % 4 != 0): ?>
                <?php for ($i = 0; $i < 4 - ($no_of_members % 4); $i++) : ?>
                    <div class="bikmoteamcard bikmoteamcard--placeholder"></div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

    </div>
</section>