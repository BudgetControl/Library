<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\ValueObject;

use Budgetcontrol\Library\Interfaces\ValueObjectInterface;

final class WorkspaceSetting implements ValueObjectInterface {

    private int $currency_id;
    private int $payment_type_id;

    private function __construct(int $currency_id, int $payment_type_id) {
        $this->currency_id = $currency_id;
        $this->payment_type_id = $payment_type_id;
    }

    /**
     * Creates a new instance of the WorkspaceSetting class.
     *
     * @param mixed ...$value The values to be used for creating the instance.
     * @return self The newly created instance of the WorkspaceSetting class.
     */
    public static function create(...$value): self
    {   
        list($currency_id, $payment_type_id) = $value;
        return new self($currency_id, $payment_type_id);
    }

    /**
     * Get the value of currency_id
     *
     * @return int
     */
    public function getCurrencyId(): int
    {
        return $this->currency_id;
    }

    /**
     * Set the value of currency_id
     *
     * @param int $currency_id
     *
     * @return self
     */
    public function setCurrencyId(int $currency_id): self
    {
        $this->currency_id = $currency_id;

        return $this;
    }

    /**
     * Get the value of payment_type_id
     *
     * @return int
     */
    public function getPaymenttypeId(): int
    {
        return $this->payment_type_id;
    }

    /**
     * Set the value of payment_type_id
     *
     * @param int $payment_type_id
     *
     * @return self
     */
    public function setPaymenttypeId(int $payment_type_id): self
    {
        $this->payment_type_id = $payment_type_id;

        return $this;
    }

    /**
     * Get the value of the value object.
     *
     * @return object The value of the value object.
     */
    public function toJson(): object {
        return (object) [
            'currency_id' => $this->currency_id,
            'payment_type_id' => $this->payment_type_id
        ];
    }

    /**
     * Get the value of the value object.
     *
     * @return string The value of the value object.
     */
    public function __toString(): string {
        return json_encode($this->toJson());
    }
}