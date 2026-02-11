<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerCustomerDemo
 * 
 * @property string $customer_id
 * @property string $customer_type_id
 * 
 * @property Customer $customer
 * @property CustomerDemographic $customer_demographic
 *
 * @package App\Models
 */
class CustomerCustomerDemo extends Model
{
	protected $table = 'customer_customer_demo';
	public $incrementing = false;
	public $timestamps = false;

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function customer_demographic()
	{
		return $this->belongsTo(CustomerDemographic::class, 'customer_type_id');
	}
}
