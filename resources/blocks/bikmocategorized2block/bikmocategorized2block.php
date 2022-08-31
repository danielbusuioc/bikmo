<section class="bikmocategorizedblock <?php echo (get_field('bikmo_categorized2_block_border_top') == 'true' ? 'bikmocategorizedblock--border-top' : ''); ?>">
    <div class="wrapper">

        <div class="bikmocategorizedblock-header">
            <div class="bikmocategorizedblock-header__icon">
                <div class="bikmocategorizedblock-header__icon-bg-dark"></div>
                <div class="bikmocategorizedblock-header__icon-bg-green"></div>
                <?php echo App\wp_image(get_field('bikmo_categorized2_block_icon'), 'full', false, []); ?>
            </div>
            <h2 class="bikmocategorizedblock-header__title block_title section_title"><?php the_field('bikmo_categorized2_block_title'); ?></h2>
            <div class="bikmocategorizedblock-header__subtitle block-text-regular"><?php the_field('bikmo_categorized2_block_subtitle'); ?></div>
        </div>

        <div class="bikmocategorizedblock-body">
            <?php if (have_rows('bikmo_categorized2_block_items')) : ?>
                <?php while (have_rows('bikmo_categorized2_block_items')) : ?>
                    <?php the_row(); ?>

                    <div class="bikmocategorizedblock-item bikmocategorized2block-item bikmogridcard bikmogridcard--bordered">
                        
                        <div class="bikmocategorized2block-item__mobile-head">
                            <div class="bikmocategorizedblock-item__icon bikmogridcard__icon">
                                <?php echo App\wp_image(get_sub_field('icon'), 'full', false, []); ?>
                            </div>

                            <h4 class="bikmocategorizedblock-item__title bikmogridcard__title_2">
                                <?php the_sub_field('title'); ?>
                            </h4>
                        </div>

                        <h4 class="bikmocategorizedblock-item__title bikmogridcard__title_2">
                            <?php the_sub_field('title'); ?>
                        </h4>

                        <div class="bikmocategorizedblock-item__text bikmogridcard__text_2">
                            <?php the_sub_field('text'); ?>
                        </div>

                            <?php $the_link = ''; ?>
                            <?php if (get_sub_field('type') == 'new') : ?>
                                <?php $the_link = get_sub_field('file'); ?>
                            <?php endif; ?>
                            <?php if (get_sub_field('type') == 'doc') : ?>
                                <?php $the_link = get_the_permalink(get_sub_field('document')); ?>
                            <?php endif; ?>

                            <a href="<?php echo $the_link; ?>" target="_blank" class="bikmocategorizedblock-item__link bikmogridcard__link">
                                <span class="green_underline"><?php the_sub_field('button_text'); ?></span>
                                
                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.3125 9.92188C16.5469 9.6875 16.5469 9.3125 16.3125 9.125L15.375 8.1875C15.1875 7.95312 14.8125 7.95312 14.5781 8.1875L10.1719 12.7344V1.0625C10.1719 0.78125 9.9375 0.5 9.60938 0.5H8.29688C8.01562 0.5 7.73438 0.78125 7.73438 1.0625V12.7344L3.375 8.1875C3.14062 7.95312 2.76562 7.95312 2.57812 8.1875L1.64062 9.125C1.40625 9.3125 1.40625 9.6875 1.64062 9.92188L8.57812 16.8594C8.8125 17.0938 9.14062 17.0938 9.375 16.8594L16.3125 9.92188ZM17.4375 19.0625H0.5625C0.234375 19.0625 0 19.3438 0 19.625V20.9375C0 21.2656 0.234375 21.5 0.5625 21.5H17.4375C17.7188 21.5 18 21.2656 18 20.9375V19.625C18 19.3438 17.7188 19.0625 17.4375 19.0625Z" fill="#1A1A1A"/>
                                </svg>
                            </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php if (get_field('bikmo_categorized2_block_show_underwriter')) : ?>
            <div class="bikmocategorizedblock-item bikmogridcard bikmogridcard--bordered bikmogridcard--fullwidth">
                <div class="bikmogridcard--fullwidth__left">
                    <div class="bikmocategorizedblock-item__uptitle bikmogridcard__uptitle">
                        <?php the_field('bikmo_categorized2_block_ulabel'); ?>
                    </div>

                    <h4 class="bikmocategorizedblock-item__title bikmogridcard__title_2">
                        <?php the_field('bikmo_categorized2_block_uname'); ?>
                    </h4>

                    <div class="bikmocategorizedblock-item__text bikmogridcard__text_2">
                        <?php the_field('bikmo_categorized2_block_udesc'); ?>
                    </div>
                </div>

                <div class="bikmogridcard--fullwidth__right">
                    <div class="bikmocategorizedblock-item__icon bikmogridcard__icon">
                        <?php echo App\wp_image(get_field('bikmo_categorized2_block_ulogo'), 'full', false, []); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>