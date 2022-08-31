<?php $no_of_jobs = count(get_field('bikmo_jobs_block_jobs')); ?>

<section class="bikmojobsblock">
    <div class="wrapper">

        <div class="bikmojobsblock-header">
            <h2 class="bikmojobsblock-header__title block_title section_title"><?php the_field('bikmo_jobs_block_title'); ?></h2>
        </div>

        <div class="bikmojobsblock-body">
            <?php if (have_rows('bikmo_jobs_block_jobs')) : ?>
                <?php while (have_rows('bikmo_jobs_block_jobs')) : ?>
                    <?php the_row(); ?>

                    <div class="bikmojobsblock-item ">
                        <h3 class="bikmojobsblock-item__title">
                            <?php the_sub_field('title'); ?>

                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.46875 8.9375C6.75 9.21875 7.21875 9.21875 7.5 8.9375L13.5938 2.875C13.875 2.5625 13.875 2.09375 13.5938 1.8125L12.875 1.09375C12.5938 0.8125 12.125 0.8125 11.8125 1.09375L7 5.90625L2.15625 1.09375C1.84375 0.8125 1.375 0.8125 1.09375 1.09375L0.375 1.8125C0.09375 2.09375 0.09375 2.5625 0.375 2.875L6.46875 8.9375Z" fill="#1A1A1A" />
                            </svg>
                        </h3>

                        <div class="bikmojobsblock-item__location">
                            <svg width="14" height="19" viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.04688 17.8984C6.36328 18.3906 7.10156 18.3906 7.41797 17.8984C12.5508 10.5156 13.5 9.74219 13.5 7C13.5 3.27344 10.4766 0.25 6.75 0.25C2.98828 0.25 0 3.27344 0 7C0 9.74219 0.914062 10.5156 6.04688 17.8984ZM6.75 9.8125C5.16797 9.8125 3.9375 8.58203 3.9375 7C3.9375 5.45312 5.16797 4.1875 6.75 4.1875C8.29688 4.1875 9.5625 5.45312 9.5625 7C9.5625 8.58203 8.29688 9.8125 6.75 9.8125Z" fill="#1A1A1A" />
                            </svg>
                            <?php the_sub_field('location'); ?>
                        </div>

                        <div class="bikmojobsblock-item__expandeble">
                            <div class="bikmojobsblock-item__text">
                                <?php the_sub_field('description'); ?>
                            </div>

                            <div class="bikmojobsblock-item__cta">
                                <?php $link = get_sub_field('button_link'); ?>
                                <?php if ($link): ?>
                                    <?php
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                        <a href="<?php echo $link_url; ?>" class="btn btn--magenta-border" target="<?php echo esc_attr( $link_target ); ?>">
                                            <?php echo esc_html( $link_title ); ?>
                                        </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="bikmojobsblock-item__cta">
                            <?php $link = get_sub_field('button_link'); ?>
                            <?php if ($link): ?>
                                <?php
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <a href="<?php echo $link_url; ?>" class="btn btn--magenta-border" target="<?php echo esc_attr( $link_target ); ?>">
                                        <?php echo esc_html( $link_title ); ?>
                                    </a>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php if ($no_of_jobs > 0 && $no_of_jobs % 3 != 0): ?>
                <?php for ($i = 0; $i < 3 - ($no_of_jobs % 3); $i++) : ?>
                    <div class="bikmojobsblock-item bikmojobsblock-item--placeholder"></div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

    </div>
</section>