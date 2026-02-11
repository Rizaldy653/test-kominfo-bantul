<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Supplier
 * 
 * @property int $supplier_id
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
 * @property string|null $homepage
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Supplier extends Model
{
	protected $table = 'suppliers';
	protected $primaryKey = 'supplier_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'supplier_id' => 'int'
	];

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
		'fax',
		'homepage'
	];

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
