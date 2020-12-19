<?php

namespace App\Factory;
use App\GatewayConfig;
use App\User;

abstract class GatewayConfigFactory
{
    abstract public function getConfig(User $user = null): GatewayConfig;

}
