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
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response;

class CallableHandler implements RequestHandlerInterface
{
    /**
     * @var callable
     */
    protected $next;
    
    /**
     * @return callable
     */
    public function getNext() :? callable
    {
        return $this->next;
    }
    
    /**
     * @param callable $next
     */
    public function setNext(callable $next)
    {
        $this->next = $next;
    }
    
    /**
     * CallableHandler constructor.
     * @param callable|null $next
     */
    public function __construct(callable $next = null)
    {
        $this->next = $next;
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $next = $this->getNext();
        if (is_callable($next)) {
            return $next($request, new Response());
        }
        throw new \Exception('next is not callable');
    }
}
