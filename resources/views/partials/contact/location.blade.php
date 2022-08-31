<div class="location_section">

    <div class="location_section__header">
        <h2 class="section_title"><?php the_field('location_section_title') ?></h2>
    </div>

    <div class="wrapper">
        <div class="location_section__info">

            <h2 class="section_title"><?php the_field('location_section_title') ?></h2>

            <?php if ( have_rows('location_section_location_info') ): ?>
                <?php while ( have_rows('location_section_location_info') ): ?> 
                    <?php the_row(); ?>

                    <div class="location_section_item">
                        <div class="location_section_item__label">
                            <?php the_sub_field('label'); ?>
                        </div>
                        <div class="location_section_item__text">
                            <?php the_sub_field('text'); ?>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>

        <div class="location_section__map" data-lat="{{ the_field('location_section_latitude') }}" data-lng="{{ the_field('location_section_longitude') }}">
            <div id="map"></div>
        </div>
    </div>
</div>
