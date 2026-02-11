<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string $category_name
 * @property string|null $description
 * @property bytea|null $picture
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'category_id' => 'int',
		'picture' => 'bytea'
	];

	protected $fillable = [
		'category_name',
		'description',
		'picture'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
