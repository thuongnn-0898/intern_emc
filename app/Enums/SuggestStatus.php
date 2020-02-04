<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SuggestStatus extends Enum
{
    const Pendding = 0;
    const Accepted = 1;
    const Rejected = 2;
}
