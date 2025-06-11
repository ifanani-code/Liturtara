<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpseclib3\File\ASN1\Maps\Certificate;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'google_id',
        'phone_number',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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

    public function certificates(){
        return $this->hasMany(Certificate::class);
    }

    public function notifications(){
        return $this->hasMany(Notifications::class);
    }


        public function surveys(){
            return $this->hasMany(Surveys::class);
        }
    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function tokens()
    {
        return $this->hasOne(Token::class);
    }

    public function userPoint()
    {
        return $this->hasOne(UserPoint::class);
    }

    public function cases()
    {
        return $this->hasMany(Cases::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
