<?php

namespace App\Services;


class FakeWebService
{
    public function send(array $data): bool
    {
        // شبیه سازی پاسخ سرویس خارجی
        $success = rand(0,1);
        if($success){
            return true;
        }

        throw new \Exception(
            'Fake WebService failed'
        );
    }
}
