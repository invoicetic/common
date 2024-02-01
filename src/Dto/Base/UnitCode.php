<?php

namespace Invoicetic\Common\Dto\Base;

/**
 * @see https://www.truugo.com/ubl/2.1/cl_unitofmeasure/
 */
class UnitCode
{
    /**
     * one. Synonym: unit
     */
    const UNIT = 'C62';

    /**
     * each. A unit of count defining the number of items regarded as separate units.
     */
    const EACH = 'EA';

    const PIECE = 'H87';
    const GROUP = 10;
    const ARE = 'ARE';
    const HECTARE = 'HAR';
    const OUTLIT = 11;
    const SQUARE_METRE = 'MTK';
    const SQUARE_KILOMETRE = 'KMK';
    const SQUARE_FOOT = 'FTK';
    const SQUARE_YARD = 'YDK';
    const SQUARE_MILE = 'MIK';
    const RATION = 13;
    const LITRE = 'LTR';
    const SHOT = 14;
    const SECOND = 'SEC';
    const MINUTE = 'MIN';
    const HOUR = 'HUR';
    const DAY = 'DAY';
    const MONTH = 'MON';
    const YEAR = 'ANN';
}

