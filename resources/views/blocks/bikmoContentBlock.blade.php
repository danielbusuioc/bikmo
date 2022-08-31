{{--
  Title: BikmoContentBlock
  Description: Bikmo Content Block
  Category: common
  Icon: dashicons-block-default
  Keywords: bikmo content block
  Mode: preview
--}}

<section data-{{ $block['id'] }} class="{{ $block['classes'] }} {{ (get_field('bikmo_content_block_image_position') == 'Image on the left' ? 'bikmocontentblock--image_left' : 'bikmocontentblock--image_right') }}">
    
    <div class="wrapper">
        <div class="bikmocontentblock__half bikmocontentblock_content">

            @if(get_field('bikmo_content_block_tag'))
            <div class="bikmocontentblock_content__tag block_tag">{{ get_field('bikmo_content_block_tag') }}</div>
            @endif

            <h2 class="bikmocontentblock_content__title block_title">{!! get_field('bikmo_content_block_title') !!}</h2>
            <div class="bikmocontentblock_content__text block-text-regular">{!! get_field('bikmo_content_block_text') !!}</div>

            @if( have_rows('header_buttons') )
                <div class="block_cta_list bikmocontentblock_content__buttons">
                @while( have_rows('header_buttons') ) 
                    @php the_row() @endphp
                    <a href="{{ the_sub_field('link') }}" class="btn {{ App\btn_styles(get_sub_field('style')) }}">{{ the_sub_field('text') }}</a>
                @endwhile
                </div>
            @endif
        </div>

        <div class="bikmocontentblock__half bikmocontentblock_image {{ get_field('bikmo_content_block_buttons_show_gr') }}">
            
            @if(get_field('bikmo_content_block_show_gr'))
            <div class="bikmocontentblock_image__green-bar"></div>
            @endif
        
            @if(get_field('bikmo_content_block_image'))
                {!! App\wp_image(get_field('bikmo_content_block_image'), 'full', false, ['class' => 'block_image']) !!}
            @endif    
        </div>
    </div>

</section>

<style type="text/css">
  .wp-admin [data-{{$block['id']}}] .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_right .wrapper {
    flex-direction: row;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .wrapper {
    flex-direction: row-reverse;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .bikmocontentblock_content .bikmocontentblock_content__title {
    margin-left: 45px;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .bikmocontentblock_content .bikmocontentblock_content__text {
    margin-left: 45px;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .bikmocontentblock_content .bikmocontentblock_content__tag {
    margin-left: 45px;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .bikmocontentblock_content .bikmocontentblock_content__buttons {
    margin-left: 45px;
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_left .bikmocontentblock_image img {
    clip-path: polygon(0% 0%, 98% 0%, 100% 100%, 0% 98%);
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_right .bikmocontentblock_image img {
    clip-path: polygon(2% 0%, 100% 0%, 100% 98%, 0% 100%);
  }

  .wp-admin [data-{{$block['id']}}] .block_tag {
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

  .wp-admin [data-{{$block['id']}}] .block_tag::before {
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
  .wp-admin [data-{{$block['id']}}] .bikmocontentblock_image {
    margin-bottom: 52px;
    height: 472px;
    position: relative;
  }

  .wp-admin [data-{{$block['id']}}] .bikmocontentblock_image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .wp-admin [data-{{$block['id']}}] .bikmocontentblock_image .bikmocontentblock_image__green-bar {
    position: absolute;
    top: -24px;
    left: initial;
    right: 2px;
    width: 8px;
    height: calc(100% + 48px);
    background-color: #3cf1c6;
    z-index: 1;
    transform: skew(1deg);
  }

  .wp-admin [data-{{$block['id']}}].bikmocontentblock--image_right .bikmocontentblock_image .bikmocontentblock_image__green-bar {
    left: -2px;
    width: 8px;
    right: initial;
    transform: skew(-1deg);
  }

  .wp-admin [data-{{$block['id']}}] .bikmocontentblock__half {
      min-width: 50%;
      max-width: 50%;
    }
</style>