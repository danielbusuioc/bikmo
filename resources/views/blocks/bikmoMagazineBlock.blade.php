{{--
  Title: BikmoMagazineBlock
  Description: Bikmo Magazine Block
  Category: common
  Icon: dashicons-block-default
  Keywords: bikmo blog magazine block
  Mode: preview
--}}

@php 

$featured_id = get_field('bikmo_magazine_block_article_0');
$article_1_id = get_field('bikmo_magazine_block_article_1');
$article_2_id = get_field('bikmo_magazine_block_article_2');
$article_3_id = get_field('bikmo_magazine_block_article_3');

@endphp

<section data-{{ $block['id'] }} class="{{ $block['classes'] }}">

    <div class="wrapper">
        <h2 class="bikmomagazineblock__title">{{ the_field('bikmo_magazine_block_title') }}</h2>
    </div>

    @if($featured_id)
    <article class="featured-article">
        <div class="wrapper">
            <div class="featured-article__image">
                <a href="{{ get_the_permalink($featured_id) }}">{!! get_the_post_thumbnail($featured_id, 'full') !!}</a>
            </div>
            <div class="featured-article__content">
                @php $categories = get_the_category($featured_id); @endphp
                <div class="featured-article__meta">
                    <div class="article-badge">{{ (!empty($categories) ? $categories[0]->name : 'unknown') }}</div>
                </div>

                <h2 class="h2-text article-title featured-article__title">
                    {!! get_the_title($featured_id) !!}
                </h2>

                <div class="article-description featured-article__description body-text body-text--size-large">
                    {!! get_the_excerpt($featured_id) !!}
                </div>

                <a href="{{ get_the_permalink($featured_id) }}" class="article-btn btn {{ App\btn_styles(get_field('articles_read_more_style', 'options')) }}">
                    {{ the_field('articles_read_more_text', 'options') }}
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.22171 4.58688L11.8786 4.58688M11.8786 4.58688L11.8786 10.2437M11.8786 4.58688L3.82843 12.637" stroke="#FF0080" stroke-width="2"/>
                    </svg>
                </a>
            </div>
        </div>
    </article>
    @endif

    <section class="articles-list blog-list bikmomagazineblock-list">
        <div class="wrapper articles-list__container">

        @if($article_1_id)
            @include('partials.articles.loop-item', ['article_id' => $article_1_id])
        @endif

        @if($article_2_id)
            @include('partials.articles.loop-item', ['article_id' => $article_2_id])
        @endif
        
        @if($article_3_id)
            @include('partials.articles.loop-item', ['article_id' => $article_3_id])
        @endif

        </div>
    </section>

</section>


<style type="text/css">
  .wp-admin [data-{{$block['id']}}] {
    min-height: 160px;
    padding-top: 100px;
    padding-bottom: 100px;
  }

  .wp-admin [data-{{$block['id']}}] a {
      pointer-events: none;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock__title {
    text-transform: uppercase;
  }

  .wp-admin [data-{{$block['id']}}] .featured-article > .wrapper {
    display: flex;
    justify-content: space-between;
  }

  .wp-admin [data-{{$block['id']}}] .featured-article .featured-article__image {
    min-width: 60%;
    max-width: 60%;
  }

  .wp-admin [data-{{$block['id']}}] .featured-article .featured-article__content {
    min-width: 30%;
    max-width: 30%;
  }

  .wp-admin [data-{{$block['id']}}] .featured-article .featured-article__content .featured-article__title {
    font-size: 20px;
    line-height: 22px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container {
      display: flex;
      justify-content: space-between;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item {
      max-width: 30%;
      min-width: 30%;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__image {
    height: 100px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__image > a {
      display: block;
      height: 100%;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__image > a img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__title {
    font-size: 20px;
    line-height: 22px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__title a {
    color: #000;
    font-size: 20px;
    text-decoration: none;
  }

  .wp-admin [data-{{$block['id']}}] .bikmomagazineblock-list .articles-list__container .article-item__date--mobile {
    display: none;
  }

  .wp-admin [data-{{$block['id']}}] .article-badge {
    font-weight: bold;
    font-size: 13px;
    line-height: 100%;
    letter-spacing: -0.02em;
    text-transform: uppercase;
    padding: 5px 10px;
    display: inline-block;
    position: relative;
    margin-bottom: 20px;
    color: #1a1a1a;
    z-index: 2;
  }

  .wp-admin [data-{{$block['id']}}] .article-badge::before {
    display: block;
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #3cf1c6;
    z-index: -1;
    transform-origin: left;
    transform: skew(3deg, -1deg);
  }

</style>