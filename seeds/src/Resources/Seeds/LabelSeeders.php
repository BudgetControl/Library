<?php
declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Label;

class LabelSeeders extends Seed
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run(): void
    {
      $path = __DIR__.'/../../../storage/label.json';
      $data = (array) json_decode(file_get_contents($path));

      foreach ($data as $key => $value) {
        $db = new Label();
        $db->uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
        $db->name = strtolower($value);
        $db->color =  '#' . substr(md5((string) rand(0, 999)), 0, 6);
        $db->workspace_id = 1;
        $db->save();
      }
    }
}
