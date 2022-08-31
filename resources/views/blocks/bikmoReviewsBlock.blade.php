{{--
  Title: BikmoReviewsBlock
  Description: Bikmo Reviews Block
  Category: common
  Icon: dashicons-block-default
  Keywords: bikmo reviews block
  Mode: preview
--}}

@php 

$feefoMerchantID = get_field('bikmo_reviews_block_feefo_identifier');
$feefoText = get_field('bikmo_reviews_block_feefo_text');
$minRating = get_field('bikmo_reviews_block_min_rating');
$maxCount = get_field('bikmo_reviews_block_reviews_count');
$authorPlaceholder = get_field('bikmo_reviews_block_author_placeholder');
$feefoSummary = App\get_bikmo_reviews_summary($feefoMerchantID);

$ok = true;
$errorText = '';

if (!$feefoMerchantID) {
    $ok = false;
    $errorText = 'Merchant Identifiear is required';
}
if (!$minRating) {
    $ok = false;
    $errorText = 'Minimum Rating Value is required';
}
if (!$maxCount) {
    $ok = false;
    $errorText = 'Maximum reviews count is required';
}
@endphp

<section data-{{ $block['id'] }} class="{{ $block['classes'] }}">
    <div class="bikmoreviewsblock_layer"></div>
    <div class="wrapper">
        
        <div class="bikmoreviewsblock__header">
            <h2 class="bikmoreviewsblock__title block_title">{!! the_field('bikmo_reviews_block_title') !!}</h2>

            <div class="bikmoreviewsblock__summary">
                @if(is_null($feefoSummary))
                <h4>Summary unavailable for this merchant.</h4>
                @else
                
                <div class="bikmoreviewsblock__summary-upper">
                    <div class="bikmoreviewsblock__summary-logo">
                        <svg width="105" height="25" viewBox="0 0 105 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M28.2119 17.3536V16.8095C28.2119 10.3095 24.3341 6.32422 18.6526 6.32422C17.4185 6.32412 16.1967 6.56465 15.0586 7.03177C13.9205 7.49889 12.889 8.18323 12.0243 9.04481C11.164 9.88127 10.4849 10.8789 10.0278 11.9781C9.5707 13.0773 9.34489 14.2553 9.3639 15.4419C9.34899 17.8566 10.3044 20.1805 12.0243 21.9125C12.8773 22.8211 13.9201 23.5395 15.0819 24.0191C16.2438 24.4986 17.4974 24.7281 18.7578 24.6919C20.606 24.7595 22.4308 24.2695 23.9848 23.2883C25.5388 22.3071 26.7469 20.8822 27.4454 19.2066H21.6136C20.8622 19.8702 19.8745 20.2188 18.8631 20.1772C17.9403 20.2944 17.006 20.0697 16.244 19.5472C15.4819 19.0248 14.9471 18.2423 14.7447 17.3536H28.2119ZM22.9363 13.736H14.6095C14.8502 12.8766 15.3946 12.1287 16.146 11.6251C16.8973 11.1216 17.8068 10.8951 18.7127 10.986C19.629 10.9199 20.5416 11.1544 21.3064 11.6524C22.0713 12.1504 22.6448 12.8835 22.9363 13.736Z" fill="#202020"/>
                            <path d="M48.0968 17.3536V16.8095C48.0968 10.2948 44.1739 6.32422 38.4925 6.32422C37.2687 6.3335 36.0588 6.57853 34.9318 7.04533C33.8048 7.51213 32.7828 8.19156 31.9242 9.04481C31.0552 9.87941 30.3645 10.8748 29.8922 11.973C29.42 13.0713 29.1758 14.2504 29.1737 15.4419C29.1523 17.8522 30.0965 20.1749 31.804 21.9125C32.6609 22.8252 33.7083 23.5471 34.8752 24.0292C36.0422 24.5113 37.3014 24.7423 38.5676 24.7066C40.4176 24.7731 42.2436 24.2809 43.7978 23.297C45.352 22.313 46.5591 20.8849 47.2552 19.2066H41.4535C40.702 19.8702 39.7143 20.2188 38.7029 20.1772C37.7777 20.2983 36.8398 20.0755 36.0744 19.5527C35.3091 19.0299 34.7721 18.2451 34.5696 17.3536H48.0968ZM42.7761 13.736H34.4493C34.6904 12.8739 35.2371 12.1239 35.9916 11.62C36.7462 11.1162 37.6593 10.8914 38.5676 10.986C39.4824 10.9181 40.3939 11.1521 41.1568 11.6506C41.9196 12.1491 42.4898 12.8833 42.7761 13.736Z" fill="#202020"/>
                            <path d="M1.92388 10.7345V24.2786H7.07927V10.7345H9.15345V6.83746H7.07927V6.41099C7.07927 4.82276 7.51515 4.30805 9.01818 4.30805H9.13842V0.793346H8.32679C3.95297 0.763934 1.89382 2.45511 1.89382 6.1904C1.89382 6.38158 1.89382 6.60217 1.89382 6.83746H0V10.7345H1.92388Z" fill="#202020"/>
                            <path d="M50.0511 10.7341V24.2783H55.1915V10.7341H57.2807V6.83709H55.1915V6.41062C55.1915 4.82238 55.5522 4.30768 57.1454 4.30768H57.2807V0.792969H56.454C52.0652 0.792969 50.006 2.48415 50.006 6.21944C50.006 6.41062 50.006 6.63121 50.006 6.8665H48.0972V10.7341H50.0511Z" fill="#202020"/>
                            <path d="M76.0983 15.4387C76.0681 13.6266 75.492 11.8636 74.442 10.3706C73.3921 8.87752 71.9151 7.7209 70.1962 7.04566C68.4773 6.37042 66.5929 6.20661 64.7793 6.57475C62.9656 6.9429 61.3034 7.82662 60.0008 9.11515C59.1313 9.95094 58.4424 10.9492 57.9751 12.0507C57.5077 13.1522 57.2715 14.3343 57.2804 15.5269C57.253 17.9181 58.1931 20.2229 59.8956 21.9387C60.7508 22.8496 61.7958 23.5703 62.96 24.0523C64.1242 24.5344 65.3806 24.7664 66.6442 24.7328C67.8987 24.7625 69.1461 24.5403 70.3094 24.0799C71.4727 23.6196 72.5272 22.9309 73.4079 22.0563C74.2941 21.2035 74.9906 20.1807 75.4536 19.052C75.9166 17.9233 76.1361 16.7131 76.0983 15.4975V15.4387ZM70.8828 15.6299C70.8662 16.6906 70.4334 17.7044 69.6738 18.4615C68.9143 19.2185 67.8863 19.6608 66.8027 19.6967C65.7191 19.7326 64.6629 19.3594 63.8528 18.6544C63.0426 17.9493 62.5407 16.9664 62.4508 15.9093V15.6299C62.4073 14.5474 62.8 13.4915 63.5444 12.6895C64.2887 11.8876 65.3251 11.4037 66.4305 11.342C67.5359 11.2803 68.6219 11.6457 69.4546 12.3597C70.2873 13.0737 70.8002 14.079 70.8828 15.1593V15.6299Z" fill="#202020"/>
                            <path d="M84.1697 12.6169C82.9462 12.5372 81.7942 12.0247 80.9286 11.175C80.0629 10.3254 79.5428 9.19658 79.4652 7.99928H90.4824V7.88164C90.4824 3.64634 87.7168 0.808105 83.8841 0.808105C82.9827 0.779367 82.0849 0.932139 81.2464 1.25695C80.4079 1.58175 79.6465 2.07167 79.0095 2.6963C78.3725 3.32093 77.8734 4.06696 77.5433 4.88811C77.2132 5.70926 77.059 6.58802 77.0904 7.46987C77.0663 9.22391 77.7534 10.9159 79.0012 12.1754C80.2491 13.435 81.9562 14.1595 83.7488 14.1905H83.824C85.2079 14.1914 86.5568 13.7656 87.6793 12.9737C88.8017 12.1817 89.6406 11.0637 90.0766 9.7787H88.9643C88.5595 10.6149 87.9214 11.3222 87.1237 11.8191C86.3259 12.3161 85.4009 12.5824 84.4552 12.5875H84.1697" fill="#202020"/>
                            <path d="M98.1631 12.6169C99.3861 12.54 100.538 12.0279 101.402 11.1773C102.266 10.3268 102.782 9.19638 102.853 7.9993H91.8203V7.88165C91.8203 3.64636 94.5859 0.808122 98.4186 0.808122C99.3213 0.77927 100.22 0.932458 101.06 1.25816C101.9 1.58386 102.662 2.0751 103.299 2.70133C103.936 3.32756 104.435 4.07538 104.764 4.89827C105.093 5.72116 105.246 6.60153 105.212 7.48459C105.226 8.35417 105.064 9.21788 104.736 10.0261C104.408 10.8343 103.92 11.5711 103.3 12.1943C102.68 12.8174 101.94 13.3145 101.123 13.657C100.306 13.9996 99.4277 14.1809 98.5388 14.1905C97.153 14.1923 95.8017 13.7671 94.6766 12.9752C93.5516 12.1833 92.71 11.0649 92.2712 9.77871H93.3835C93.7883 10.6127 94.4272 11.3168 95.2256 11.809C96.024 12.3011 96.9489 12.5609 97.8925 12.5581H98.1932" fill="#202020"/>
                        </svg>
                    </div>
                    <div class="bikmoreviewsblock__summary-rating">
                        <svg class="bikmoreviewsblock__summary-rating-star" width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                        </svg>
                        <span class="bikmoreviewsblock__summary-rating-big">{{ $feefoSummary['rating']['rating'] }}</span>   / {{ $feefoSummary['rating']['max'] }}
                    </div>
                </div>

                <div class="bikmoreviewsblock__summary-lower">
                    @if($feefoText)
                        {!! preg_replace('/\[(.*?)\]/', $feefoSummary['rating']['service']['count'], $feefoText) !!}
                    @endif
                </div>
                @endif
            </div>
        </div>


        @if($ok)
        <div class="bikmoreviewsblock__list">
            <div class="bikmoreviewsblock__slider-list">
                @foreach(App\get_bikmo_reviews_list($feefoMerchantID, $minRating, $maxCount, $authorPlaceholder) as $review_obj)
                    <div class="bikmoreviewsblock__item">

                        <div class="bikmoreviewsblock__review-stars bikmoreviewsblock__review-stars--rating-{{ $review_obj['service']['rating']['rating'] }}">
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                            </svg>
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                            </svg>
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                            </svg>
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                            </svg>
                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00821 0.931979C9.41034 -0.30564 11.1612 -0.30564 11.5634 0.931979L13.0001 5.35393C13.18 5.90741 13.6958 6.28215 14.2777 6.28215H18.9272C20.2285 6.28215 20.7696 7.94735 19.7168 8.71224L15.9553 11.4452C15.4845 11.7872 15.2875 12.3936 15.4673 12.947L16.9041 17.369C17.3062 18.6066 15.8897 19.6358 14.8369 18.8709L11.0754 16.138C10.6046 15.7959 9.96702 15.7959 9.4962 16.138L5.73466 18.8709C4.68188 19.6358 3.26537 18.6066 3.6675 17.369L5.10428 12.947C5.28412 12.3936 5.08711 11.7872 4.61629 11.4452L0.854751 8.71224C-0.198031 7.94735 0.343028 6.28215 1.64434 6.28215H6.29385C6.87582 6.28215 7.39159 5.90741 7.57143 5.35393L9.00821 0.931979Z" fill="white"/>
                            </svg>
                        </div>

                        <div class="bikmoreviewsblock__review-title">{{ $review_obj['service']['title'] }}</div>
                        <div class="bikmoreviewsblock__review-text">{{ $review_obj['service']['review'] }}</div>
                        
                        <div class="bikmoreviewsblock__review-footer">
                            <div class="bikmoreviewsblock__review-author">{{ $review_obj['customer']['display_name'] }}</div>
                            <div class="bikmoreviewsblock__review-lineb">-</div>
                            <div class="bikmoreviewsblock__review-date">{{ App\bikmo_time_elapsed_string($review_obj['service']['created_at']) }}</div>
                        </div>
 
                    </div>
                @endforeach
            </div>
        </div>
        @else
            <h4>{{ $errorText }}</h4>
        @endif

        @if( have_rows('header_buttons') )
            <div class="block_cta_list bikmoreviewsblock__buttons">
            @while( have_rows('header_buttons') ) 
                @php the_row() @endphp
                <a href="{{ the_sub_field('link') }}" class="btn {{ App\btn_styles(get_sub_field('style')) }}">{{ the_sub_field('text') }}</a>
            @endwhile
            </div>
        @endif

    </div>

    <div class="bikmoreviewsblock_arrows">
        <svg class="slick-arrow slick-prev" width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.6665 1L0.999837 9.66667M0.999837 9.66667L9.6665 18.3333M0.999837 9.66667H25.6665" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <svg class="slick-arrow slick-next" width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17 1L25.6667 9.66667M25.6667 9.66667L17 18.3333M25.6667 9.66667H1" stroke="#202020" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
</section>

<style type="text/css">
  .wp-admin [data-{{$block['id']}}] {
    min-height: 60px;
    background-color: #3cf1c6;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__slider-list {
    display: flex;
    flex-wrap: nowrap;
    justify-content: flex-start;
    overflow-y: hidden;
    overflow-x: scroll;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__slider-list .bikmoreviewsblock__item {
    min-width: 46%;
    max-width: 46%;
    padding: 20px;
    background-color: #fff;
    margin-bottom: 32px;
    margin-left: 12px;
    margin-right: 12px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__slider-list .bikmoreviewsblock__item .bikmoreviewsblock__review-footer {
    display: flex;
    justify-content: space-between;
    margin-top: 32px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__slider-list .bikmoreviewsblock__item .bikmoreviewsblock__review-author {
    font-weight: bold;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 20px;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__header .bikmoreviewsblock__title {
    margin-top: 0;
    text-transform: uppercase;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__summary-upper {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__summary-rating {
    position: relative;
    font-weight: bold;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__summary-rating-star {
    position: absolute;
    top: 0;
    right: 0;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__summary-rating .bikmoreviewsblock__summary-rating-big {
    font-size: 50px;
    font-weight: bold;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars path {
    fill: #f2c94c;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-4 svg:nth-child(5) path {
    fill: #f2f2f2;
  }  

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-3 svg:nth-child(4) path,
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-3 svg:nth-child(5) path {
    fill: #f2f2f2;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-2 svg:nth-child(3) path,
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-2 svg:nth-child(4) path, 
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-2 svg:nth-child(5) path {
    fill: #f2f2f2;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-1 svg:nth-child(2) path, 
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-1 svg:nth-child(3) path, 
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-1 svg:nth-child(4) path, 
  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock__review-stars--rating-1 svg:nth-child(5) path {
    fill: #f2f2f2;
  }

  .wp-admin [data-{{$block['id']}}] .bikmoreviewsblock_arrows {
    display: none;
  }
}

</style>