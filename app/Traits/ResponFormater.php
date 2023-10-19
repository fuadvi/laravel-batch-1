<?php

namespace App\Traits;

trait ResponFormater
{
    public function coreReponse(string $message, $data = null, int $statusCode, bool $isSuccess = true)
    {
        if (!$message) return response()->json(['message'=> 'Pesan Wajib Di isi'], 500);

        if ($isSuccess)
        {
            return response()->json(
                [
                    "code" => $statusCode,
                    "message" => $message,
                    "data" => $data
                ],
                $statusCode
            );
        } else
        {
            return response()->json(
                [
                    "code" => $statusCode,
                    "message" => $message,
                ],
                $statusCode
            );
        }
    }

    public function success(string $message, $data, int $statusCode = 200)
    {
        return $this->coreReponse($message,$data,$statusCode);
    }

    public function error(string $message, int $statusCode= 500)
    {
        return $this->coreReponse($message,null,$statusCode,false);
    }
}
