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
}
