<?php

use Pushpender\MailTracker\MailTrackerController;
use Illuminate\Support\Facades\Route;

Route::get('t/{hash}', [MailTrackerController::class, 'getT'])->name('mailTracker_t');
Route::get('l/{url}/{hash}', [MailTrackerController::class, 'getL'])->name('mailTracker_l');
Route::get('n', [MailTrackerController::class, 'getN'])->name('mailTracker_n');
Route::get('sns', [MailTrackerController::class, 'callback'])->name('mailTracker_SNS');