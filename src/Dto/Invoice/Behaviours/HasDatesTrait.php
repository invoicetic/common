<?php

namespace Invoicetic\Common\Dto\Invoice\Behaviours;

use DateTime;

trait HasDatesTrait
{

    /**
     * @var DateTime|null
     */
    private ?DateTime $issueDate = null;

    /**
     * @var DateTime|null
     */
    private ?DateTime $dueDate = null;

    /**
     * @return DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param ?DateTime $issueDate
     * @return self
     */
    public function setIssueDate(DateTime|null $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    /**
     * @param DateTime $dueDate
     * @return self
     */
    public function setDueDate(DateTime|null $dueDate): self
    {
        $this->dueDate = $dueDate;
        return $this;
    }
}