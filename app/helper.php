<?php
if (!function_exists('getImageUrl')) {
    function getImageUrl( $url)
    {
       return is_null($url) ? asset('img/boxed-bg.png') : $url;
    }
}
