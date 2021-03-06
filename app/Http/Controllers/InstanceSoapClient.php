<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SoapClient;

class InstanceSoapClient extends BaseSoapController implements InterfaceInstanceSoap
{
    public static function init(){
        $wsdlUrl = self::getWsdl();
        $soapClientOptions = [
            'stream_context' => self::generateContext(),
            'exceptions' => true,
            'trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE
        ];
        return new SoapClient($wsdlUrl, $soapClientOptions);
    }
}

