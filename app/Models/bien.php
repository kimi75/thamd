<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bien extends Model
{
    use HasFactory;

    // Définissez les champs assignables en masse
    protected $fillable = [
        'type_de_bien', // C'est un tableau, donc vous pourriez vouloir le manipuler comme une chaîne JSON
    ];

    // Si vous utilisez MySQL ou un autre SGBD qui prend en charge le type de champ JSON, 
    // vous pouvez également indiquer à Eloquent que ce champ doit être converti automatiquement en JSON.
    protected $casts = [
        'type_de_bien' => 'array',
    ];

    // Relations avec d'autres modèles (si nécessaire)
    // Exemple : Si un bien est lié à un projet
    // public function projet() {
    //     return $this->hasOne(Projet::class);
    // }
}
