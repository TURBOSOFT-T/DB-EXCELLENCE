<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Models\Order;
use App\Models\Order as ModelsOrder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'slug', 
        'color', 
        'indice', 
    ];
    
    public $timestamps = false;

    public function orders(): HasMany
{
    return $this->hasMany(ModelsOrder::class);
}
}
