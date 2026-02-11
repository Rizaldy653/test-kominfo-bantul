<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsState
 * 
 * @property int $state_id
 * @property string|null $state_name
 * @property string|null $state_abbr
 * @property string|null $state_region
 *
 * @package App\Models
 */
class UsState extends Model
{
	protected $table = 'us_states';
	protected $primaryKey = 'state_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int'
	];

	protected $fillable = [
		'state_name',
		'state_abbr',
		'state_region'
	];
}
