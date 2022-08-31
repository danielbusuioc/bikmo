<?php $link = get_sub_field('link');
$is_modal_link = get_sub_field('open_video_modal'); ?>
<?php if ($link && !$is_modal_link) : ?>
    <?php
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a href="<?php echo esc_url($link_url); ?>" class="btn <?php echo App\btn_styles(get_sub_field('style')); ?>" target="<?php echo esc_attr($link_target); ?>">
        <?php echo esc_html($link_title); ?>
    </a>
<?php endif; ?>

<?php if ($link && $is_modal_link) : ?>

    <?php
    $modal_key = get_sub_field('modal_id');
    $modal_type = explode('~', $modal_key)[0];
    $modal_code = explode('~', $modal_key)[1];

    $link_title = $link['title'];
    ?>

    <?php if ($modal_type == 'vim') : ?>
        <button class="btn <?php echo App\btn_styles(get_sub_field('style')); ?> btn--triggers-modal" data-type="vim" data-modal="modal_<?php echo $modal_code; ?>">
            <?php echo esc_html($link_title); ?>
        </button>
    <?php endif; ?>
    <?php if ($modal_type == 'yt') : ?>
        <?php $youtube_id = get_sub_field('youtube_embed'); ?>
        <button class="btn <?php echo App\btn_styles(get_sub_field('style')); ?> btn--triggers-modal" data-type="yt" data-modal="modal_<?php echo $modal_code; ?>">
            <?php echo esc_html($link_title); ?>
        </button>
    <?php endif; ?>
<?php endif; ?>