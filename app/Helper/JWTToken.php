<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function CreateToken($userEmail, $userId)
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 24 * 30,
            'userEmail' => $userEmail,
            'userId' => $userId,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function ReadToken($token)
    {
        try {
            if ($token == null) {
                return 'UnAuthorized';
            } else {
                $key = env('JWT_KEY');
                JWT::decode($token, new Key($key, 'HS256'));
            }
        } catch (Exception $e) {
            return 'UnAuthorized';
        }
    }
}
