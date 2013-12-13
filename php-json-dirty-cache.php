<?php


class PHP_JSON_Dirty_Cache
{

protected $cache_dir= dirname(__FILE__) . 'cache';

    function get_cache_data ( $key, $expiry )
    {
	$cache = $this->cache_dir . 'cache-' . $key . ".json";

        if ( file_exists ( $cache ) && filemtime ( $cache ) > time () - $expiry ) {

            $data = json_decode ( file_get_contents ( $cache ) );

            if ( !empty( $data ) ) {
                return $data;
            }

            return false;
        }

        return false;

    }

    function save_cache_data ( $data, $key )
    {
        $cache = $this->cache_dir . 'cache-' . $key . ".json";
        file_put_contents ( $cache, json_encode ( $data ) );
        return $data;
    }
}
