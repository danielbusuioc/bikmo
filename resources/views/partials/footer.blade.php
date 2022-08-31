<footer class="footer">

  <div class="footer-top">
    <div class="footer-top__wrapper">
      <div class="footer-subscribe footer-widget" data-textdefault="{{ the_field('submit_button_text_default', 'options') }}" data-textmobile="{{ the_field('submit_button_text_mobile', 'options') }}">
        <div class="wrapper">
          <h2 class="footer-subscribe__title footer-widget__title">{!! the_field('subscribe_title', 'options') !!}</h2>
          <div class="footer-subscribe__description footer-widget__description body-text body-text--size-large">{!! the_field('subscribe_description', 'options') !!}</div>

          @if(!empty(get_field('subscribe_formular', 'options')) && !is_null(get_field('subscribe_formular', 'options')))
          <div class="footer-subscribe__form">
            {!! do_shortcode('[contact-form-7 id="' . get_field('subscribe_formular', 'options')->ID . '" title="' . get_field('subscribe_formular', 'options')->post_title . '"]') !!}
          </div>
          @endif
        </div>
      </div>

      <div class="footer-socials footer-widget">
        <div class="footer-socials__background">
          <svg class="footer-socials--desktop" width="975" height="640" viewBox="0 0 975 640" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="35" y="19.9023" width="960" height="600" fill="#F2F2F2" transform="skewX(-2.56868)" />
            <rect x="29.3438" width="10" height="640" transform="rotate(2.56868 29.3438 0)" fill="#3CF1C6" />
          </svg>
          <svg class="footer-socials--mobile" width="375" height="345" viewBox="0 0 375 345" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="m-44.18625,15.81403l419.18625,-15.81403l0,345l-375,0l-0.93024,-345z" fill="#F2F2F2" />
            <path fill="#3CF1C6" d="m0,12l375,-12l0,5l-375,12l0,-5z" />
          </svg>
        </div>

        <div class="wrapper">
          <h2 class="footer-socials__title footer-widget__title">{!! the_field('socials_title', 'options') !!}</h2>
          <div class="footer-socials__description footer-widget__description body-text body-text--size-large">{!! the_field('socials_description', 'options') !!}</div>

          <div class="socials-links">
            @if(strlen(get_field('facebook_link', 'options')) > 0)
            <a href="{{ get_field('facebook_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44.9047 22.6475C44.9047 10.4686 34.8555 0.601074 22.4524 0.601074C10.0492 0.601074 0 10.4686 0 22.6475C0 33.6707 8.14804 42.8271 18.9215 44.4272V29.0481H13.2179V22.6475H18.9215V17.8471C18.9215 12.3355 22.2713 9.22407 27.3412 9.22407C29.8761 9.22407 32.4111 9.66855 32.4111 9.66855V15.0913H29.6045C26.798 15.0913 25.8926 16.7803 25.8926 18.5582V22.6475H32.1395L31.1436 29.0481H25.8926V44.4272C36.6662 42.8271 44.9047 33.6707 44.9047 22.6475Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
            @if(strlen(get_field('twitter_link', 'options')) > 0)
            <a href="{{ get_field('twitter_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="48" height="37" viewBox="0 0 48 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M42.4593 9.19348C44.27 7.86003 45.8996 6.25989 47.167 4.39305C45.5374 5.10423 43.6362 5.63761 41.735 5.8154C43.7268 4.65975 45.1753 2.88181 45.8996 0.659387C44.0889 1.72615 42.0066 2.52622 39.9243 2.97071C38.1137 1.10387 35.6693 0.0371094 32.9532 0.0371094C27.7023 0.0371094 23.4472 4.21526 23.4472 9.37128C23.4472 10.0825 23.5377 10.7936 23.7188 11.5048C15.8424 11.0603 8.78073 7.32665 4.07298 1.72615C3.25817 3.0596 2.8055 4.65975 2.8055 6.43768C2.8055 9.63797 4.43511 12.4827 7.06059 14.1717C5.52151 14.0828 3.98244 13.7272 2.71497 13.016V13.1049C2.71497 17.6387 5.97419 21.3724 10.3198 22.2613C9.59554 22.4391 8.6902 22.6169 7.87539 22.6169C7.24166 22.6169 6.69845 22.528 6.06472 22.4391C7.24166 26.1728 10.7725 28.8397 14.937 28.9286C11.6778 31.4177 7.60379 32.9289 3.16763 32.9289C2.35283 32.9289 1.62857 32.84 0.904297 32.7511C5.06885 35.4181 10.0482 36.9293 15.4802 36.9293C32.9532 36.9293 42.4593 22.7947 42.4593 10.438C42.4593 9.99356 42.4593 9.63797 42.4593 9.19348Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
            @if(strlen(get_field('google_link', 'options')) > 0)
            <a href="{{ get_field('google_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44.3475 23.1814C44.3475 21.759 44.1664 20.6922 43.9853 19.5366H22.6194V27.0928H35.2941C34.8414 30.382 31.4917 36.6048 22.6194 36.6048C14.924 36.6048 8.67716 30.382 8.67716 22.648C8.67716 10.2913 23.5247 4.60192 31.4916 12.1582L37.648 6.37986C33.755 2.82398 28.5946 0.601562 22.6194 0.601562C10.1257 0.601562 0.166992 10.4691 0.166992 22.648C0.166992 34.9157 10.1257 44.6944 22.6194 44.6944C35.5657 44.6944 44.3475 35.8047 44.3475 23.1814Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
            @if(strlen(get_field('instagram_link', 'options')) > 0)
            <a href="{{ get_field('instagram_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.6725 9.96367C14.8783 9.96367 10.2611 14.5863 10.2611 20.1868C10.2611 25.8762 14.8783 30.4099 20.6725 30.4099C26.3761 30.4099 31.0839 25.8762 31.0839 20.1868C31.0839 14.5863 26.3761 9.96367 20.6725 9.96367ZM20.6725 26.8541C16.9606 26.8541 13.8825 23.9205 13.8825 20.1868C13.8825 16.542 16.8701 13.6084 20.6725 13.6084C24.3844 13.6084 27.372 16.542 27.372 20.1868C27.372 23.9205 24.3844 26.8541 20.6725 26.8541ZM33.8904 9.60808C33.8904 8.27463 32.804 7.20786 31.446 7.20786C30.088 7.20786 29.0016 8.27463 29.0016 9.60808C29.0016 10.9415 30.088 12.0083 31.446 12.0083C32.804 12.0083 33.8904 10.9415 33.8904 9.60808ZM40.771 12.0083C40.5899 8.80801 39.8656 5.96331 37.5118 3.65199C35.1579 1.34067 32.2608 0.629498 29.0016 0.451705C25.6519 0.273911 15.6026 0.273911 12.2529 0.451705C8.99364 0.629498 6.1871 1.34067 3.74268 3.65199C1.38881 5.96331 0.664524 8.80801 0.483457 12.0083C0.302389 15.2975 0.302389 25.165 0.483457 28.4542C0.664524 31.6545 1.38881 34.4103 3.74268 36.8105C6.1871 39.1218 8.99364 39.833 12.2529 40.0108C15.6026 40.1886 25.6519 40.1886 29.0016 40.0108C32.2608 39.833 35.1579 39.1218 37.5118 36.8105C39.8656 34.4103 40.5899 31.6545 40.771 28.4542C40.952 25.165 40.952 15.2975 40.771 12.0083ZM36.4254 31.9212C35.7916 33.6991 34.3431 35.0326 32.6229 35.7438C29.9069 36.8105 23.5696 36.5438 20.6725 36.5438C17.6849 36.5438 11.3475 36.8105 8.72203 35.7438C6.91136 35.0326 5.55335 33.6991 4.82908 31.9212C3.74267 29.3432 4.01428 23.1204 4.01428 20.1868C4.01428 17.3421 3.74267 11.1193 4.82908 8.45242C5.55335 6.76338 6.91136 5.42993 8.72203 4.71875C11.3475 3.65199 17.6849 3.91868 20.6725 3.91868C23.5696 3.91868 29.9069 3.65199 32.6229 4.71875C34.3431 5.34103 35.7011 6.76338 36.4254 8.45242C37.5118 11.1193 37.2402 17.3421 37.2402 20.1868C37.2402 23.1204 37.5118 29.3432 36.4254 31.9212Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
            @if(strlen(get_field('youtube_link', 'options')) > 0)
            <a href="{{ get_field('youtube_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="53" height="36" viewBox="0 0 53 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M51.3035 6.34714C50.7383 4.14652 48.9485 2.40437 46.7819 1.85421C42.7314 0.753906 26.7176 0.753906 26.7176 0.753906C26.7176 0.753906 10.6097 0.753906 6.55913 1.85421C4.39256 2.40437 2.60279 4.14652 2.0376 6.34714C0.907213 10.1982 0.907227 18.4505 0.907227 18.4505C0.907227 18.4505 0.907213 26.6111 2.0376 30.5539C2.60279 32.7545 4.39256 34.405 6.55913 34.9552C10.6097 35.9638 26.7176 35.9638 26.7176 35.9638C26.7176 35.9638 42.7314 35.9638 46.7819 34.9552C48.9485 34.405 50.7383 32.7545 51.3035 30.5539C52.4338 26.6111 52.4338 18.4505 52.4338 18.4505C52.4338 18.4505 52.4338 10.1982 51.3035 6.34714ZM21.4425 25.8776V11.0234L34.8187 18.4505L21.4425 25.8776Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
            @if(strlen(get_field('strava_link', 'options')) > 0)
            <a href="{{ get_field('strava_link', 'options') }}" target="_blank" class="socials-links__item">
              <svg width="34" height="47" viewBox="0 0 34 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1042 0.742188L0.433594 26.7001H8.49108L14.1042 16.388L19.7172 26.7001H27.6843L14.1042 0.742188ZM27.6843 26.7001L23.7008 34.6119L19.7172 26.7001H13.561L23.7008 46.2574L33.8405 26.7001H27.6843Z" fill="#1A1A1A" />
              </svg>
            </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-middle">
    <div class="wrapper">
      <div class="footer-middle__left">
        <a class="brand footer__brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name', 'display') }}">
          {!! App\wp_image(get_field('footer_logo', 'options'), 'full', false, ['class' => 'brand__image brand__image--white']) !!}
        </a>

        @php 
 
        $current_blog_id = get_current_blog_id();
        $current_blog = null;

        $countries = [
          '/' => 'International (en)',
          '/uk/' => 'United Kingdom',
          '/ie/' => 'Ireland',
          '/de/' => 'Germany',
          '/at/' => 'Austria'
        ];

        $available_sites = [];
        $all_sites = get_sites();

        for($i = 0; $i < count($all_sites); $i ++) {

          $path = $all_sites[$i]->path;

          $aux = [];
          $aux['blog_id'] = $all_sites[$i]->blog_id;
          $aux['domain'] = $all_sites[$i]->domain;
          $aux['path'] = $path;
          $aux['current'] = ($current_blog_id == $all_sites[$i]->blog_id ? true : false);
          $aux['country'] = $countries[$path];

          if ($path == '/') {
            $aux['icon'] = 'images/flags/_united-nations.png';
          } else if ($path == '/uk/') {
            $aux['icon'] = 'images/flags/GB.png';
          } else {
            $path = str_replace('/', '', $all_sites[$i]->path);
            $aux['icon'] = 'images/flags/' . strtoupper($path) . '.png';
          }

          $available_sites[] = $aux;

          if($current_blog_id == $all_sites[$i]->blog_id) {
            $current_blog = $aux;
          }
        }
        @endphp

        <div class="site-chooser">
          <div class="site-chooser__item site-chooser__selected">
            <div class="site-chooser__flag">
              <img src="@asset($current_blog['icon'])" alt="{{ $current_blog['country'] }} Flag">
            </div>
            <div class="site-chooser__label">{{ $current_blog['country'] }}</div>
            
            <div class="site-chooser__arrow">
              <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.3" d="M15.5039 1.15625L14.8359 0.453125C14.6602 0.277344 14.3789 0.277344 14.2383 0.453125L7.875 6.81641L1.47656 0.453125C1.33594 0.277344 1.05469 0.277344 0.878906 0.453125L0.210938 1.15625C0.0351562 1.29688 0.0351562 1.57812 0.210938 1.75391L7.55859 9.10156C7.73438 9.27734 7.98047 9.27734 8.15625 9.10156L15.5039 1.75391C15.6797 1.57812 15.6797 1.29688 15.5039 1.15625Z" fill="white"/>
              </svg>
            </div>
          </div>
          <div class="site-chooser__list">
            @foreach($available_sites as $site_item)
              @if(!$site_item['current'])
                <a href="https://{{ $site_item['domain'] }}{{ $site_item['path'] }}" class="site-list__item">
                  <div class="site-chooser__flag">
                    <img src="@asset($site_item['icon'])"  alt="{{ $site_item['country'] }} Flag">
                  </div>
                  <div class="site-chooser__label">{{ $site_item['country'] }}</div>
                </a>
              @endif
            @endforeach
          </div>
        </div>
      </div>

      <div class="footer-middle__right">
        @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav', 'container' => false]) !!}
        @endif
      </div>
    </div>
  </div>


  <div class="footer-bottom">
    <div class="wrapper">
      <div class="footer-bottom__left">

        <div class="footer-bottom__menu">
          @if (has_nav_menu('footer_secondary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_secondary_navigation', 'menu_class' => 'nav nav--secondary', 'container' => false]) !!}
          @endif

          <div class="footer-bottom__menu--certificates footer__certificates">
            @if( have_rows('footer_certificates', 'options'))
            @while( have_rows('footer_certificates', 'options') )
            @php the_row() @endphp
            {!! App\wp_image(get_sub_field('image'), 'full', false, ['class' => 'footer__certificates__image']) !!}
            @endwhile
            @endif
          </div>
        </div>

        <div class="footer__description body-text body-text--size-small">
          {!! the_field('footer_description', 'options') !!}
        </div>

        <div class="footer__copyrights body-text body-text--size-small">
          {!! the_field('footer_copyrights', 'options') !!}
        </div>
      </div>

      <div class="footer-bottom__right footer__certificates">
        @if( have_rows('footer_certificates', 'options'))
        @while( have_rows('footer_certificates', 'options') )
        @php the_row() @endphp
        {!! App\wp_image(get_sub_field('image'), 'full', false, ['class' => 'footer__certificates__image']) !!}
        @endwhile
        @endif
      </div>
    </div>
  </div>


</footer>