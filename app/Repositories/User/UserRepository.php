<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Enums\Constant;
use App\Enums\DBConstant;
use App\Models\User;
use App\Models\UserPurpose;
use App\Repositories\EloquentRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return new User;
    }

    public function store($email, $name, $password)
    {
        $user = $this->getModel();
        if (isset($name)) {
            $user->name = $name;
        }
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();
    }
}
