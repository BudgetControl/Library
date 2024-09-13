<?php

namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payee extends BaseModel implements EntryInterface
{
    use SoftDeletes, HasFactory;

    // Define the table associated with the model
    protected $table = 'payees';

    protected $fillable = [
        'name',
        'uuid',
        'workspace_id',
    ];

    public function __construct(array $attributes = [])
    {
        if(!isset($attributes['uuid'])) {
            $this->setAttribute('uuid', (string) \Ramsey\Uuid\Uuid::uuid4());
        }
        parent::__construct($attributes);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function entry()
    {
        return $this->hasMany(Entry::class);
    }
    

}
