<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Customer
 * 
 * @property string $customer_id
 * @property string $company_name
 * @property string|null $contact_name
 * @property string|null $contact_title
 * @property string|null $address
 * @property string|null $city
 * @property string|null $region
 * @property string|null $postal_code
 * @property string|null $country
 * @property string|null $phone
 * @property string|null $fax
 * 
 * @property Collection|CustomerCustomerDemo[] $customer_customer_demos
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	protected $primaryKey = 'customer_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'company_name',
		'contact_name',
		'contact_title',
		'address',
		'city',
		'region',
		'postal_code',
		'country',
		'phone',
		'fax'
	];

	public function customer_customer_demos()
	{
		return $this->hasMany(CustomerCustomerDemo::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function getTopSpender()
	{
		return DB::table('customers as c')
            ->join('orders as o', 'c.customer_id', '=', 'o.customer_id')
            ->join('order_details as od', 'o.order_id', '=', 'od.order_id')
            ->select(
                'c.company_name as customer_name',
                'c.country',
                DB::raw('SUM(od.unit_price * od.quantity * (1 - od.discount)) as total_spending')
            )
            ->groupBy('c.customer_id', 'c.company_name', 'c.country')
            ->orderByDesc('total_spending')
            ->get();
	}
}
