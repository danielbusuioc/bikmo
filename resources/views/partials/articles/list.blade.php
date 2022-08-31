<section class="articles-list blog-list ajax-blog-list" data-featured="{{ $featured_article }}">
    <div class="wrapper articles-list__container">

        @php
        query_posts([
            'paged' => 1,
            'posts_per_page' => 3,
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => [
                'menu_order' => 'DESC',
                'post_date' => 'DESC',
                'title' => 'ASC'
            ],
            'post__not_in' => [$featured_article]
        ]);

        global $wp_query;
        wp_localize_script('bikmo/blog.js', 'blog_list_vars', [
        'admin_url' => admin_url(),
        'max_pages' => $wp_query->max_num_pages
        ]);


        @endphp

            @while(have_posts()) @php the_post() @endphp
                @include('partials.articles.loop-item')
            @endwhile

        @php wp_reset_query(); @endphp

    </div>

    <div class="wrapper articles-list__actions">
        <div id="trigger-load-more" class="articles-list__load-more btn btn--md {{ App\btn_styles(get_field('articles_load_more_style', 'options')) }}">{!! the_field('articles_load_more_text', 'options') !!}</div>
    </div>
</section>