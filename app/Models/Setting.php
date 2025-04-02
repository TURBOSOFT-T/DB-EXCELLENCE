<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   

    public $timestamps = false;

	protected $fillable = ['key', 'value', 'date1', 'date2',
    'logo',
    'logoHeader',
    'telephone',
    'addresse',
    'email',
    'description',
   

    'icon',


    'logocontact',
    'facebook',
    'twitter',
    'instagram',
    'youtube',
    'linkedin',
    'tiktok',
    'fax',

    'des_apropos',
    'image_apropos',
    'titre_apropos',
    'photos'

];

	protected function casts(): array
    {
        return [
            'date1' => 'datetime:Y-m-d',
            'date2' => 'datetime:Y-m-d',
        ];
    }
}
