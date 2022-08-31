@if(isset($article_id))
<section class="featured-article">
    <div class="wrapper">
        <div class="featured-article__image">
            <a href="{{ get_the_permalink($article_id) }}">{!! get_the_post_thumbnail($article_id, 'full') !!}</a>
        </div>
        <div class="featured-article__content">
            @php $tags = get_the_tags($article_id); @endphp
            @php $categories = get_the_category($article_id); @endphp
            <div class="featured-article__meta">
                <div class="article-badge">{{ (!empty($categories) ? $categories[0]->name : 'unknown') }}</div>
            </div>

            <h2 class="h2-text article-title featured-article__title">
                {!! get_the_title($article_id) !!}
            </h2>

            <div class="article-description featured-article__description body-text body-text--size-large">
                {!! get_the_excerpt($article_id) !!}
            </div>

            <a href="{{ get_the_permalink($article_id) }}" class="article-btn btn {{ App\btn_styles(get_field('articles_read_more_style', 'options')) }}">
                {{ the_field('articles_read_more_text', 'options') }}
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.22171 4.58688L11.8786 4.58688M11.8786 4.58688L11.8786 10.2437M11.8786 4.58688L3.82843 12.637" stroke="#FF0080" stroke-width="2"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif
