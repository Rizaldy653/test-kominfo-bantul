<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $order_id
 * @property string|null $customer_id
 * @property int|null $employee_id
 * @property Carbon|null $order_date
 * @property Carbon|null $required_date
 * @property Carbon|null $shipped_date
 * @property int|null $ship_via
 * @property float|null $freight
 * @property string|null $ship_name
 * @property string|null $ship_address
 * @property string|null $ship_city
 * @property string|null $ship_region
 * @property string|null $ship_postal_code
 * @property string|null $ship_country
 * 
 * @property Customer|null $customer
 * @property Employee|null $employee
 * @property Shipper|null $shipper
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'employee_id' => 'int',
		'order_date' => 'datetime',
		'required_date' => 'datetime',
		'shipped_date' => 'datetime',
		'ship_via' => 'int',
		'freight' => 'float'
	];

	protected $fillable = [
		'customer_id',
		'employee_id',
		'order_date',
		'required_date',
		'shipped_date',
		'ship_via',
		'freight',
		'ship_name',
		'ship_address',
		'ship_city',
		'ship_region',
		'ship_postal_code',
		'ship_country'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function shipper()
	{
		return $this->belongsTo(Shipper::class, 'ship_via');
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class);
	}
}
