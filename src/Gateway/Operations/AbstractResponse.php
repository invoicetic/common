<?php

namespace Invoicetic\Common\Gateway\Operations;

abstract class AbstractResponse
{

    /**
     * The embodied request object.
     *
     * @var AbstractRequest
     */
    protected $request;

    /**
     * The data contained in the response.
     *
     * @var mixed
     */
    protected $data;

    /**
     * Constructor
     *
     * @param AbstractRequest $request the initiating request.
     * @param mixed $data
     */
    public function __construct(AbstractRequest $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }


    /**
     * Get the initiating request object.
     *
     * @return AbstractRequest
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}