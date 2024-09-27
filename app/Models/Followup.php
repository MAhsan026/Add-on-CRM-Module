<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id',
        'admin_id',
        'follow_up_date',
        'type',
        'status',
        'reminder_type',
        'reminder_date'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'admin_id'); // Replace 'role_id' with your actual foreign key column name
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id'); // Replace 'role_id' with your actual foreign key column name
    }
}
