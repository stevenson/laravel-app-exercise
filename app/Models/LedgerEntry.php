<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerEntry extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters){
        if($filters['type'] ?? false){
            $query->where('type','=',request(['type']));
        }
    }
}
