<?php

use Illuminate\Support\Facades\Route;
use Interfaces\Http\Controllers\Api\Permission\PermissionController;

Route::post('permissions', [PermissionController::class, 'store']);
