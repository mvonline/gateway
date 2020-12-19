<?php

namespace App\Factory;

use App\GatewayConfig;
use Larabookir\Gateway\Enum;

class mellatFactory extends GatewayConfigFactory
{
    private $provider = Enum::MELLAT;
    private $result = null;

    public function getConfig($user=null): \App\GatewayConfig
    {
        $gateway= GatewayConfig::query()
            ->select('gateway_config')
            ->where(['gateway_name','=',$this->provider]);
        if($user){
            $gateway= $gateway->where('user_id','=',$user->id);
        }
        $this->result = json_decode($gateway->first());
        return $this->result;
    }

    public function getTerminalId(){
        return $this->result['terminalId'];
    }

    public function getCallbackUrl(){
        return $this->result['callback-url'];
    }

    public function getUsername(){
        return $this->result['username'];
    }

    public function getPassword(){
        return $this->result['password'];
    }
}
