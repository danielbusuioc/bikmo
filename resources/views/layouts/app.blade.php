<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  @php 
  $extra_class = 'body-' . App\header_styles(get_field('page_header_style')); 
  @endphp

  <body @php body_class([$extra_class]) @endphp>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ get_field('google_tagmanager_api_key', 'options') }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @php do_action('get_header') @endphp
    @include('partials.header')


    <div class="wrap container" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>

        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>

    @php do_action('get_footer') @endphp
    @include('partials.footer')


    @if(get_field('display_localization_modal_on_this_site', 'options'))
      @include('partials.modals.localization')
    @endif

    @php wp_footer() @endphp
  </body>

</html>
