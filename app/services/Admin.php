<?php

namespace App\services;



class Admin
{
    public function isVet()
    {
        if (auth()->user()->admin)
            return true;
    }
}
