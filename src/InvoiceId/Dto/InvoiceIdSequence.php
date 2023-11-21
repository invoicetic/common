<?php

namespace Invoicetic\Common\InvoiceId\Dto;

use Invoicetic\Common\Serializer\Serializable;

class InvoiceIdSequence
{
    use Serializable;

    public const TAG_NUMBER = '{NUMBER}';
    public const TAG_YEAR = '{YEAR}';

    public const TAG_MONTH = '{MONTH}';

    public const TAG_DAY = '{DAY}';

    protected $pattern = null;

    protected string|null $sequence = null;

    protected int|null $number = null;

    protected $numberLength = 5;

    public function setPattern(string $pattern): self
    {
        $this->pattern = $pattern;
        return $this;
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function setSequence(string $sequence): self
    {
        $this->sequence = $sequence;
        return $this;
    }

    public function getSequence(): ?string
    {
        return $this->sequence;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumberLength(int $numberLength): self
    {
        $this->numberLength = $numberLength;
        return $this;
    }

    public function getNumberLength(): ?int
    {
        return $this->numberLength;
    }
}

