<?php
namespace Budgetcontrol\Library\Model;

use Budgetcontrol\Library\ValueObject\WorkspaceSetting;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkspaceSettings extends BaseModel implements EntryInterface
{
    use SoftDeletes, HasFactory;
    
    protected $table = 'workspace_settings';

    protected $fillable = [
        'workspace_id',
        'setting',
        'data'
    ];

    public function data(): Attribute
    {
        $casting = function($value) {
            $data = json_decode($value, true);
            return WorkspaceSetting::create(
                Currency::where('id',$data['currency']['id'])->first()->toArray(),
                $data['payment_type_id']
            );
        };

        return Attribute::make(
            get: fn (string $value) => $casting($value),
            set: fn (WorkspaceSetting $value) => $value->__toString(),
        );
    }
    
}
