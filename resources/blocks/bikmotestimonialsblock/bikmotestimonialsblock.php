<section class="bikmotestimonialsblock">
    <div class="wrapper">

        <div class="bikmotestimonialsblock-body">
            <?php if ( have_rows('bikmo_testimonials_block_repeater') ): ?>
                <?php while ( have_rows('bikmo_testimonials_block_repeater') ): ?>
                    <?php the_row(); ?>

                    <div class="bikmotestimonialsblock-slide">

                        <h2 class="bikmotestimonialsblock-slide__title block_title section_title">
                            <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_sub_field('title')); ?>
                        </h2>

                        <div class="bikmotestimonialsblock-slide__content">

                            <div class="bikmotestimonialsblock-slide__image">
                                <?php echo App\wp_image(get_sub_field('image'), 'full', false, []); ?>
                            </div>

                            <div class="bikmotestimonialsblock-slide__text">
                                <svg class="bikmotestimonialsblock-slide__quotationmark" width="43" height="28" viewBox="0 0 43 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.8125 27.875V13.9609L15.0385 0.875V27.875H0.8125ZM28.6105 27.875V13.9609L43 0.875V27.875H28.6105Z" fill="#3CF1C6"/>
                                </svg>

                                <div class="bikmotestimonialsblock-slide__tags">
                                    <div class="block_tag"><?php the_sub_field('label_1'); ?></div>
                                    <div class="block_tag"><?php the_sub_field('label_2'); ?></div>
                                </div>

                                <svg class="bikmotestimonialsblock-slide__quotationmark" width="43" height="28" viewBox="0 0 43 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.8125 27.8125V0.8125H15.0385V14.7266L0.8125 27.8125ZM28.6105 27.8125V0.8125H43V14.7266L28.6105 27.8125Z" fill="#3CF1C6"/>
                                </svg>
                            </div>
                        </div>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>