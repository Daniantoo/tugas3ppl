<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'phone', 'email'];
    protected $table = 'contact';
    public $timestamps = false;

    public function addresses()
    {
        return $this->hasMany(Address::class, 'contact_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
