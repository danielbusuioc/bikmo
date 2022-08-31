{{--
  Title: Bikmo3ColumnsBlock
  Description: Bikmo 3 Columns with Icons Block
  Category: common
  Icon: dashicons-block-default
  Keywords: bikmo 3 columns icons block
  Mode: preview
--}}

<section data-{{ $block['id'] }} class="{{ $block['classes'] }}">
    
    <div class="bikmo3columnsblock-header">
        <div class="bikmo3columnsblock-header__subtitle caption-text">{!! the_field('bikmo_3columns_block_subtitle') !!}</div>
        <h2 class="bikmo3columnsblock-header__title block_title">{!! the_field('bikmo_3columns_block_title') !!}</h2>
    </div>
    
    <div class="wrapper bikmo3columnsblock__mobile-wrapper">
        <div class="bikmo3columnsblock-list">
        @php $slide_nr = 1; @endphp
        @if( have_rows('bikmo_3columns_block_columns') )
            @while( have_rows('bikmo_3columns_block_columns') ) 
                @php the_row() @endphp
                <div class="bikmo3columnsblock-item bikmo3columnsblock-list__item">

                    <div class="bikmo3columnsblock-item__line">
                        @if($slide_nr == 1 || $slide_nr == 3)
                            <svg width="385" height="83" viewBox="0 0 385 83" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3" d="M1 57.0953C1 57.0953 139.176 113.131 273.583 28.4548C407.991 -56.2214 514.763 81.9999 637.865 82C760.968 82.0001 842.617 -30.0714 972 50.8691" stroke="#808080" stroke-width="2" stroke-miterlimit="16" stroke-dasharray="5 5"/>
                            </svg>
                        @else
                            <svg width="775" height="68" viewBox="0 0 775 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M1 47.0009C1 47.0009 111 92.001 218 24.001C325 -43.999 410 67.0009 508 67.0009C606 67.001 671 -22.999 774 42.0009" stroke="#808080" stroke-width="2" stroke-miterlimit="16" stroke-dasharray="5 5"/>
                            </svg>
                        @endif

                    </div>

                    <div class="bikmo3columnsblock-item__icon">
                        <div class="bikmo3columnsblock-item__icon-bg-dark"></div>
                        <div class="bikmo3columnsblock-item__icon-bg-green"></div>
                        <img src="@asset('images/icons/' . get_sub_field('global_icons_gallery') . '.svg')" data-icon="{{ the_sub_field('global_icons_gallery') }}" class="bikmo3columnsblock-item__svg" alt="">
                    </div>

                    <div class="bikmo3columnsblock-item__title block-text-bold">{!! the_sub_field('title') !!}</div>
                    <div class="bikmo3columnsblock-item__text block-text-regular">{!! the_sub_field('text') !!}</div>
                </div>

                @php $slide_nr += 1; @endphp
            @endwhile
        @endif
        </div>    
    </div>

        
    <div class="wrapper bikmo3columnsblock__desktop-wrapper">
        <div class="bikmo3columnsblock-list">
        @php $slide_nr = 1; @endphp
        @if( have_rows('bikmo_3columns_block_columns') )
            @while( have_rows('bikmo_3columns_block_columns') ) 
                @php the_row() @endphp
                <div class="bikmo3columnsblock-item bikmo3columnsblock-list__item">

                    <div class="bikmo3columnsblock-item__line">
                        @if($slide_nr == 1)
                            <svg width="595" height="105" viewBox="0 0 595 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M1 103.668C93 -24.332 170 143.468 302 58.6677C434 -26.1327 539 -9.33244 594 58.6676" stroke="#808080" stroke-width="2" stroke-miterlimit="16" stroke-dasharray="5 5"/>
                            </svg>
                        @elseif($slide_nr == 2)
                            <svg width="775" height="68" viewBox="0 0 775 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M1 47.0009C1 47.0009 111 92.001 218 24.001C325 -43.999 410 67.0009 508 67.0009C606 67.001 671 -22.999 774 42.0009" stroke="#808080" stroke-width="2" stroke-miterlimit="16" stroke-dasharray="5 5"/>
                            </svg>
                        @elseif($slide_nr == 3)
                            <svg width="594" height="85" viewBox="0 0 594 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M592.922 49.4727C482.156 161.629 476.771 -48.7606 297.309 30.3215C117.846 109.404 120 1.81267 0.129873 1.81369" stroke="#808080" stroke-width="2" stroke-miterlimit="16" stroke-dasharray="5 5"/>
                            </svg>
                        @endif

                    </div>

                    <div class="bikmo3columnsblock-item__icon">
                        <div class="bikmo3columnsblock-item__icon-bg-dark"></div>
                        <div class="bikmo3columnsblock-item__icon-bg-green"></div>
                        <img src="@asset('images/icons/' . get_sub_field('global_icons_gallery') . '.svg')" data-icon="{{ the_sub_field('global_icons_gallery') }}" class="bikmo3columnsblock-item__svg" alt="">
                    </div>

                    <div class="bikmo3columnsblock-item__title block-text-bold">{!! the_sub_field('title') !!}</div>
                    <div class="bikmo3columnsblock-item__text block-text-regular">{!! the_sub_field('text') !!}</div>
                </div>

                @php $slide_nr += 1; @endphp
            @endwhile
        @endif
        </div>    
    </div>

    <div class="bikmo3columnsblock-footer">
        @if( have_rows('header_buttons') )
            <div class="block_cta_list bikmo3columnsblock__buttons">
            @while( have_rows('header_buttons') ) 
                @php the_row() @endphp
                <a href="{{ the_sub_field('link') }}" class="btn {{ App\btn_styles(get_sub_field('style')) }}">{{ the_sub_field('text') }}</a>
            @endwhile
            </div>
        @endif
    </div>

</section>

<style type="text/css">
  [data-{{$block['id']}}] {
    min-height: 60px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock__mobile-wrapper {
    display: none;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-item__line {
    display: none;
  }

  .wp-admin  [data-{{$block['id']}}] .bikmo3columnsblock-header__title  {
    text-align: center;
    text-transform: uppercase;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list {
    display: flex;
    justify-content: space-between;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item {
    min-width: 30%;
    max-width: 30%;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__icon img {
    background-color: rgba(0, 0, 0, 0.3);
    margin: 0 auto;
    display: block;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__title {
    font-weight: bold;
    text-align: center;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__icon {
    min-width: 70.56px;
    max-width: 70.56px;
    height: 70.56px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    margin-bottom: 20px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__icon .bikmo3columnsblock-item__svg {
    position: relative;
    z-index: 3;
    max-width: 70%;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__icon .bikmo3columnsblock-item__icon-bg-dark {
    clip-path: polygon(0% 0%, 100% 0, 96% 96%, 0% 100%);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: #1a1a1a;
  }

  .wp-admin [data-{{$block['id']}}] .bikmo3columnsblock-list .bikmo3columnsblock-list__item .bikmo3columnsblock-item__icon .bikmo3columnsblock-item__icon-bg-green {
    top: 4px;
    left: 4px;
    clip-path: polygon(0% 0%, 100% 0, 96% 96%, 0% 100%);
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: 1;
    background-color: #3cf1c6;
  }
  
</style>