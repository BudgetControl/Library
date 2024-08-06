<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\PaymentType;

class PaymentTypeSeeders extends Seed
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run(): void
    {
      $path = __DIR__.'/../../../storage/payment_type.json';
      $data = (array) json_decode(file_get_contents($path));

      foreach ($data as $_ => $value) {
        $db = new PaymentType();
        $db->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $db->slug = $value->slug;
        $db->name = $value->label;
        $db->save();
      }
    }
}
