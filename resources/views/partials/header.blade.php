@php $is_partners_page = get_field('page_partner_header') == 'Yes' ? true : false;  @endphp

<header class="header {{ App\header_styles(get_field('page_header_style')) }} {{ ($is_partners_page ? 'header--partners' : '') }}">
  <div class="wrapper">
    @if(!$is_partners_page)
    <a class="brand header__brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
      {!! App\wp_image(get_field('main_logo_white', 'options'), 'full', false, ['class' => 'brand__image brand__image--white']) !!}
      {!! App\wp_image(get_field('main_logo_dark', 'options'), 'full', false, ['class' => 'brand__image brand__image--dark']) !!}
    </a>

    <nav class="header__nav">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => false, 'walker' => new Header_Main_Walker()]) !!}
      @endif

      <div class="header__cta header_cta--mobile {{ ( have_rows('header_buttons', 'option') && count(get_field('header_buttons', 'option')) == 2 ? 'header__cta-list-two' : '') }}">
        @if( have_rows('header_buttons', 'option'))
          @while( have_rows('header_buttons', 'option') ) 
            @php the_row() @endphp
            
            @include('partials.buttons', ['extra_btn_classes' => 'btn--sm'])

          @endwhile
        @endif
      </div>
    </nav>

    <div class="header__cta {{ ( have_rows('header_buttons', 'option') && count(get_field('header_buttons', 'option')) == 2 ? 'header__cta-list-two' : '') }}">
      @if( have_rows('header_buttons', 'option'))
        @while( have_rows('header_buttons', 'option') ) 
          @php the_row() @endphp

          @include('partials.buttons', ['extra_btn_classes' => 'btn--sm'])

        @endwhile
      @endif
    </div>

    <div class="hamburgher header__hamburgher">
      <svg class="menu-svg" width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="21" height="3" fill="white"/>
        <rect y="7" width="21" height="3" fill="white"/>
        <rect y="14" width="21" height="3" fill="white"/>
      </svg>

      <svg class="close-svg" width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="0.0146484" y="14.9988" width="21" height="3" transform="rotate(-45 0.0146484 14.9988)" fill="#1A1A1A"/>
        <rect x="2.13672" width="21" height="3" transform="rotate(45 2.13672 0)" fill="#1A1A1A"/>
      </svg>
    </div>
    @endif

    @if($is_partners_page)

      @php $link = get_field('page_partner_header_link');  $link_url = '';
      if ($link) {
        $link_url = $link['url'];
      }
      @endphp


      <div class="partners_brand_wrapper">
        <a class="brand header__brand partners_brand__desktop" href="{{ $link_url }}" title="{{ the_title() }}">
          {!! App\wp_image(get_field('main_logo_white', 'options'), 'full', false, ['class' => 'brand__image brand__image--white']) !!}
          {!! App\wp_image(get_field('main_logo_dark', 'options'), 'full', false, ['class' => 'brand__image brand__image--dark']) !!}
        </a>

        <a class="brand header__brand partners_brand__mobile" href="{{ $link_url }}" title="{{ the_title() }}">
          <svg width="23" height="33" viewBox="0 0 23 33" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.0175602 0L0 26.0546L12.178 19.0357V6.76681L0.0175602 0Z" fill="#3CF1C6"/>
            <path d="M14.9968 19.0372V20.5931L13.5218 21.4406L2.83203 27.6033L10.7341 32.0015L22.9165 25L22.9209 12.7355L14.9925 8.32422L14.9968 19.0372Z" fill="#3CF1C6"/>
          </svg>
        </a>

        @if(get_field('page__partner_header_logo'))
          <span class="header__plus">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.10209 6.09302V10H3.89791V6.09302H0V3.88372H3.89791V0H6.10209V3.88372H10V6.09302H6.10209Z" fill="#1A1A1A"/>
            </svg>
          </span>

          <a class="brand header__brand brand--partner"  href="{{ $link_url }}" title="{{ the_title() }}" >
            {!! App\wp_image(get_field('page__partner_header_logo'), 'full', false, ['class' => 'brand__image']) !!}
          </a>
        @endif
      </div>


      <nav class="header__nav">
        <div class="header__cta header_cta--mobile {{ ( have_rows('partners_buttons_header_buttons') && count(get_field('partners_buttons_header_buttons')) == 2 ? 'header__cta-list-two' : '') }}">
          @if( have_rows('partners_buttons_header_buttons'))
            @while( have_rows('partners_buttons_header_buttons') ) 
            @php the_row() @endphp
              <?php $link = get_sub_field('link'); ?>
              <?php if ($link): ?>
                  <?php
                      $link_url = $link['url'];
                      $link_title = $link['title'];
                      $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                      <a href="<?php echo esc_url( $link_url ); ?>" class="btn btn--sm <?php echo App\btn_styles(get_sub_field('style')); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                          <?php echo esc_html( $link_title ); ?>
                      </a>
              <?php endif; ?>
            @endwhile
          @endif
        </div>
      </nav>

      <div class="header__cta {{ ( have_rows('partners_buttons_header_buttons') && count(get_field('partners_buttons_header_buttons')) == 2 ? 'header__cta-list-two' : '') }}">
        @if( have_rows('partners_buttons_header_buttons'))
          @while( have_rows('partners_buttons_header_buttons') ) 
          @php the_row() @endphp
            <?php $link = get_sub_field('link'); ?>
            <?php if ($link): ?>
                <?php
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" class="btn btn--sm <?php echo App\btn_styles(get_sub_field('style')); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                    </a>
            <?php endif; ?>
          @endwhile
        @endif
      </div>

      <div class="hamburgher header__hamburgher">
        <svg class="menu-svg" width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="21" height="3" fill="white"/>
          <rect y="7" width="21" height="3" fill="white"/>
          <rect y="14" width="21" height="3" fill="white"/>
        </svg>

        <svg class="close-svg" width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.0146484" y="14.9988" width="21" height="3" transform="rotate(-45 0.0146484 14.9988)" fill="#1A1A1A"/>
          <rect x="2.13672" width="21" height="3" transform="rotate(45 2.13672 0)" fill="#1A1A1A"/>
        </svg>
      </div>
    @endif

  </div>
</header>

@if(get_field('page_has_navigation'))
<div class="sub-header">
  <div class="wrapper">
    <div class="sub-header__layer"></div>
    <div class="sub-header__left">
      {!! App\wp_image(get_field('page_navigation_icon'), 'full', false, ['class' => 'sub-header__image']) !!}
      <span class="sub-header__title body-text body-text--weight-bold">{!! get_field('page_navigation_title') !!}</span>
    </div>

    <div class="sub-header__right">
      <svg class="sub-header__arrow" width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1.41406" y="0.757446" width="10" height="2" transform="rotate(45 1.41406 0.757446)" fill="#fff"/>
        <rect x="14.1426" y="2.17151" width="10" height="2" transform="rotate(135 14.1426 2.17151)" fill="#fff"/>
      </svg>

      @if(have_rows('page_navigation_menu'))
      <ul class="sub-header__links">
        @while(have_rows('page_navigation_menu'))
        @php the_row(); @endphp        
        
        @if(get_sub_field('current_page') == true)
          <li class="page_item current_page_item">
            <span>
              {{ the_sub_field('text') }}
            </span>
          </li>
        @else
          <li class="page_item ">
            @if(get_sub_field('link_type') == 'Page')
            <a href="{{ the_sub_field('page') }}">
              {{ the_sub_field('text') }}
            </a>
            @else
            <a href="{{ the_sub_field('link') }}">
              {{ the_sub_field('text') }}
            </a>
            @endif
          </li>
        @endif

        @endwhile
      </ul>
      @endif
    </div>

    @if(have_rows('page_navigation_menu'))
      <ul class="sub-header__links--mobile">
        @while(have_rows('page_navigation_menu'))
        @php the_row(); @endphp        
        <li class="page_item {{ (get_sub_field('current_page') == true ? 'current_page_item' : '') }}">
          @if(get_sub_field('link_type') == 'Page')
          <a href="{{ the_sub_field('page') }}">
            {{ the_sub_field('text') }}
          </a>
          @else
          <a href="{{ the_sub_field('link') }}">
            {{ the_sub_field('text') }}
          </a>
          @endif
        </li>

        @endwhile
      </ul>
    @endif

  </div>
</div>
@endif