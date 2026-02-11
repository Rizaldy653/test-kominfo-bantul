<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Territory
 * 
 * @property string $territory_id
 * @property string $territory_description
 * @property int $region_id
 * 
 * @property Region $region
 * @property Collection|EmployeeTerritory[] $employee_territories
 *
 * @package App\Models
 */
class Territory extends Model
{
	protected $table = 'territories';
	protected $primaryKey = 'territory_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'territory_description',
		'region_id'
	];

	public function region()
	{
		return $this->belongsTo(Region::class);
	}

	public function employee_territories()
	{
		return $this->hasMany(EmployeeTerritory::class);
	}
}
