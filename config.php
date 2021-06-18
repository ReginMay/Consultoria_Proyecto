<?php 

define('URL_SITIO', 'http://localhost/Nespa_paginaweb');

require './paypal/autoload.php';


$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYIorHpPShHMd1OY_egAg6of5mixksua4SCwsDTWkPBzVAqZcnwDtGIWwefOwZThrJpbcPqOOvmKBJd2',     // ClientID
        'EP_HAhq6m8ZE-X1vRwaDsoqqPGkBJ2-VzttVvCUCRZibjkcYRtqZl8GkEQwlZ0jiA7KM9tx-UgZenfWd'      // ClientSecret
    )
);

?>