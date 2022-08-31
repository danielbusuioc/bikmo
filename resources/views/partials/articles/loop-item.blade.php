
@if(!isset($article_id))
<div class="article-item">
    <div class="article-item__image">
        <a href="{{ the_permalink() }}" title="{!! the_title_attribute(); !!}">{{ the_post_thumbnail() }}</a>
    </div>
    <div class="article-item__content">

        @php $tags = get_the_tags(); @endphp
        @php $categories = get_the_category(); @endphp
        <div class="article-item__badges">
            <div class="article-badge">{{ (!empty($categories) ? $categories[0]->name : 'unknown') }}</div>
        </div>

        <h2 class="article-item__title body-text body-text--weight-bold">
            <a href="{{ the_permalink() }}" title="{!! the_title_attribute(); !!}">{!! get_the_title() !!}</a>
        </h2>

        <time class="updated article-item__date body-text body-text--size-small" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>

    </div>
</div>
@else
<div class="article-item">
    <div class="article-item__image">
        <a href="{{ get_the_permalink($article_id) }}" >{!! get_the_post_thumbnail($article_id, 'full') !!}</a>
    </div>
    <div class="article-item__content">

        @php $tags = get_the_tags($article_id); @endphp
        @php $categories = get_the_category($article_id); @endphp
        <div class="article-item__badges">
            <div class="article-badge">{{ (!empty($categories) ? $categories[0]->name : 'unknown') }}</div>

            <time class="updated article-item__date body-text body-text--size-small article-item__date--mobile" datetime="{{ get_post_time('c', true, $article_id) }}">{{ get_the_date(get_option( 'date_format' ) , $article_id) }}</time>
        </div>

        <h2 class="article-item__title body-text body-text--weight-bold">
            <a href="{{ get_the_permalink($article_id) }}" >{!! get_the_title($article_id) !!}</a>
        </h2>

        <time class="updated article-item__date body-text body-text--size-small article-item__date--desktop" datetime="{{ get_post_time('c', true, $article_id) }}">{{ get_the_date(get_option( 'date_format' ) , $article_id) }}</time>

    </div>
</div>
@endif