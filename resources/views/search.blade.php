@extends('layouts.app')

@section('content')

@if(have_posts())

<section class="hero hero--with-bg hero--no-image hero--skewd hero--align-center">
  <div class="wrapper">
    <div class="text-skewd">
      <h1 class="hero__title hero_title--single">
        <span class="hero_title--underlined">{!! get_field('articles_search_page_hero_title', 'options') !!}</span>
      </h1>
    </div>
  </div>
</section>

@include('partials.articles.filters')

@php global $wp_query; @endphp
@include('partials.listing-header', ['title' => get_field('articles_search_page_section_title', 'options'), 'desc' => sprintf(__('%d results for "%s"', 'sage'), $wp_query->found_posts, get_search_query())])

<section class="articles-list blog-list">
  <div class="wrapper">
    @while(have_posts()) @php the_post() @endphp
    @include('partials.articles.loop-item')
    @endwhile
  </div>
</section>

@endif

@if(!have_posts())

@include('partials.default-hero', ['default_title' => get_field('articles_search_page_hero_title', 'options')])

@include('partials.articles.filters')

@include('partials.listing-header', ['title' => 'No results', 'desc' => 'There are no posts that match "' . get_search_query() . '"'])

<section class="articles-list blog-list">
  <div class="wrapper">
  </div>
</section>

@endif
@endsection