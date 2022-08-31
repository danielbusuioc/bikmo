@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp

@include('partials.articles.hero')

@include('partials.articles.single')

@endwhile
@endsection