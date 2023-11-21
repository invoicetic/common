<?php

namespace Invoicetic\Common\InvoiceId\Extractor;

class InvoiceSequenceExtractor
{
    protected string $invoiceId;

    protected ?string $prefix = null;

    protected ?string $number = null;

    protected ?string $suffix = null;

    protected bool $extracted = false;

    public function __construct($invoiceId)
    {
        $this->invoiceId = $invoiceId;
    }

    public static function from($invoiceId): InvoiceSequenceExtractor
    {
        return new self($invoiceId);
    }

    public function extract(): array
    {
        if (!$this->extracted) {
            $this->doExtract();
        }
        return [
            'prefix' => $this->prefix,
            'number' => $this->number,
            'suffix' => $this->suffix,
        ];
    }

    protected function doExtract(): void
    {
        $this->extracted = true;

        if (preg_match('#(\d+)$#', $this->invoiceId, $matches)) {
            $this->number = $matches[1];
            $this->prefix = substr($this->invoiceId, 0, -strlen($this->number));
        } else {
            $this->number = '';
            $this->prefix = $this->invoiceId;
        }
    }
}