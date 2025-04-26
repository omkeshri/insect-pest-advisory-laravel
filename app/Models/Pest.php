<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'scientific_name',
        'damage_symptoms',
        'life_cycle',
        'prevention_methods',
        'control_methods',
        'image_path',
    ];

    public function crops(): BelongsToMany
    {
        return $this->belongsToMany(Crop::class, 'pest_management')
            ->withPivot([
                'management_strategy',
                'chemical_control',
                'biological_control',
                'cultural_control',
                'preventive_measures',
            ]);
    }
}
