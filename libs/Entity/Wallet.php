<?php
namespace Budgetcontrol\Library\Entity;

/**
 * Represents a Wallet entity.
 *
 * @package Library\Entity
 */
enum Wallet: string {
    case bank = 'bank';
    case cache = 'cache';
    case creditCard = 'credit-card';
    case investment = 'investment';
    case loan = 'loan';
    case other = 'other';
    case prepaidCard = 'prepaid-card';
    case creditCardRevolving = 'credit-card-revolving';

    public static function types(): array {
        return [
            self::bank->value,
            self::cache->value,
            self::creditCard->value,
            self::investment->value,
            self::loan->value,
            self::other->value,
            self::prepaidCard->value,
            self::creditCardRevolving->value,
        ];
    }
}
