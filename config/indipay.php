<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Indipay Service Config
    |--------------------------------------------------------------------------
    |   gateway = CCAvenue / PayUMoney / EBS / Citrus / InstaMojo
    |   view    = File
    */

    'gateway' => 'InstaMojo',                // Replace with the name of default gateway you want to use

    'testMode'  => true,                   // True for Testing the Gateway [For production false]

    'ccavenue' => [                         // CCAvenue Parameters
        'merchantId'  => env('INDIPAY_MERCHANT_ID', ''),
        'accessCode'  => env('INDIPAY_ACCESS_CODE', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
        'cancelUrl' => env('INDIPAY_CANCEL_URL', 'indipay/response'),

        'currency' => env('INDIPAY_CURRENCY', 'INR'),
        'language' => env('INDIPAY_LANGUAGE', 'EN'),
    ],

    'payumoney' => [                         // PayUMoney Parameters
        'merchantKey'  => env('INDIPAY_MERCHANT_KEY', ''),
        'salt'  => env('INDIPAY_SALT', ''),
        'workingKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'successUrl' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
        'failureUrl' => env('INDIPAY_FAILURE_URL', 'indipay/response'),
    ],

    'ebs' => [                         // EBS Parameters
        'account_id'  => env('INDIPAY_MERCHANT_ID', ''),
        'secretKey' => env('INDIPAY_WORKING_KEY', ''),

        // Should be route address for url() function
        'return_url' => env('INDIPAY_SUCCESS_URL', 'indipay/response'),
    ],

    'citrus' => [   
        //'merchanttxnId'  => env('INDIPAY_CITRUS_MERCHANT_TXNID', '1233221223322'),
        //'orderamount'  => env('INDIPAY_CITRUS_ORDERAMOUNT', '1232212'),
        //'currency' =>  env('INDIPAY_CITRUS_CURRENCY', 'INR'),    
        //'amount' =>  env('INDIPAY_CITRUS_AMOUNT', '123'),                      
        // Citrus Parameters
        'vanityUrl'  => env('INDIPAY_CITRUS_VANITY_URL', 'https://sandbox.citruspay.com/citrus-demo-jsp/paymentOptions.jsp'),
        'secretKey' => env('INDIPAY_WORKING_KEY', '371425c568ac70333e0b24652591ea6126de9827'),

        // Should be route address for url() function
        'returnUrl' => env('INDIPAY_SUCCESS_URL', 'http://localhost/streetlights/public/home'),
        'notifyUrl' => env('INDIPAY_SUCCESS_URL', 'http://localhost/streetlights/public/donate'),
    ],

    'instamojo' =>  [
        'api_key' => env('INSTAMOJO_API_KEY',''),
        'auth_token' => env('INSTAMOJO_AUTH_TOKEN',''),
        'redirectUrl' => env('INDIPAY_REDIRECT_URL', 'indipay/response'),
    ],

    // Add your response link here. In Laravel 5.2 you may use the api middleware instead of this.
    'remove_csrf_check' => [
        'indipay/response'
    ],





];
