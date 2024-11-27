<?php
declare(strict_types=1);

namespace Budgetcontrol\Library\ValueObject;

use Budgetcontrol\Library\Interfaces\ValueObjectInterface;
use Budgetcontrol\Library\Model\Currency;

final class WorkspaceSetting implements ValueObjectInterface {

    private Currency $currency;
    private int $payment_type_id;

    private function __construct(Currency $currency, int $payment_type_id) {
        $this->currency = $currency;
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
        list($currency, $payment_type_id) = $value;
        return new self($currency, $payment_type_id);
    }

    /**
     * Get the value of currency_id
     *
     * @return int
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * Set the value of currency_id
     *
     * @param int $currency_id
     *
     * @return self
     */
    public function setCurrencyId(Currency $currency): self
    {
        $this->currency = $currency;

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
            'currency' => [
                'id' => $this->currency->id,
                'name' => $this->currency->name,
                'symbol' => $this->currency->icon,
                'label' => $this->currency->label,
                'slug' => $this->currency->slug
            ],
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
