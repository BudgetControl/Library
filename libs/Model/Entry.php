<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Definition\Format;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Entry extends BaseModel implements EntryInterface
{
    use SoftDeletes;
    protected $table = 'entries';

    protected $hidden = ['id'];

    protected $fillable = [
        'date_time',
        'updated_at',
        'created_at',
        'uuid',
        'amount',
        'note',
        'type',
        'waranty',
        'transfer',
        'confirmed',
        'planned',
        'installment',
        'category_id',
        'account_id',
        'transfer_id',
        'transfer_relation',
        'currency_id',
        'payment_type',
        'payee_id',
        'deleted_at',
        'geolocation',
        'workspace_id',
        'exclude_from_stats'
    ];

    protected $casts = [
        'geolocation' => 'array',
        'planned' => 'boolean',
        'waranty' => 'boolean',
        'transfer' => 'boolean',
        'confirmed' => 'boolean',
        'installment' => 'boolean',
        'exclude_from_stats' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        if(!isset($attributes['uuid'])) {
            $this->setAttribute('uuid', (string) \Ramsey\Uuid\Uuid::uuid4());
        }

        parent::__construct($attributes);
    }

    public function setGeolocationAttribute($value)
    {
        $this->attributes['geolocation'] = json_encode($value);
    }

    public function getGeolocationAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }
        
        return json_decode($value);
    }

    /**
     * Get the category
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, "category_id");
    }

    /**
     * Get the currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Get the payments_type
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'account_id', 'id');
    }

    /**
     * Get the payments_type
     */
    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type', 'id');
    }

    /**
     * Get the payee
     */
    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }

    /**
     * Scope a query to include relations with label, account, category, and payee.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithRelations($query)
    {
        return $query->with('labels', 'wallet', 'subCategory.category', 'payee', 'currency', 'paymentType');
    }

    protected function dateTime(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->toAtomString(),
            set: fn (string $value) => Carbon::parse($value)->format(Format::dateTime->value),
        );
    }

    /**
     * The users that belong to the role.
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, 'entry_labels','entry_id', 'labels_id');
    }
}
