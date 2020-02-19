<?php

namespace App\Repositories;

use App\Models\genome;
use App\Repositories\BaseRepository;

/**
 * Class genomeRepository
 * @package App\Repositories
 * @version February 1, 2020, 8:13 pm UTC
*/

class genomeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return genome::class;
    }
}
