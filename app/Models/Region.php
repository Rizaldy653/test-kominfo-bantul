<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Region
 * 
 * @property int $region_id
 * @property string $region_description
 * 
 * @property Collection|Territory[] $territories
 *
 * @package App\Models
 */
class Region extends Model
{
	protected $table = 'region';
	protected $primaryKey = 'region_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'region_id' => 'int'
	];

	protected $fillable = [
		'region_description'
	];

	public function territories()
	{
		return $this->hasMany(Territory::class);
	}
}
