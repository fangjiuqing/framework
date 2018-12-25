<?php
namespace re\rgx;

/**
 * 数据助手类
 * $Id: common.helper.php 27 2017-07-21 09:50:28Z reginx $
 */
class data_helper extends rgx {
    const APP_CODE = '47f4554f277d4b54813fd2e6ee746c06';
    /**
     * [阿里云：全国天气预报接口]
     * @param  string $city_name [description]
     * @return [type]            [description]
     */
    public static function get_weather ($city_name = '南京') {
        return CACHE('weather@report@' . $city_name, function () use ($city_name) {
            $host    = "https://chkj02.market.alicloudapi.com";
            $path    = "/qgtq";
            $method  = "GET";
            $headers = array();
            array_push($headers, "Authorization:APPCODE " . self::APP_CODE);
            $querys  = "city=" . urlencode($city_name);
            $bodys   = "";
            $url     = $host . $path . "?" . $querys;

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_FAILONERROR, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            if (1 == strpos("$".$host, "https://"))
            {
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            }
            $ret = curl_exec($curl);
            return $ret;
        }, 3000);
    }
} // class end