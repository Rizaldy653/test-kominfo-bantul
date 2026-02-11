<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shipper
 * 
 * @property int $shipper_id
 * @property string $company_name
 * @property string|null $phone
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Shipper extends Model
{
	protected $table = 'shippers';
	protected $primaryKey = 'shipper_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'shipper_id' => 'int'
	];

	protected $fillable = [
		'company_name',
		'phone'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'ship_via');
	}
}
