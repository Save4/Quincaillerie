<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'unite_id', 'monnaie_id',
        'fournisseur_id', 'magasin_id',
        'description', 'brand',
        'price', 'quantity', 'achat'
    ];
}
