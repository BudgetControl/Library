<?php
namespace Budgetcontrol\Library\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workspace extends BaseModel implements EntryInterface
{
    use SoftDeletes, HasFactory;
    
    protected $table = 'workspaces';

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'uuid',
    ];

    public function workspaceSettings()
    {
        return $this->hasOne(WorkspaceSettings::class);
    }
    
}