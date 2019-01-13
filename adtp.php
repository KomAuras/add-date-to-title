<?php
/*
Plugin Name: Add date to title
Description: Automatic adding date to title over month after publishing.
Version: 1.0
Author: Evgeny Stefanenko
Author URI: https://forum.clarionlife.net
*/

add_filter('the_title', 'fix_title_name_after_period', 10, 2);

function fix_title_name_after_period($title, $id)
{
    $post = get_post($id);
    $border_date = date("Y-m-d", strtotime("-1 months"));
    if (get_the_date("Y-m-d", $post) < $border_date) {
        return get_the_date("d-m-Y", $post) . " " . $title;
    }
    return $title;
}
/*
function fix_title_validate_date($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
*/