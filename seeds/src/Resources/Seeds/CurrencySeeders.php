<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Currency;

class CurrencySeeders extends Seed 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run(): void
    {
      $path = __DIR__.'/../../../storage/currency.json';
      $data = (array) json_decode(file_get_contents($path));

      foreach ($data as $_ => $value) {
        $db = new Currency();
        $db->name = $value->name;
        $db->slug = $value->slug;
        $db->icon = $value->icon;
        $db->label = $value->label;
        $db->save();
      }
    }
}
