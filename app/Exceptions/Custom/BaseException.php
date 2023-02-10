<?php

namespace App\Exceptions\Custom;

class BaseException extends \Exception
{
    protected $message = 'При обработке запроса произошла ошибка.';

    protected $status = 500;

    public function status(): int
    {
        return $this->status;
    }
}
