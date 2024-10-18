<?php
namespace Budgetcontrol\Library\Model;

use BudgetcontrolLibs\Crypt\Traits\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Budgetcontrol\Library\Entity\Wallet as EntityWallet;


class Wallet extends BaseModel implements EntryInterface
{
    use SoftDeletes, HasFactory, Crypt;
    
    protected $table = 'wallets';

    protected $fillable = [
        'name',
        'color',
        'type',
        'currency',
        'balance',
        'workspace_id',
        'exclude_from_stats',
        'installement_value',
        'payment_account',
        'closing_date',
        'invoice_date',
        'installement',
        'sorting',
        'credit_limit',
        'uuid',
        'voucher_value'
    ];

    protected $casts = [
        'exclude_from_stats' => 'boolean',
        'installement_value' => 'float',
        'balance' => 'float',
        'credit_limit' => 'float',
        'voucher_value' => 'float'
    ];

    protected function closingDate(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => is_null($value) ? null : Carbon::parse($value)->toAtomString(),
            set: fn (?string $value) => is_null($value) ? null :  Carbon::parse($value)->format('Y-m-d')
        );
    }

    protected function invoiceDate(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => is_null($value) ? null : Carbon::parse($value)->toAtomString(),
            set: fn (?string $value) => is_null($value) ? null : Carbon::parse($value)->format('Y-m-d')
        );
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => $this->decrypt($value),
            set: fn(string $value) => $this->encrypt($value),
        );
    }

    /**
     * Get the balance attribute for the wallet.
     *
     * @return Attribute The balance attribute.
     */
    public function balance(): Attribute
    {
        /**
         * A callback function to cast savings values.
         *
         * This function is used to process and cast the savings values
         * within the Wallet model.
         *
         * @param mixed $value The value to be casted.
         * @return mixed The casted value.
         */
        $castingSavings = function ($value) {
            if($this->attributes['type'] === EntityWallet::voucher->value) {
                $value = $this->attributes['voucher_value'] * $value;
            }
            
            return $value;
        };

        /**
         * A closure function that performs type casting on the provided value.
         *
         * @param mixed $value The value to be type casted.
         * @return mixed The type casted value.
         */
        $castingGetting = function ($value) {
            if($this->attributes['type'] === EntityWallet::voucher->value) {
                $valueInValut = $value;
                $valueInVoucher = $value / $this->attributes['voucher_value'];

                $value = [
                    'value_in_voucher' => $valueInVoucher,
                    'value_in_valut' => $valueInValut
                ];
            }
            
            return $value;
        };

        return Attribute::make(
            get: fn(float $value) => $castingGetting($value),
            set: fn(float $value) => $castingSavings($value),
        );
    }
}