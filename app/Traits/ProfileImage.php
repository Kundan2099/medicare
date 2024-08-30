<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

trait ProfileImage
{
    function generateAdminProfile() {

        if (!Storage::disk('local')->exists('admins')) {
            Storage::disk('local')->makeDirectory('admins');
        }

        $avatar = new Avatar();
        $path =  "admins/".Str::random(40).".png";
        $avatar->create($this->name)
            ->setChars(1)
            ->setShape('square')
            ->setBorder(0, '#fff', 10)
            ->setFontSize(42)
            ->save(storage_path('app/'.$path), 100);
        $this->profile_image = $path;
        $this->save();
    }

    function generateUserProfile() {

        if (!Storage::disk('local')->exists('users')) {
            Storage::disk('local')->makeDirectory('users');
        }

        $avatar = new Avatar();
        $path =  "users/".Str::random(40).".png";
        $avatar->create($this->name)
            ->setChars(1)
            ->setShape('square')
            ->setBorder(0, '#fff', 10)
            ->setFontSize(42)
            ->save(storage_path('app/'.$path), 100);
        $this->profile_image = $path;
        $this->save();
    }
}