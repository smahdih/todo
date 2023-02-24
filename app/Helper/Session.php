<?php

namespace App\Helper;

class Session implements SessionInterface
{
    public function __construct(?string $cacheExpire = null, ?string $cacheLimiter = null)
    {
        if (session_status() === PHP_SESSION_NONE) {

            if ($cacheLimiter !== null) {
                session_cache_limiter($cacheLimiter);
            }

            if ($cacheExpire !== null) {
                session_cache_expire($cacheExpire);
            }

            session_start();
        }
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        if (self::has($key)) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return Session
     */
    public static function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
        return self::class;
    }

    public static function remove(string $key): void
    {
        if (self::has($key)) {
            unset($_SESSION[$key]);
        }
    }

    public static function clear(): void
    {
        session_unset();
    }

    public static function has(string $key): bool
    {
        return array_key_exists($key, $_SESSION);
    }

}
