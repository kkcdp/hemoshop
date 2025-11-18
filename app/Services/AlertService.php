<?php

namespace App\Services;

class AlertService
{
    public static function updated($message = null)
    {
        notyf()->success($message ? $message : __('Updated Successfully!'));
    }

    public static function created($message = null)
    {
        notyf()->success($message ? $message : __('Created Successfully!'));
    }
}
