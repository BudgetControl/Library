<?php
namespace Budgetcontrol\Library\Model;

use BudgetcontrolLibs\Crypt\Traits\Crypt;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}