{{--
  Title: BikmoBgImageBlock
  Description: Bikmo Background Image Block
  Category: common
  Icon: dashicons-block-default
  Keywords: bikmo backgroun image block
  Mode: preview
--}}

<section data-{{ $block['id'] }} class="{{ $block['classes'] }} bikmobgimageblock--{{ get_field('bikmo_bgimage_block_orientation') }}  {{ (get_field('bikmo_bgimage_block_has_bg') == 'Yes' ? 'bikmobgimageblock--with-img' : 'bikmobgimageblock--no-img') }}"  
    data-img1="{{ get_field('bikmo_bgimage_block_desktop_image') }}" 
    data-img2="{{ get_field('bikmo_bgimage_block_tablet_image') }}" 
    data-img3="{{ get_field('bikmo_bgimage_block_mobile_image') }}">

    <div class="wrapper">

        <div class="bikmobgimageblock__card bikmobgimageblock-card">
            <h2 class="bikmobgimageblock-card__title block_title">{!! the_field('bikmo_bgimage_block_title') !!}</h2>
            <div class="bikmobgimageblock-card__text block-text-regular">{!! get_field('bikmo_bgimage_block_text') !!}</div>

            @if( have_rows('header_buttons') )
                <div class="block_cta_list bikmobgimageblock-card__buttons">
                @while( have_rows('header_buttons') ) 
                    @php the_row() @endphp
                    <a href="{{ the_sub_field('link') }}" class="btn {{ App\btn_styles(get_sub_field('style')) }}">{{ the_sub_field('text') }}</a>
                @endwhile
                </div>
            @endif
        </div>

    </div>

</section>


<style type="text/css">
  .wp-admin [data-{{$block['id']}}] {
    min-height: 160px;
    padding-top: 161px;
    padding-bottom: 151px;
    background-size: cover;
    background-origin: center center;
    background-repeat: no-repeat;
    background-image: url({{ get_field('bikmo_bgimage_block_desktop_image') }});
  }

  .wp-admin [data-{{$block['id']}}] .wrapper {
      display: flex;
      justify-content: flex-start;
  }

  .wp-admin [data-{{$block['id']}}].bikmobgimageblock--right .wrapper {
    justify-content: flex-end;
  }

  .wp-admin [data-{{$block['id']}}] .bikmobgimageblock__card {
    background-color: #fff;
    min-width: 456px;
    max-width: 456px;
    padding: 62px 72px 60px 64px;
    position: relative;
  }

  .wp-admin [data-{{$block['id']}}] .bikmobgimageblock__card::before {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 5px;
    height: 100%;
    background-color: #3cf1c6;
  }

</style>