<?php
namespace Budgetcontrol\Library\Definition;

/**
 * Represents the Format enum.
 *
 * This enum is used to define different formats for data representation.
 * It is a string-based enum, meaning its values are of type string.
 */
enum Format: string {
    case dateTime = 'Y-m-d H:i:s';
    case date = 'Y-m-d';
    case time = 'H:i:s';
    case currency = '0.00';
}
