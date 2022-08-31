@extends('layouts.app')

@section('content')


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

@php $category = get_queried_object(); @endphp
@include('partials.listing-header', ['title' => $category->name])

<section class="articles-list blog-list">
  <div class="wrapper">

    @while(have_posts()) @php the_post() @endphp
    @include('partials.articles.loop-item')

    @endwhile
  </div>
</section>


@endsection