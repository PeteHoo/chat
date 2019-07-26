<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2019/7/24
 * Time: 10:25
 */
return [
    'access_key'        => env('ALIYUN_ACCESSKEYID'), // accessKey
    'access_secret'     => env('ALIYUN_ACCESSKEYSECRET'), // accessSecret
    'sign_name'         => env('ALIYUN_SMS_SIGN_NAME'), // 签名，
    'template_code'     => env('ALIYUN_TEMPLATE_CODE')//模板号
];