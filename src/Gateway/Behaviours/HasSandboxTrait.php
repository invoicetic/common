<?php

namespace Invoicetic\Common\Gateway\Behaviours;

trait HasSandboxTrait
{
    protected $sandbox = false;

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->sandbox;
    }

    /**
     * @param bool $sandbox
     */
    public function setSandbox(bool $sandbox): void
    {
        $this->sandbox = $sandbox;
    }
}