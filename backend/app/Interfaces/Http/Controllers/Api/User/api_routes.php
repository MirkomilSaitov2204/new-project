<?php
use Illuminate\Support\Facades\Route;
use Interfaces\Http\Controllers\Api\User\UserController;

Route::get('users', [UserController::class, 'index']);
