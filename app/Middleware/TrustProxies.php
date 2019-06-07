<?php

declare(strict_types=1);

namespace App\Middleware;

use Illuminate\Http\Request;
use Fideloper\Proxy\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /** @var string */
    protected $proxies = '*';

    /** @var int */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
