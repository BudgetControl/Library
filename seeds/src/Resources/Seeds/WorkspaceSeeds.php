<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use \DateTime;

class WorkspaceSeeds extends Seed
{

    public static function run() : void
    {
        $dateTime = new DateTime();

        \Budgetcontrol\Library\Model\Workspace::create([
            'name' => 'test',
            'description' => 'test',
            'current' => 1,
            'user_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);
    }
}
