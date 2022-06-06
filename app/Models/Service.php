<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Service model
 *
 * @property string $name
 * @property integer $price
 */
class Service extends Model
{
    use HasFactory;

    /**
     * Fillable attributes
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'price'
    ];
}
