<?php

namespace App;

class Helpers
{
    public static function errorToast($message)
    {
        toastr()->addError($message);
    }

    public static function successToast($message)
    {
        toastr()->addSuccess($message);
    }

    public static function infoToast($message)
    {
        toastr()->addInfo($message);
    }
}
