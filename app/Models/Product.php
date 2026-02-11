<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property string $product_name
 * @property int|null $supplier_id
 * @property int|null $category_id
 * @property string|null $quantity_per_unit
 * @property float|null $unit_price
 * @property int|null $units_in_stock
 * @property int|null $units_on_order
 * @property int|null $reorder_level
 * @property int $discontinued
 * 
 * @property Supplier|null $supplier
 * @property Category|null $category
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';
	protected $primaryKey = 'product_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'supplier_id' => 'int',
		'category_id' => 'int',
		'unit_price' => 'float',
		'units_in_stock' => 'int',
		'units_on_order' => 'int',
		'reorder_level' => 'int',
		'discontinued' => 'int'
	];

	protected $fillable = [
		'product_name',
		'supplier_id',
		'category_id',
		'quantity_per_unit',
		'unit_price',
		'units_in_stock',
		'units_on_order',
		'reorder_level',
		'discontinued'
	];

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class);
	}
}
