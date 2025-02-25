<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdresseProjet extends Model
{
    use HasFactory;

    // Définissez les champs qui peuvent être assignés en masse
    protected $fillable = [
        'formatted_address',
        'accuracy',
        'place_id',
        'locality',
        'administrative_area_level_2',
        'context',
        'importance',
        'name',
        'postal_code',
        'route',
        'latitude',
        'longitude',
        // autres champs si nécessaire...
    ];

    // Relations avec d'autres modèles (si nécessaire)
    // Par exemple, si un projet est lié à cette adresse
    // public function projet() {
    //     return $this->hasOne(Projet::class);
    // }

    // Si vous avez besoin de gérer les conversions de données pour les champs
    // Par exemple, si vous devez stocker latitude et longitude en tant que décimaux
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        // autres conversions si nécessaire
    ];
}
