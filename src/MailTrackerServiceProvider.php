<?php

namespace Pushpender\MailTracker;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pushpender\MailTracker\MailTrackerController;


class MailTrackerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // if (MailTracker::$runsMigrations && $this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // }

        // $this->publishConfig();

        // Register console commands
        // $this->registerCommands();
        
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

         // Hook into the mailer
         Event::listen(MessageSending::class, function(MessageSending $event) {
            $tracker = new MailTracker;
            $tracker->messageSending($event);
        });
        Event::listen(MessageSent::class, function(MessageSent $mail) {
            $tracker = new MailTracker;
            $tracker->messageSent($mail);
        });
    }

    // protected function publishConfig()
    // {
    //         $this->publishes([
    //             __DIR__.'/../config/mail-tracker.php' => config_path('mail-tracker.php')
    //         ], 'config');
    // }

    // public function registerCommands()
    // {
    //     if ($this->app->runningInConsole()) {
    //         $this->commands([
    //             Console\MigrateRecipients::class,
    //         ]);
    //     }
    // }

}
