<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    use HasFactory;

    protected $attributes = [
        'price' => 0,
        "type" => "Application"
    ];
    protected $fillable = [
        'type',
        'quantity',
        'price'
    ];

    public function scopeFilter($query, array $filters){
        if($filters['type'] ?? false){
            $query->where('type','=',request(['type']));
        }
    }
}
