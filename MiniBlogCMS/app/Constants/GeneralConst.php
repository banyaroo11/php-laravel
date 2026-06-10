<?php

namespace App\Constants;

class GeneralConst
{
    public const APP_NAME = 'Laravel Structure App';
    // Pagnination
    public const PAGINATION=6;
    // Roles
    public const ADMIN = 0;
    public const MEMBER = 1;
    public const ROLES = [
        self::ADMIN => 'Admin',
        self::MEMBER => 'Member',
    ];
    // Lock
    public const UNLOCK = 0;
    public const LOCK = 1;
    public const LOCK_STATUS = [
        self::UNLOCK => 'Admin',
        self::LOCK => 'User',
    ];
}
