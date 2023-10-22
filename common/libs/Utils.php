<?php

namespace common\libs;

use yii\web\Response;

/**
 * 工具集
 *
 * @author jony <jonneyless@163.com>
 * @package common\libs
 */
class Utils extends \ijony\helpers\Utils
{

    /**
     * @param $string
     *
     * @return mixed|string|string[]|null
     */
    public static function genSlug($string)
    {
        $string = strtolower(trim($string));
        $string = str_replace(['"', '\''], ['', ''], $string);
        $string = preg_replace("/\s+/", "-", $string);

        return $string;
    }

    /**
     * 返回数据格式化
     *
     * @param Response $response
     *
     * @return array
     */
    public static function parseResponseData(Response $response): array
    {
        $data = $response->data;
        $code = $response->getStatusCode();
        $message = $response->statusText;

        $code = $code >= 300 ? $code : 0;

        $return = [
            'code' => $code,
            'message' => $message,
        ];

        if (isset($data['code']) && is_integer($data['code'])) {
            $return['code'] = $data['code'];
            unset($data['code']);
        }

        if (isset($data['message'])) {
            $return['message'] = $data['message'];
            unset($data['message']);
        }

        if (isset($data['type']) && strpos($data['type'], 'Exception') !== false) {
            // 正式环境下屏蔽掉 debug 信息
            if (!YII_ENV_PROD) {
                $return['error'] = $data;
            }
            $data = [];
        }

        if ($return['code'] != 0 && !isset($data['errors'])) {
            $data = [];
        }

        $return['data'] = $data;

        return $return;
    }
}
