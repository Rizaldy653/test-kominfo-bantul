<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerDemographic
 * 
 * @property string $customer_type_id
 * @property string|null $customer_desc
 * 
 * @property Collection|CustomerCustomerDemo[] $customer_customer_demos
 *
 * @package App\Models
 */
class CustomerDemographic extends Model
{
	protected $table = 'customer_demographics';
	protected $primaryKey = 'customer_type_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'customer_desc'
	];

	public function customer_customer_demos()
	{
		return $this->hasMany(CustomerCustomerDemo::class, 'customer_type_id');
	}
}
