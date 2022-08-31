<?php

$special_featured_id = get_field('bikmo_magazine_block_featured_id');
$tags_ids = get_field('bikmo_magazine_block_tags');

$q_args  = [
    'post_type' => 'post',
    'post_status' => ['publish', 'private'],
    'tag__in' => $tags_ids,
    'posts_per_page' => 4,
];

if ($special_featured_id) {
    $q_args['post__not_in'] = [$special_featured_id];
}

// the query
$the_query = new WP_Query($q_args);

$magazine_index = 0;
$magazine_articles = [];

if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
        if ($magazine_index == 0) {
            $featured_id = get_the_ID();
        } else {
            $magazine_articles[] = get_the_ID();
        }
        $magazine_index += 1;
    endwhile;
    wp_reset_postdata();
endif;

if ($special_featured_id) {
    $featured_id = $special_featured_id;
}

?>

<section class="bikmomagazineblock">

    <div class="wrapper">
        <h2 class="bikmomagazineblock__title"><?php the_field('bikmo_magazine_block_title'); ?></h2>
    </div>

    <?php if ($featured_id): ?>
    <article class="featured-article">
        <div class="wrapper">
            <div class="featured-article__image">
                <a href="<?php echo get_the_permalink($featured_id); ?>"><?php echo get_the_post_thumbnail($featured_id, 'full'); ?></a>
            </div>
            <div class="featured-article__content">
                <?php $tags = get_the_tags($featured_id); ?>
                <?php $categories = get_the_category($featured_id); ?>
                <div class="featured-article__meta">
                    <?php if (!empty($categories)): ?>
                        <div class="article-badge"><?php echo $categories[0]->name; ?></div>
                    <?php endif; ?>
                </div>

                <h2 class="h2-text article-title featured-article__title">
                    <?php echo get_the_title($featured_id); ?>
                </h2>

                <div class="article-description featured-article__description body-text body-text--size-large">
                    <?php echo get_the_excerpt($featured_id); ?>
                </div>

                <a href="<?php echo get_the_permalink($featured_id); ?>" class="article-btn btn <?php echo App\btn_styles(get_field('articles_read_more_style', 'options')); ?>">
                    <?php the_field('articles_read_more_text', 'options'); ?>
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.22171 4.58688L11.8786 4.58688M11.8786 4.58688L11.8786 10.2437M11.8786 4.58688L3.82843 12.637" stroke="#FF0080" stroke-width="2"/>
                    </svg>
                </a>
            </div>
        </div>
    </article>
    <?php endif; ?>

    <section class="articles-list blog-list bikmomagazineblock-list">
        <div class="wrapper articles-list__container">
            <?php foreach($magazine_articles as $article_id): ?>
                <?php if ($article_id): ?>
                    <div class="article-item">
                        <div class="article-item__image">
                            <a href="<?php echo get_the_permalink($article_id); ?>"><?php echo get_the_post_thumbnail($article_id, 'full'); ?></a>
                        </div>
                        <div class="article-item__content">

                            <?php $tags = get_the_tags($article_id); ?>
                            <?php $categories = get_the_category($article_id); ?>
                            <div class="article-item__badges">
                                <?php if (!empty($categories)): ?>
                                    <div class="article-badge"><?php echo $categories[0]->name; ?></div>
                                <?php endif; ?>
                                <time class="updated article-item__date body-text body-text--size-small article-item__date--mobile" datetime="<?php echo get_post_time('c', true, $article_id); ?>"><?php echo get_the_date(get_option( 'date_format' ) , $article_id); ?></time>
                            </div>

                            <h2 class="article-item__title body-text body-text--weight-bold">
                                <a href="<?php echo get_the_permalink($article_id); ?>" ><?php echo get_the_title($article_id); ?></a>
                            </h2>

                            <time class="updated article-item__date body-text body-text--size-small article-item__date--desktop" datetime="<?php echo get_post_time('c', true, $article_id); ?>"><?php echo get_the_date(get_option( 'date_format' ) , $article_id); ?></time>

                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

</section>