<?php
/**
 * @see https://github.com/dotkernel/dot-controller/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-controller/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\ControllerCompat;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;

trait CompatibleControllerTrait
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next = out)
    {
        $this->request = $request;
        $this->handler = new CallableHandler($next);
        return $this->dispatch();
    }
}