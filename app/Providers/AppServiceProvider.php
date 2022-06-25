<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('gender_diff', function ($attribute, $value, $parameters, $validator) {
            $inputs = $validator->getData();
            $gender = $inputs['gender'];
            $pref_gender = $inputs['pref_gender'];

            if($gender=='male' && $pref_gender == 'male') return true;
            if($gender=='female' && $pref_gender == 'female') return true;
            if($gender=='male' && $pref_gender == 'female') return true;
            if($gender=='female' && $pref_gender == 'male') return true;

        });
    }
}
