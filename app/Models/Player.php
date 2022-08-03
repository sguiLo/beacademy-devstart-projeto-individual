<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_name',
        'photo',
        'birth_date',
        'city',
        'state',
        'country',
        'position',
        'shirt',
        'salary',

    ];

    public function getPlayers(string $search = null)
    {

        $players = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->paginate(30);

        return $players;
    }
}
