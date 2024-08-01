<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function paiements() {
        return $this->hasMany(Paiement::class);
    }

    public function locations() {
        return $this->hasMany(Location::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'user_role','user_id','role_id');
    }
    
    public function permissions() {
        return $this->belongsToMany(Permission::class,'user_permission','user_id','permission_id');
    }

    public function hasRole($role) {
        return $this->roles()->where('nom', $role)->first() !== null;
    }

    public function hasAnyRoles($roles) {
        return $this->roles()->whereIn('nom', $roles)->first() !== null;
    }

    public function getAllRoleNamesAttribute() {
        return $this->roles->implode('nom', ' | ');
    }
}
