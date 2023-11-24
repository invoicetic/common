<?php

namespace Invoicetic\Common\Gateway\Operations\Behaviours;

use Invoicetic\Common\Gateway\Operations\AbstractResponse;
use Invoicetic\Common\Gateway\Operations\Response;
use RuntimeException;

trait HasResponseRequestTrait
{

    /**
     * An associated AbstractResponse.
     *
     * @var AbstractResponse|null
     */
    protected ?AbstractResponse $response = null;

    /**
     * Get the associated Response.
     *
     * @return AbstractResponse
     */
    public function getResponse(): AbstractResponse
    {
        if (null === $this->response) {
            throw new RuntimeException('You must call send() before accessing the Response!');
        }

        return $this->response;
    }

    protected function createResponse($data)
    {
        $response = $this->createResponseClass();
        return $this->response = new $response($this, $data);
    }

    protected function createResponseClass(): string
    {
        $class = get_class($this);

        $tries = [
            str_replace('Request', 'Response', $class),
            str_replace('Request', 'Response', str_replace('Operations', 'Responses', $class)),
        ];
        foreach ($tries as $try) {
            if (class_exists($try)) {
                return $try;
            }
        }
        return Response::class;
    }
}