<?php

declare(strict_types=1);

namespace Budgetcontrol\Seeds\Resources\Seeds;

use Budgetcontrol\Library\Model\Category;
use Budgetcontrol\Library\Model\SubCategory;

class CategorySeeders extends Seed
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public static function run(): void
  {
    $path = __DIR__ . '/../../../storage/categories.json';
    $data = (array) json_decode(file_get_contents($path));
    foreach ($data as $_ => $cat) {
      $db = new Category();
      $db->uuid = $cat->category->uuid;
      $db->name = $cat->category->label;
      $db->slug = $cat->category->slug;
      $db->icon = $cat->category->icon;
      $db->type = $cat->category->type;
      $db->save();

      foreach ($cat->category->subCategory as $key => $value) {
        $dbSubCat = new SubCategory();
        $dbSubCat->uuid = $value->uuid;
        $dbSubCat->name = $value->name;
        $dbSubCat->slug = $value->slug;
        $dbSubCat->category_id = $db->id;
        $dbSubCat->exclude_from_stats = (empty($value->exclude_from_stats)) ? 0 : $value->exclude_from_stats;
        $dbSubCat->save();
      }
    }
  }
}
