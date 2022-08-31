<section class="bikmobrandsblock">
    <div class="wrapper">

        <div class="bikmobrandsblock-header block_header">
            <h2 class="bikmobrandsblock-header__title block_title block_header__title section_title">
                <?php echo preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('bikmo_brands_block_title')); ?>
            </h2>
            <div class="bikmobrandsblock-header__subtitle block_header__subtitle block-text-regular"><?php the_field('bikmo_brands_block_subtitle'); ?></div>
        </div>
    </div>

    <div class="bikmobrandsblock-body">
        <?php
        $logos = get_field('bikmo_brands_block_logos');
        if ($logos) : ?>
            <div class="bikmobrandsblock-gallery">
                <?php foreach ($logos as $logo) : ?>
                    <div class="bikmobrandsblock-gallery__item">
                        <?php echo App\wp_image($logo, 'full', false, []); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</section>