<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Payee;

class PayeesSeed extends Seed
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Payee::create([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'Payee 1',
            'workspace_id' => 1,
        ]);
    }
}
