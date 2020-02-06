<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static User()
 * @method static static Admin()
 * @method static static OptionOne()
 * @method static static OptionTwo()
 */
final class UserRole extends Enum
{
    const User = 0;
    const Admin = 1;
}
