<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 */
final class UserRole extends Enum
{
    const Admin = 0;
    const User = 1;
}
