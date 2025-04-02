<?php

namespace App\Models\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Range extends Model
{
    use HasFactory;
    protected $fillable = [ 'max', ];
public $timestamps = false;

public function countries(): BelongsToMany
{
    return $this->belongsToMany(Country::class, 'colissimos')->withPivot('price');
}
}
