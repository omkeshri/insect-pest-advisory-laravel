<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PestManagement extends Model
{
    use HasFactory;

    protected $table = 'pest_management';

    protected $fillable = [
        'pest_id',
        'crop_id',
        'management_strategy',
        'chemical_control',
        'biological_control',
        'cultural_control',
        'preventive_measures',
    ];

    public function pest(): BelongsTo
    {
        return $this->belongsTo(Pest::class);
    }

    public function crop(): BelongsTo
    {
        return $this->belongsTo(Crop::class);
    }
}
