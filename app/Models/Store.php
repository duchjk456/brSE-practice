<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'short_name',  
    ];

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }
}
