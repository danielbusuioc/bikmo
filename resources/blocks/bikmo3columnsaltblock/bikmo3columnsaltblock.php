<section class="bikmo3columnsaltblock">
    <div class="wrapper">

        <div class="bikmo3columnsaltblock-header block_header">
            <h2 class="bikmo3columnsaltblock-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_3columnsalt_block_title')); ?>
            </h2>
        </div>

        <div class="bikmo3columnsaltblock-body">
            <?php if ( have_rows('bikmo_3columnsalt_block_cards') ): ?>
                <?php while ( have_rows('bikmo_3columnsalt_block_cards') ): ?> 
                    <?php the_row(); ?>

                    <?php $buttons = []; ?>

                    <?php if (have_rows('header_buttons')) : ?>
                        <?php while (have_rows('header_buttons')) : ?>
                            <?php the_row(); ?>
                            
                            <?php
                            $buttons[] = [
                                'link' => get_sub_field('link'),
                                'style' => App\btn_styles(get_sub_field('style')),
                            ];
                            ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <div class="bikmoaltcard">

                        <div class="bikmoaltcard__image">
                            <a href="<?php echo (count($buttons) > 0 ? $buttons[0]['link']['url'] : '') ?>">
                                <?php echo App\wp_image(get_sub_field('image'), 'full', false, []); ?>
                            </a>

                            <div class="bikmoaltcard__number">
                                <?php the_sub_field('number'); ?>
                            </div>
                        </div>

                        <h3 class="bikmoaltcard__title">
                            <a href="<?php echo (count($buttons) > 0 ? $buttons[0]['link']['url'] : '') ?>">
                                <?php the_sub_field('title'); ?>
                            </a>
                        </h3>
                        <div class="bikmoaltcard__text">
                            <?php the_sub_field('description'); ?>
                        </div>

                        <?php if (count($buttons) > 0) : ?>
                            <div class="block_cta_list bikmoaltcard__buttons">
                                <?php foreach ($buttons as $button): ?>
                                    <?php if ($button['link']):
                                        $link_url = $button['link']['url'];
                                        $link_title = $button['link']['title'];
                                        $link_target = $button['link']['target'] ? $button['link']['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url( $link_url ); ?>" class="btn <?php echo $button['style']; ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                            <?php echo esc_html( $link_title ); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <div class="bikmoaltcard bikmoaltcard--spacer"></div>
        </div>

    </div>
</section>