<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ProductStatus extends Enum
{
    const Available = 0;
    const Unavailable = 1;
    const Soon = 2;
}
