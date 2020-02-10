<?php

namespace App\Repositories;

use App\Models\Suggest;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class SuggestRepository.
 */
class SuggestRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Suggest::class;
    }
}
