<?php

declare(strict_types=1);

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AuthModel extends Authenticatable implements JWTSubject
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return int|string
     */
    public function getJWTIdentifier(): int|string
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * @return Attribute
     */
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $this->password = Hash::make($value)
        );
    }

    /**
     * @return int
     * @throws \Exception
     */
    public function generateEmailCode(): int
    {
        $emailCode = random_int(100000, 999999);

        $this->setAttribute('email_code', $emailCode);
        $this->save();

        return $emailCode;
    }
}
