<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\Model\BaseModel;

class FcmToken extends BaseModel implements EntryInterface
{
    protected $table = 'fcm_tokens';

    protected $hidden = ['id'];

    protected $fillable = [
        'token',
        'user_id',
        'device_info',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
