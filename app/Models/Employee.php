<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $employee_id
 * @property string $last_name
 * @property string $first_name
 * @property string|null $title
 * @property string|null $title_of_courtesy
 * @property Carbon|null $birth_date
 * @property Carbon|null $hire_date
 * @property string|null $address
 * @property string|null $city
 * @property string|null $region
 * @property string|null $postal_code
 * @property string|null $country
 * @property string|null $home_phone
 * @property string|null $extension
 * @property bytea|null $photo
 * @property string|null $notes
 * @property int|null $reports_to
 * @property string|null $photo_path
 * 
 * @property Employee|null $employee
 * @property Collection|EmployeeTerritory[] $employee_territories
 * @property Collection|Employee[] $employees
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'employee_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int',
		'birth_date' => 'datetime',
		'hire_date' => 'datetime',
		'photo' => 'bytea',
		'reports_to' => 'int'
	];

	protected $fillable = [
		'last_name',
		'first_name',
		'title',
		'title_of_courtesy',
		'birth_date',
		'hire_date',
		'address',
		'city',
		'region',
		'postal_code',
		'country',
		'home_phone',
		'extension',
		'photo',
		'notes',
		'reports_to',
		'photo_path'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'reports_to');
	}

	public function employee_territories()
	{
		return $this->hasMany(EmployeeTerritory::class);
	}

	public function employees()
	{
		return $this->hasMany(Employee::class, 'reports_to');
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
