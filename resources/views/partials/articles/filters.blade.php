
@php 
$current_term_slug = 'all';
$current_term_name = get_field('articles_category_filter_placeholder', 'options');

if(is_category()) {
    $category = get_queried_object();
    $current_term_slug = $category->slug;
    $current_term_name = $category->name;
}
@endphp

<section class="articles-filters">
    <div class="wrapper">

        <div class="articles-filters__container">

            <div id="category-filter-id" class="category-filter blog-filter">
                @php
                $terms = get_terms('category');

                @endphp

                <div class="category-filter__selected body-text body-text--weight-medium body-text--size-large">
                    {{ $current_term_name }}
                </div>

                <div class="category-filter__arrow">
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.07812 9.3125C8.3125 9.54688 8.64062 9.54688 8.875 9.3125L15.8125 2.42188C16.0469 2.23438 16.0469 1.85938 15.8125 1.625L14.875 0.734375C14.6875 0.5 14.3125 0.5 14.0781 0.734375L8.5 6.26562L2.875 0.734375C2.64062 0.5 2.3125 0.5 2.07812 0.734375L1.14062 1.625C0.90625 1.85938 0.90625 2.23438 1.14062 2.42188L8.07812 9.3125Z" fill="#FF0080"/>
                    </svg>
                </div>

                <ul class="category-filter__options">
                    @if($current_term_slug != 'all')
                        <li data-val="all">
                            <a href="{{ get_field('articles_default_back_url', 'options') }}" class="body-text body-text--weight-medium body-text--size-large">{{ get_field('articles_category_filter_placeholder', 'options') }}</a>
                        </li>
                    @endif

                    @foreach($terms as $term)
                        @if($term->slug != $current_term_slug)
                            <li data-val="{{ $term->slug }}">
                                <a href="{{ get_category_link($term->term_id) }}" class="body-text body-text--weight-medium body-text--size-large">{{ $term->name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="search-filter blog-filter">

            @php
            $all_sites = get_sites();
            $current_blog_id = get_current_blog_id();
            $search_base_path = '/';

            for ($i = 0; $i < count($all_sites); $i ++) {
                $path = $all_sites[$i]->path;
                if ($current_blog_id == $all_sites[$i]->blog_id) {
                    $search_base_path = $path;
                }
            }
            @endphp
                <form role="search" method="get" class="search-form myform" action="{{ $search_base_path }}">
                    <label>
                        <input id="search" type="search" class="search-field" placeholder="{!! the_field('articles_search_filter_placeholder', 'option') !!}" value="{!! the_search_query(); !!}" name="s">

                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.8125 21.9844L18.1406 16.3125C18 16.2188 17.8594 16.125 17.7188 16.125H17.1094C18.5625 14.4375 19.5 12.1875 19.5 9.75C19.5 4.40625 15.0938 0 9.75 0C4.35938 0 0 4.40625 0 9.75C0 15.1406 4.35938 19.5 9.75 19.5C12.1875 19.5 14.3906 18.6094 16.125 17.1562V17.7656C16.125 17.9062 16.1719 18.0469 16.2656 18.1875L21.9375 23.8594C22.1719 24.0938 22.5469 24.0938 22.7344 23.8594L23.8125 22.7812C24.0469 22.5938 24.0469 22.2188 23.8125 21.9844ZM9.75 17.25C5.57812 17.25 2.25 13.9219 2.25 9.75C2.25 5.625 5.57812 2.25 9.75 2.25C13.875 2.25 17.25 5.625 17.25 9.75C17.25 13.9219 13.875 17.25 9.75 17.25Z" fill="#FF0080" />
                        </svg>
                    </label>
                    <input type="hidden" name="post_type" value="post" />
                    <input type="submit" class="search-submit" value="{!! the_field('articles_search_filter_placeholder', 'option') !!}" style="display: none;">
                </form>
            </div>
        </div>

    </div>
</section>