<?php

namespace App\Filament\Pages;


use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Get;
use Filament\Pages\Auth\Login;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Rawilk\FilamentPasswordInput\Password;

class CustomLogin extends Login
{
    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label(__('filament-panels::pages/auth/login.form.email.label'))
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1])
            ->rules([
                'required',
                'email'
            ])
            ->validationMessages([
                'required' => 'nhap de',
                'email' => 'nhap email vao de'
            ]);
    }
    protected function getPasswordFormComponent(): Component
    {
        return Password::make('password')
            ->label('1233')
            ->hint(filament()->hasPasswordReset() ? new HtmlString(Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()"> {{ __(\'filament-panels::pages/auth/login.actions.request_password_reset.label\') }}</x-filament::link>')) : null)
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1])
            ->rules([
                'required',
                'min:3'
            ])->validationMessages([
                'required' => 'nhap de',
                'min' => 'nhap du ky tu vao'
            ]);
    }
}
