<?php

namespace Invoicetic\Common\Dto\References;

use Invoicetic\Common\Dto\Base\Behaviours\HasId;
use Invoicetic\Common\Serializer\Serializable;

abstract class BaseReference
{
   use Serializable;
   use HasId;
}