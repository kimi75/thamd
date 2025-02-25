<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurfaceTravaux extends Model
{
    use HasFactory;

    // Définissez les champs assignables en masse
    protected $fillable = [
        'surface_travaux',  // Surface des travaux
        'surface_bien',     // Surface du bien
    ];

    // Si vous avez besoin de gérer les conversions de données pour les champs
    // (par exemple, si ces champs doivent être stockés comme des valeurs numériques)
    protected $casts = [
        'surface_travaux' => 'float',
        'surface_bien' => 'float',
    ];

    // Relations avec d'autres modèles (si nécessaire)
    // Par exemple, si un projet est lié à cette surface de travaux
    // public function projet() {
    //     return $this->belongsTo(Projet::class);
    // }
}
