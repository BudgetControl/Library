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

    public function setting(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => fn () => WorkspaceSetting::create(json_encode($value, true)),
            set: fn (WorkspaceSetting $value) => $value->__toString(),
        );
    }
    
}