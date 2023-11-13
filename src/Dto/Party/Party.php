<?php

namespace Invoicetic\Common\Dto\Party;

use Invoicetic\Common\Dto\Base\Behaviours\HasName;
use Invoicetic\Common\Dto\LegalEntity\HasLegalEntityTrait;

class Party
{
    use HasName;
    use HasLegalEntityTrait;
}

