<?php

namespace App\Helper;

interface SessionInterface
{
    /**
     * @param string $key
     * @return mixed
     */
    public static function get(string $key);

    /**
     * @param string $key
     * @param mixed $value
     * @return SessionInterface
     */
    public static function set(string $key, $value);

    public static function remove(string $key): void;

    public static function clear(): void;

    public static function has(string $key): bool;
}
