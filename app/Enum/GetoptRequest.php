<?php

declare(strict_types=1);

namespace App\Enum;

enum GetoptRequest: string
{
    public const string PARTICIPANTS = 'participants';

    public const string TYPE = 'type';

    public const string SAVE = 'save';

    public const string TYPE_SAVE_FILE = 'file';

    public const string TYPE_SAVE_CONSOLE = 'console';

    public static function toArray(): array
    {
        return getopt('', [self::PARTICIPANTS . ':', self::TYPE . ':', self::SAVE . ':']);
    }
}
