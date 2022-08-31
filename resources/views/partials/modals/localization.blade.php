<div id="client_localization_modal" class="popup-modal localization-modal" data-excluded="{{ get_field('show_modal_if_the_users_country_is_different_than_this', 'options') }}">
    <div id="client_localization_modal__dark-layer" class="popup-modal__dark-layer"></div>
    <div class="popup-modal__wrapper">

        <main class="localization-wrapper">
            <div class="localization-title body-text body-text--weight-bold body-text--size-large">{{ get_field('localization_modal_title', 'options') }}</div>

            <div class="localization-subtitle body-text ">{{ get_field('localization_modal_subtitle', 'options') }}</div>

            <div class="localization-btns">

            @php 
 
                $current_blog_id = get_current_blog_id();
                $current_blog = null;

                $countries = [
                    '/' => 'ONU',
                    '/uk/' => 'UK',
                    '/ie/' => 'IE',
                    '/de/' => 'DE',
                    '/at/' => 'AT'
                ];

                $current_btn = [];
                $rest_of_btns = [];

                $all_sites = get_sites();

                for ($i = 0; $i < count($all_sites); $i ++) {

                    $path = $all_sites[$i]->path;

                    if($current_blog_id == $all_sites[$i]->blog_id) {

                        $current_btn['link'] = '';
                        $current_btn['label'] = 'CONTINUE TO BIKMO ' . $countries[$path];
                         
                        if ($path == '/') {
                            $current_btn['flag'] = 'images/flags/_united-nations.png';
                        } else if ($path == '/uk/') {
                            $current_btn['flag'] = 'images/flags/GB.png';
                        } else {
                            $path = str_replace('/', '', $all_sites[$i]->path);
                            $current_btn['flag'] = 'images/flags/' . strtoupper($path) . '.png';
                        }
                    } else {
                        $aux = [];

                        $aux['domain'] = $all_sites[$i]->domain;
                        $aux['path'] = $path;
                        $aux['label'] = 'BIKMO ' . $countries[$path];
                         
                        if ($path == '/') {
                            $aux['flag'] = 'images/flags/_united-nations.png';
                        } else if ($path == '/uk/') {
                            $aux['flag'] = 'images/flags/GB.png';
                            $rest_of_btns[] = $aux;
                        } else {
                            $path = str_replace('/', '', $all_sites[$i]->path);
                            $aux['flag'] = 'images/flags/' . strtoupper($path) . '.png';
                            $rest_of_btns[] = $aux;
                        }


                    }

                }

            @endphp


                <div class="btn btn--sm btn--dark-border current-country-link">
                    <span class="btn__flag">    
                        <img src="@asset($current_btn['flag'])">
                    </span>
                    <span class="btn__label">{{ $current_btn['label'] }}</span>

                    <svg class="btn__arrow" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.33594 0.816406L5.78906 1.33594C5.65234 1.47266 5.65234 1.69141 5.78906 1.80078L10.0273 6.03906H0.703125C0.511719 6.03906 0.375 6.20312 0.375 6.36719V7.13281C0.375 7.32422 0.511719 7.46094 0.703125 7.46094H10.0273L5.78906 11.7266C5.65234 11.8359 5.65234 12.0547 5.78906 12.1914L6.33594 12.7109C6.44531 12.8477 6.66406 12.8477 6.80078 12.7109L12.5156 6.99609C12.6523 6.85938 12.6523 6.66797 12.5156 6.53125L6.80078 0.816406C6.66406 0.679688 6.44531 0.679688 6.33594 0.816406Z" fill="#1A1A1A"/>
                    </svg>
                </div>
        

                @foreach($rest_of_btns as $btn)
                    <a class="btn btn--sm btn--dark-border" href="https://{{ $btn['domain'] }}{{ $btn['path'] }}">
                        <span class="btn__flag">    
                            <img src="@asset($btn['flag'])">
                        </span>
                        <span class="btn__label">{{ $btn['label'] }}</span>

                        <svg class="btn__arrow" width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.33594 0.816406L5.78906 1.33594C5.65234 1.47266 5.65234 1.69141 5.78906 1.80078L10.0273 6.03906H0.703125C0.511719 6.03906 0.375 6.20312 0.375 6.36719V7.13281C0.375 7.32422 0.511719 7.46094 0.703125 7.46094H10.0273L5.78906 11.7266C5.65234 11.8359 5.65234 12.0547 5.78906 12.1914L6.33594 12.7109C6.44531 12.8477 6.66406 12.8477 6.80078 12.7109L12.5156 6.99609C12.6523 6.85938 12.6523 6.66797 12.5156 6.53125L6.80078 0.816406C6.66406 0.679688 6.44531 0.679688 6.33594 0.816406Z" fill="#1A1A1A"/>
                        </svg>
                    </a>
                @endforeach

            </div>
        </main>


    </div>
</div>