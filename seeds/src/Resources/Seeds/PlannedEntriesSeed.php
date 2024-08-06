<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\PlannedEntry;
use Budgetcontrol\Library\Entity\Entry as EntryType;

class PlannedEntriesSeed extends Seed
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        $dateTime = new \DateTime();

        PlannedEntry::create([
                "amount" => rand(1, 1000),
                "note" => "test",
                "category_id" => 12,
                "type" => "daily",
                "account_id" => 1,
                "currency_id" => 1,
                "payment_type_id" => 1,
                "date_time" => $dateTime->format('Y-m-d H:i:s'),
                'type' => EntryType::incoming->value,
                'workspace_id' => 1,
                'account_id' => 1,
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);
    }
}
