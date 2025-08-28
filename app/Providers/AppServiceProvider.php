<?php

namespace App\Providers;

use App\Rules\PasswordRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Additioning password rule
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            $rule = new PasswordRule();

            $fail = function ($message) use ($attribute, $validator) {
                $validator->errors()->add($attribute, $message);
            };

            $rule->validate($attribute, $value, $fail);

            return true; // Retorne true se não houver falhas
        });
    }
}
