<?php
namespace Budgetcontrol\Library\Entity;

/**
 * Represents an entry in the application.
 *
 * @enum
 * @package BC\Libs\Library\Libs\Entity
 */
enum Entry: string {
    case expenses   = 'expenses';
    case incoming   = 'incoming';
    case transfer   = 'transfer';
    case debit      = 'debit';
    case saving      = 'saving';

    public static function types(): array {
        return [
            self::expenses->value,
            self::incoming->value,
            self::transfer->value,
            self::debit->value,
            self::saving->value
        ];
    }
}
