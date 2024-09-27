<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\ValueObject;

use Budgetcontrol\Library\Interfaces\ValueObjectInterface;
use DateTime;
use Budgetcontrol\Library\Definition\Format;

final class BudgetConfiguration implements ValueObjectInterface {

    private array $tags;
    private array $types;
    private string $period;
    private array $accounts;
    private array $categories;
    private ?DateTime $period_end;
    private ?DateTime $period_start;

    private function __construct(array $tags = [], array $types = [], string $period, array $accounts = [], array $categories = [], ?string $period_end = null, ?string $period_start = null) {
        $this->tags = $tags;
        $this->types = $types;
        $this->period = $period;
        $this->accounts = $accounts;
        $this->categories = $categories;
        $this->period_end = is_null($period_end) ? new DateTime() : new DateTime($period_end);
        $this->period_start = is_null($period_start) ? new DateTime() : new DateTime($period_start);
    }

    /**
     * Creates a new instance of the BudgetConfiguration class.
     *
     * @param mixed ...$value The values to be used for creating the instance.
     * @return self The newly created instance of the BudgetConfiguration class.
     */
    public static function create(...$value): self
    {   
        list($tags, $types, $period, $accounts, $categories, $period_end, $period_start) = $value;
        return new self($tags, $types, $period, $accounts, $categories, $period_end, $period_start);
    }
    

    /**
     * Get the value of tags
     *
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @param array $tags
     *
     * @return self
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get the value of types
     *
     * @return array
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * Set the value of types
     *
     * @param array $types
     *
     * @return self
     */
    public function setTypes(array $types): self
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Get the value of period
     *
     * @return string
     */
    public function getPeriod(): string
    {
        return $this->period;
    }

    /**
     * Set the value of period
     *
     * @param string $period
     *
     * @return self
     */
    public function setPeriod(string $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get the value of accounts
     *
     * @return array
     */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    /**
     * Set the value of accounts
     *
     * @param array $accounts
     *
     * @return self
     */
    public function setAccounts(array $accounts): self
    {
        $this->accounts = $accounts;

        return $this;
    }

    /**
     * Get the value of categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @param array $categories
     *
     * @return self
     */
    public function setCategories(array $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get the value of period_end
     *
     * @return ?DateTime
     */
    public function getPeriodEnd(): ?DateTime
    {
        return $this->period_end;
    }

    /**
     * Set the value of period_end
     *
     * @param DateTime $period_end
     *
     * @return self
     */
    public function setPeriodEnd(DateTime $period_end): self
    {
        $this->period_end = $period_end;

        return $this;
    }

    /**
     * Get the value of period_start
     *
     * @return ?DateTime
     */
    public function getPeriodStart(): ?DateTime
    {
        return $this->period_start;
    }

    /**
     * Set the value of period_start
     *
     * @param DateTime $period_start
     *
     * @return self
     */
    public function setPeriodStart(DateTime $period_start): self
    {
        $this->period_start = $period_start;

        return $this;
    }

    /**
     * Returns the string representation of the object.
     *
     * @return string The string representation of the object.
     */
    public function __toString(): string
    {
        return json_encode([
            'tags' => $this->tags,
            'types' => $this->types,
            'period' => $this->period,
            'accounts' => $this->accounts,
            'categories' => $this->categories,
            'period_end' => is_null($this->period_end) ? null : $this->period_end->format(Format::dateTime->value),
            'period_start' => is_null($this->period_start) ? null : $this->period_start->format(Format::dateTime->value)
        ]);
    }

    /**
     * Converts the BudgetConfiguration object to JSON representation.
     *
     * @return object The JSON representation of the BudgetConfiguration object.
     */
    public function toJson(): object
    {
        return (object) [
            'tags' => $this->tags,
            'types' => $this->types,
            'period' => $this->period,
            'accounts' => $this->accounts,
            'categories' => $this->categories,
            'period_end' => is_null($this->period_end) ? null : $this->period_end->format(Format::dateTime->value),
            'period_start' => is_null($this->period_start) ? null : $this->period_start->format(Format::dateTime->value)
        ];
    }
}