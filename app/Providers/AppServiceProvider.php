<?php

namespace App\Providers;

use App\Models\Vacancy;
use App\Observers\VacancyObserver;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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
        Vacancy::observe(VacancyObserver::class);

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject("Confirm you account in " . env('APP_NAME'))
                ->greeting("Thanks for joining us!")
                ->line("Your account is almost ready. Click the following button to active your account.")
                ->action("Activate Account", $url)
                ->line("If you did not create this account, you can ignore this message.")
            ;
        });
    }
}
