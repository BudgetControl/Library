<?php
namespace Budgetcontrol\Library\Table;

enum Jobs: string {
    case table = 'failed_jobs';
    case uuid = 'uuid';
    case command = 'command';
    case exception = 'exception';
    case failed_at = 'failed_at';

    public static function columns(bool $isString = false): array|string {
        $values = [
            self::uuid->value,
            self::command->value,
            self::exception->value,
            self::failed_at->value
        ];

        if($isString === true) {
            return implode(', ', $values);
        }

        return $values;
    }
    
}
