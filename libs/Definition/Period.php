<?php
namespace Budgetcontrol\Library\Definition;

/**
 * Represents a period in the application.
 *
 * This enum class defines different periods that can be used in the application.
 * Each period is represented as a string value.
 *
 * @package BC\Libs\Library\Definition
 */
enum Period: string {
    case daily = 'daily';
    case weekly = 'weekly';
    case monthly = 'monthly';
    case yearly = 'yearly';
    case recursively = 'recursively';
    case oneShot = 'one-shot';

    /**
     * Returns a list of periods.
     *
     * @return array The list of periods.
     */
    public static function periodList(): array {
        return [
            self::daily,
            self::weekly,
            self::monthly,
            self::yearly,
            self::recursively,
            self::oneShot
        ];
    }

}
