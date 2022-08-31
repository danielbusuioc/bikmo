{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.page-hero', ['custom_align' => 'center'])

    @include('partials.articles.filters')
    
    @include('partials.articles.featured', ['article_id' => get_field('blog_featured_article')])

    @include('partials.articles.list', ['featured_article' => get_field('blog_featured_article')])

    <div class="spacer spacer--mb-160"></div>
  @endwhile
@endsection