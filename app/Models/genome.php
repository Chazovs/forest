<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class genome
 * @package App\Models
 * @version February 1, 2020, 8:13 pm UTC
 *
 * @property string species
 * @property integer division_type_id
 * @property integer life_expectancy
 * @property integer beginning_fruiting_from
 * @property integer beginning_fruiting_to
 * @property integer sun_influence
 * @property integer first_shoots
 * @property integer end_growth
 * @property integer life_span_cambium
 * @property integer life_span_zabolon
 */
class genome extends Model
{

    public $table = 'genomes';
    



    public $fillable = [
        'species',
        'division_type_id',
        'life_expectancy',
        'beginning_fruiting_from',
        'beginning_fruiting_to',
        'sun_influence',
        'first_shoots',
        'end_growth',
        'life_span_cambium',
        'life_span_zabolon'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'species' => 'string',
        'division_type_id' => 'integer',
        'life_expectancy' => 'integer',
        'beginning_fruiting_from' => 'integer',
        'beginning_fruiting_to' => 'integer',
        'sun_influence' => 'integer',
        'first_shoots' => 'integer',
        'end_growth' => 'integer',
        'life_span_cambium' => 'integer',
        'life_span_zabolon' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
