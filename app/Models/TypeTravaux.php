<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeTravaux extends Model
{
    use HasFactory;

    // Définissez les champs qui peuvent être assignés en masse
    protected $fillable = [
        'type_de_travaux', // Un tableau de types de travaux
    ];

    // Si vous utilisez MySQL ou un autre SGBD qui prend en charge le type de champ JSON,
    // vous pouvez indiquer à Eloquent que ce champ doit être converti automatiquement en JSON.
    protected $casts = [
        'type_de_travaux' => 'array',
    ];

    // Relations avec d'autres modèles (si nécessaire)
    // Par exemple, si un projet est lié à ce type de travaux
    // public function projet() {
    //     return $this->belongsTo(Projet::class);
    // }
}
