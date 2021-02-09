<?php defined('ABSPATH') || exit;

$path = __DIR__;

class jk_wp_unsplash_init_handler
{

    public static function make_request_to_api($params = array(
        'token' => '',
        'secret' => '',
        'page' => '',
        'per_page' => '',
        'order_by' => '',
        'query' => ''
    ))
    {

        $url = "https://api.unsplash.com/search/photos/?client_id={$params['token']}&page={$params['page']}&per_page={$params['per_page']}&order_by={$params['order_by']}&query={$params['query']}";

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $resp = curl_exec($curl);

        curl_close($curl);

        return json_decode($resp);

    }

}
