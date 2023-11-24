<?php

namespace Invoicetic\Common\Tests\Fixtures\Gateway\Operations;

use Invoicetic\Common\Gateway\Operations\AbstractRequest;

class TestRequest extends AbstractRequest
{
    public function getData()
    {
        return $this->getParameter('data');
    }

    public function sendData($data)
    {
        return $this->createResponse($data);
    }
}
