{{--
  Template Name: Contact
--}}

@extends('layouts.app')


@section('content')
    @while(have_posts()) @php the_post() @endphp

        @include('partials.page-hero', ['custom_align' => 'center'])

        @include('partials.contact.location')

        @include('partials.contact.form')
        
    @endwhile
@endsection