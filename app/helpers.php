<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

/**
 * Get an HTML img element representing an image attachment
 *
 * returns wp_get_attachment_image without a srcset
 * @param int          $attachment_id Image attachment ID.
 * @param string|array $size          (Optional)
 * @param bool         $icon          (Optional)
 * @param string|array $attr          (Optional)
 * @return string      HTML img element or empty string.
 */
function wp_image($attachment_id, $size = 'thumbnail', $icon = false, $attr = '')
{
    // add a filter to return null for srcset
    add_filter('wp_calculate_image_srcset_meta', '__return_null');
    // get the srcset-less img html
    $html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
    // remove the above filter
    remove_filter('wp_calculate_image_srcset_meta', '__return_null');
    return $html;
}

function btn_styles($key)
{
    $btn_styles = [
        'White Border'   => 'btn--white-border',
        'White Full'     => 'btn--white-full',
        'Magenta Border' => 'btn--magenta-border',
        'Magenta Full'   => 'btn--magenta-full',
        'Dark Border'    => 'btn--dark-border',
        'Dark Full'      => 'btn--dark-full',
    ];

    if (!isset($btn_styles[$key])) {
        return '';
    }

    return $btn_styles[$key];
}

function header_styles($key)
{
    $header_styles = [
        'Solid White' => 'header--solid-white',
        'Transparent' => 'header--transparent'
    ];

    if (!isset($header_styles[$key])) {
        return 'header--transparent';
    }

    return $header_styles[$key];
}

function get_bikmo_reviews_list($mid, $minScore = 4, $maxCount = 10, $customerPlaceholder = 'Bikmo customer', $reviewLang='en')
{
    if(!isset($mid) || !$mid) {
        return [];
    }

    $uk_products = [
        'Cyclescheme Bike Insurance by Bikmo',
        'Bikmo Cycle Insurance (UK)',
        'Bikmo Free Cycle Insurance (UK)',
        'British Cycling Bike Insurance',
        'Bikmo Cycle Insurance (IE)',
    ];
    $de_products = [
        'Bikmo Fahrrad Versicherung (DE)',
        'Bikmo Fahrrad Versicherung (AT)',
    ];

    $url = 'https://api.feefo.com/api/10/reviews/all?merchant_identifier=' . $mid . '&page_size=100&fields=reviews.service.rating.rating,reviews.service.review,reviews.service.id,reviews.service.title,reviews.service.created_at,reviews.customer.display_name,reviews.products_purchased';
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    unset($data['summary']);
    foreach ($data['reviews'] as $key => $review) {
        if(!isset($review['service'])) {
            unset($data['reviews'][$key]);
        }
        if ($review['service']['id'] == '58cffd92498ec7921c24e79e') {
            unset($data['reviews'][$key]);
        }
        if (!isset($review['service']['rating']) || !isset($review['service']['rating']['rating']) || $review['service']['rating']['rating'] < $minScore) {
            unset($data['reviews'][$key]);
        }
        if (!isset($review['service']['title'])) {
            unset($data['reviews'][$key]);
        }
        if (!isset($review['service']['review'])) {
            unset($data['reviews'][$key]);
        }
        if (!isset($review['customer'])) {
            $data['reviews'][$key]['customer'] = [];
            $data['reviews'][$key]['customer']['display_name'] = $customerPlaceholder;
        }

        if (!isset($review['products_purchased']) || count($review['products_purchased']) == 0) {
            unset($data['reviews'][$key]);
        }
        if ($reviewLang == 'en' && !in_array($review['products_purchased'][0], $uk_products)) {
            unset($data['reviews'][$key]);
        }
        if ($reviewLang == 'de' && !in_array($review['products_purchased'][0], $de_products)) {
            unset($data['reviews'][$key]);
        }

        // A bit of nice-ifying of the review text, because users don't got good grammars ;)
        // $data['reviews'][$key]['service']['title'] = ucfirst($review['service']['title']);
        $in = ucfirst($review['service']['review']);

        $data['reviews'][$key]['service']['review'] = strlen($in) > 100 ? substr($in,0,160)."..." : $in;
        // $data['reviews'][$key]['customer']['display_name'] = ucfirst($review['customer']['display_name']);
    }
    $data['reviews'] = array_slice($data['reviews'], 0, $maxCount);
    return $data['reviews'];
}

function get_bikmo_reviews_summary($mid)
{
    if(!isset($mid) || !$mid) {
        return null;
    }

    $url = 'https://api.feefo.com/api/10/reviews/summary/all?merchant_identifier=bikmo';
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data;
}

function bikmo_time_elapsed_string($datetime, $full = false) {
    $now = new \DateTime;
    $ago = new \DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function bikmo_display_field_boolean($val)
{
    if (is_null($val) || empty($val)) {
        return '-';
    }

    $val = strtolower($val);

    if (!in_array($val, ['true', 'false', 't', 'f', '1', '0'])) {
        return '-';
    }

    if (in_array($val, ['true', 't', '1'])) {
        return '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.6875 10C19.6875 4.6875 15.3125 0.3125 10 0.3125C4.64844 0.3125 0.3125 4.6875 0.3125 10C0.3125 15.3516 4.64844 19.6875 10 19.6875C15.3125 19.6875 19.6875 15.3516 19.6875 10ZM8.86719 15.1562C8.63281 15.3906 8.20312 15.3906 7.96875 15.1562L3.90625 11.0938C3.67188 10.8594 3.67188 10.4297 3.90625 10.1953L4.80469 9.33594C5.03906 9.0625 5.42969 9.0625 5.66406 9.33594L8.4375 12.0703L14.2969 6.21094C14.5312 5.9375 14.9219 5.9375 15.1562 6.21094L16.0547 7.07031C16.2891 7.30469 16.2891 7.73438 16.0547 7.96875L8.86719 15.1562Z" fill="#3CF1C6"/></svg>';
    }

    return '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0469 7.5L14.875 2.71875L15.8594 1.73438C16 1.59375 16 1.35938 15.8594 1.17188L14.8281 0.140625C14.6406 0 14.4062 0 14.2656 0.140625L8.5 5.95312L2.6875 0.140625C2.54688 0 2.3125 0 2.125 0.140625L1.09375 1.17188C0.953125 1.35938 0.953125 1.59375 1.09375 1.73438L6.90625 7.5L1.09375 13.3125C0.953125 13.4531 0.953125 13.6875 1.09375 13.875L2.125 14.9062C2.3125 15.0469 2.54688 15.0469 2.6875 14.9062L8.5 9.09375L13.2812 13.9219L14.2656 14.9062C14.4062 15.0469 14.6406 15.0469 14.8281 14.9062L15.8594 13.875C16 13.6875 16 13.4531 15.8594 13.3125L10.0469 7.5Z" fill="#BEBEBE"/></svg>';
}

function bikmo_display_field_price($val)
{
    if (is_null($val) || empty($val)) {
        return '-';
    }

    return get_field('site_currency', 'options') . ' ' . $val;
}

/* --- The Columns 123 Block styles ---- */
function columns123_styles($key)
{
    $styles = [
        'one' => 'bikmocolumns123block--style1',
        'two' => 'bikmocolumns123block--style2',
        'three' => 'bikmocolumns123block--style3',
    ];

    if (!isset($styles[$key])) {
        return 'bikmocolumns123block--style1';
    }

    return $styles[$key];
}

/* --- The 3 Columns Extra Block styles ---- */
function columns_extra_styles($key)
{
    $styles = [
        'one' => 'bikmo3columnextrablock--style1',
        'two' => 'bikmo3columnextrablock--style2',
    ];

    if (!isset($styles[$key])) {
        return 'bikmo3columnextrablock--style1';
    }

    return $styles[$key];
}

