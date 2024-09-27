<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'contact_type_id',
        'status',
    ];

    public function contactType()
    {
        return $this->belongsTo(ContactType::class);
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'contact_labels');
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Compaign::class, 'campaign_contacts');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
