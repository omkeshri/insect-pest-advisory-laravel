<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Crop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'scientific_name',
        'growing_conditions',
        'harvesting_period',
        'image_path',
    ];

    public function pests(): BelongsToMany
    {
        return $this->belongsToMany(Pest::class, 'pest_management')
            ->withPivot([
                'management_strategy',
                'chemical_control',
                'biological_control',
                'cultural_control',
                'preventive_measures',
            ]);
    }
}
