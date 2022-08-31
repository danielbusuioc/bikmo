@extends('layouts.app')

@section('content')

  @include('partials.default-hero', ['default_title' => '404 page'])

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
@endsection
