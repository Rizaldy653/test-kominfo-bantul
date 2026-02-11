<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployeeTerritory
 * 
 * @property int $employee_id
 * @property string $territory_id
 * 
 * @property Employee $employee
 * @property Territory $territory
 *
 * @package App\Models
 */
class EmployeeTerritory extends Model
{
	protected $table = 'employee_territories';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'employee_id' => 'int'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}

	public function territory()
	{
		return $this->belongsTo(Territory::class);
	}
}
