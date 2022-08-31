
@if(get_field('display_hero_section_on_this_page') == 'No')

<section class="hero hero--default {{ (get_field('page_header_style') == 'Solid White' ? 'hero--with-solid-header' : '') }} {{ isset($custom_align) ? 'hero--align-' . $custom_align : 'hero--align-left' }}">
    <div class="wrapper">
        <h1 class="hero__title {{ (get_field('display_page_title_with_uppercase') ? 'hero__title--uppercased' : '') }}">{!! the_title() !!}</h1>
    </div>
</section>

@else

<section class="hero hero--with-bg {{ (get_field('hero_image') == 'No' ? 'hero--no-image' : '') }} {{ (!in_array(get_field('hero_title_style'), ['Regular']) ? 'hero--skewd' : '') }} {{ isset($custom_align) ? 'hero--align-' . $custom_align : 'hero--align-left' }}">

    @if(get_field('hero_image') == 'Yes')
    {!! App\wp_image(get_field('hero_image_mobile'), 'full', false, ['class' => 'hero__image hero__image--sm']) !!}
    {!! App\wp_image(get_field('hero_image_tablet'), 'full', false, ['class' => 'hero__image hero__image--md']) !!}
    {!! App\wp_image(get_field('hero_image_desktop'), 'full', false, ['class' => 'hero__image hero__image--lg']) !!}
    @endif

    <div class="wrapper">

        @if(get_field('hero_title_style') == 'Regular')
            @if(strlen(get_field('hero_description')) > 0)
                <h2 class="hero__title">
                    {!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_regular')) !!}
                </h2>
            @else
                <h1 class="hero__title">
                    {!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_regular')) !!}
                </h1>
            @endif
        @elseif(get_field('hero_title_style') == 'Skewd Big')
            <div class="text-skewd">
                @if(strlen(get_field('hero_description')) > 0)
                    <h2 class="hero__title hero__title--big ">
                        <span class="hero__title--big-first">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_big_first')) !!}</span>
                        <span class="hero__title--big-last">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_big_last')) !!}</span>
                    </h2>
                @else
                    <h1 class="hero__title hero__title--big ">
                        <span class="hero__title--big-first">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_big_first')) !!}</span>
                        <span class="hero__title--big-last">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_big_last')) !!}</span>
                    </h1>
                @endif
            </div>
        @elseif(get_field('hero_title_style') == 'Skewd Medium')
            <div class="text-skewd">
                @if(strlen(get_field('hero_description')) > 0)
                    <h2 class="hero__title hero__title--medium ">
                        <span class="hero__title--medium-first">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_medium_first')) !!}</span>
                        <span class="hero__title--medium-last">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_medium_last')) !!}</span>
                    </h2>
                @else
                    <h1 class="hero__title hero__title--medium ">
                        <span class="hero__title--medium-first">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_medium_first')) !!}</span>
                        <span class="hero__title--medium-last">{!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_medium_last')) !!}</span>
                    </h1>
                @endif
            </div>
        @elseif(get_field('hero_title_style') == 'Skewd Single')
            <div class="text-skewd">
                <h1 class="hero__title hero_title--single">
                    {!! preg_replace('/\[(.*?)\]/', '<span class="green_underline">$1</span>', get_field('hero_title_skewd_single')) !!}
                </h1>
            </div>
        @endif

        @if(get_field('hero_title_style') != 'Skewd Single' && strlen(get_field('hero_description')) > 0)
            <h1 class="hero__description body-text body-text--weight-medium body-text--size-large">{!! the_field('hero_description') !!}</h1>
        @endif

        @if( have_rows('header_buttons') && get_field('hero_title_style') != 'Skewd Single')
            <div class="hero__cta-list {{ (count(get_field('header_buttons')) == 2 ? 'hero__cta-list-two' : '') }}">
            @while( have_rows('header_buttons') ) 
                @php the_row() @endphp

                @include('partials.buttons')

            @endwhile
            </div>
        @endif
    </div>
</section>

@endif