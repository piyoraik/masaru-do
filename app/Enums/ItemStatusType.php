<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ItemStatusType extends Enum
{
    const OnSale =   0;
    const Sold =   1;
    const Stop = 9;
}
