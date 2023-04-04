<?php

namespace App\Helpers;

use Exception;

class Helper
{
    public static function callCurlRequest($url, $method = 'GET', $postFields = array(), $headers = array(), $timeout = 100, $asynch = false, $postAsBodyParam = false) {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if ($method == 'GET') {
                curl_setopt($ch, CURLOPT_POST, false);
            }

            if ($method == 'POST') {
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                if (is_array($postFields) && count($postFields)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
                } else {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
                }
                if ($postAsBodyParam === true) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, @json_encode($postFields));
                } elseif ($postAsBodyParam === 5) {
                    // $postAsBodyParam = 5 means put as it is
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
                }
            }

            if ($method == 'DELETE') {
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if (is_array($postFields) && count($postFields)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
                }
            }

            if ($method == 'PUT') {
                if (is_array($headers)) {
                    $headers = array_merge($headers, array('X-HTTP-Method-Override: PUT'));
                }
                if (is_array($postFields) && count($postFields)) {
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFields));
                }
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            if (is_array($headers) && count($headers)) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            } else {
                $headers = array("Content-Type: application/json");
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            }
            // Asynchronous Request
            if ($asynch === true) {
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 1);
            } else {
                curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
            }
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // $info = curl_getinfo($ch);
            // print_r($info); die;
            $response = curl_exec($ch);
            $result = curl_getinfo($ch);
            curl_close($ch);
            // Yii::trace(VarDumper::dumpAsString($url), 'system.web.CommonComponent');
            // Yii::trace(VarDumper::dumpAsString($postFields), 'system.web.CommonComponent.callCurlRequestParams');
            if ($asynch || (isset($result['http_code']) && $result['http_code'] == 200)) {
                return $response;
            } else {
                throw new Exception($response, $result['http_code']);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}