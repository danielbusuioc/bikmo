<section class="bikmofaqblock">
    <div class="wrapper">
    
        <div class="bikmofaqblock-header">
            <h2 class="bikmofaqblock-header__title block_title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_faq_block_title')); ?>
            </h2>
        </div>

        <div class="bikmofaqblock-body">
            <?php if ( have_rows('bikmo_faq_block_questions') ): ?>
                <?php while ( have_rows('bikmo_faq_block_questions') ): ?> 
                    <?php the_row(); ?>
                    <div class="bikmofaqblock-item">
                        <div class="bikmofaqblock-item__plus">
                            <svg class="bikmofaqblock-item__plus-open" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 10H10M20 10H10M10 20V10M10 0V10" stroke="#3CF1C6" stroke-width="4"/>
                            </svg>
                            <svg class="bikmofaqblock-item__plus-close" width="20" height="4" viewBox="0 0 20 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2H10H20" stroke="#3CF1C6" stroke-width="4"/>
                            </svg>
                        </div>
                        <div class="bikmofaqblock-item__title block-text-medium">
                            <?php the_sub_field('question'); ?>
                        </div>
                        <div class="bikmofaqblock-item__content block-text-regular">
                            <?php the_sub_field('answear'); ?>

                            <?php $link = get_sub_field('link'); ?>
                            <?php if ($link): ?>
                                <?php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                 <a href="<?php echo esc_url( $link_url ); ?>" class="bikmofaqblock-item__link block-text-regular" target="<?php echo esc_attr( $link_target ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                    <svg width="20" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 1L25.6667 9.66667M25.6667 9.66667L17 18.3333M25.6667 9.66667H1" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>