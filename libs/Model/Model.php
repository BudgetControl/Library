<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends Entry implements EntryInterface
{
    protected $table = 'models';

    protected $fillable = [
        'uuid',
        'amount',
        'note',
        'type',
        'transfer',
        'planned',
        'installment',
        'category_id',
        'account_id',
        'currency_id',
        'payment_type',
        'payee_id',
        'deleted_at',
        'geolocation',
        'workspace_id',
        'name'
    ];

    /**
     * The users that belong to the role.
     */
    public function labels()
    {
        return $this->belongsToMany(Label::class, 'model_labels','models_id', 'labels_id');
    }
}