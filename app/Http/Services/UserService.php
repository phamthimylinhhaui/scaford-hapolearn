<?php

namespace App\Http\Services;

class UserService
{
    public function uploadAvatar($image)
    {
        $imageName = time() .config('profile.config_name_avatar') .$image->extension();
        $imagePath = $image->storeAs(config('profile.store_path'), $imageName);

        return config('profile.db_path'). $imagePath;
    }
}
