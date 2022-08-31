@php
$is_modal_link = get_sub_field('open_video_modal');
$link = get_sub_field('link');
@endphp

@if ($link && !$is_modal_link)
    @php $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; @endphp
    <a href="{{ esc_url($link_url) }}" class="btn {{ (isset($extra_btn_classes) ? $extra_btn_classes : '') }} {{ App\btn_styles(get_sub_field('style')) }}" target="{{ esc_attr($link_target) }}">
        {{ esc_html($link_title) }}
    </a>
@endif

@if($link && $is_modal_link)

    @php 
    $modal_key = get_sub_field('modal_id');
    $modal_type = explode('~', $modal_key)[0];
    $modal_code = explode('~', $modal_key)[1];

    $link_title = $link['title'];
    @endphp

    <button class="btn {{ (isset($extra_btn_classes) ? $extra_btn_classes : '') }} {{ App\btn_styles(get_sub_field('style')) }} btn--triggers-modal" data-type="{{ $modal_type }}" data-modal="modal_{{ $modal_code }}">
        {{ esc_html($link_title) }}
    </button>

    @php 
    $GLOBALS['modals'] = true;
    @endphp
@endif