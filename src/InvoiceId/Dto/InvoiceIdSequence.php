<?php

namespace Invoicetic\Common\InvoiceId\Dto;

use Invoicetic\Common\Dto\Base\Behaviours\HasAttributesTrait;
use Invoicetic\Common\Serializer\Serializable;

class InvoiceIdSequence
{
    use Serializable;
    use HasAttributesTrait;

    public const TAG_NUMBER = '{NUMBER}';
    public const TAG_YEAR = '{YEAR}';

    public const TAG_MONTH = '{MONTH}';

    public const TAG_DAY = '{DAY}';

    public const TAG_SEQUENCE = '{SEQUENCE}';

    public const TAG_SEPARATOR = '{SEPARATOR}';

    public const PATTERN_SEPARATOR = '-';

    protected ?string $id = null;

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

    public function setSequence(?string $sequence): self
    {
        $this->sequence = $sequence;
        return $this;
    }

    public function getSequence(): ?string
    {
        return $this->sequence;
    }

    public function setNumber(int|string|null $number): self
    {
        if (is_null($number)) {
            $this->number = null;
            return $this;
        }
        $this->number = is_int($number) ? $number : intval($number);
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

    public function getId(): ?string
    {
        if (!isset($this->id)) {
            $this->id = $this->generateId();
        }
        return $this->id;
    }

    protected function generateId(): string
    {
        $id = $this->getPattern();
        return strtr($id, [
            self::TAG_SEQUENCE => $this->getSequence(),
            self::TAG_NUMBER => sprintf('%0'.$this->getNumberLength().'d', $this->getNumber()),
            self::TAG_SEPARATOR => self::PATTERN_SEPARATOR,
        ]);
    }
}

