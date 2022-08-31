<div class="form_section">
    <div class="wrapper">

        <div class="form_section__info">
            <h2 class="section_title"><?php the_field('form_section_title') ?></h2>
            <div class="block-text-regular form_section__info__text"><?php the_field('form_section_subtitle'); ?></div>
        </div>

        <div class="form_section__form">

            <?php $the_form = get_field('form_section_form');  // var_dump($the_form); ?>
            <?php echo do_shortcode('[contact-form-7 id="' . $the_form->ID . '" title="' . $the_form->post_title . ']'); ?>
        </div>
    </div>
</div>