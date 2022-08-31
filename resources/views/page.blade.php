@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-hero')
    

    
    @php the_content() @endphp

  @endwhile
@endsection
