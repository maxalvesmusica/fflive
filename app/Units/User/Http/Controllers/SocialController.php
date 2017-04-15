<?php

namespace App\Units\User\Http\Controllers;

use App\Domains\Users\UserRepository;

class SocialController
{
    protected $userRepository;

    public function __construct(UserRepository $ur)
    {
        $this->userRepository = $ur;
    }

    public function redirect()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        $providerUser = \Socialite::driver('facebook')->stateless()->user();
        $this->getOrCreate($providerUser);

        return redirect()->route('dashboard');
    }

    public function getOrCreate($user)
    {
        $input['name'] = $user->getName();
        $input['email'] = $user->getEmail();
        $input['avatar'] = $user->getAvatar();

        $get = $this->userRepository->findWhere(['email' => $user->getEmail()])->first();
        if ($get != null) {
            \Auth::loginUsingId($get->id);
            return true;
        }
        $get = $this->userRepository->create($input);
        \Auth::loginUsingId($get->id);
        return true;
    }
}