<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Budget;
use Illuminate\Database\Seeder;

class BudgetSeed extends Seed
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        Budget::create([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'name' => 'Budget 1',
            'description' => 'Budget 1 description',
            'amount' => 1000,
            'workspace_id' => 1,
            'configuration' => '{"tags": [], "types": ["incoming", "expenses", "debit"], "period": "recursively", "accounts": [196], "end_date": "3333-11-19T02:08:00.000000Z", "categories": [], "period_end": "2024-08-19T00:00:00.000000Z", "start_date": "2024-06-08T00:00:00.000000Z", "period_start": "2024-07-17T00:00:00.000000Z"}',
            'notification' => 1,
            'emails' => ['foo@email.it', 'bar@email.it']
        ]);
    }
}
