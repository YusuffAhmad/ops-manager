<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BillDistributionController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TariffController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\PermissionController;
use App\Http\Controllers\API\DistributionTransformerController;
use App\Http\Controllers\API\CustomerStatusController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        // your actual routes

        Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
            return $request->user();
        });

        Route::middleware('api')->group(static function (): void {

            Route::middleware(['auth:sanctum', 'role:admin|super_admin'])->name('admin.')->group(function () {
                // Users
                Route::apiResource('users', UserController::class);

                // Tariffs
                Route::apiResource('tariffs', TariffController::class);

                // Bill Distribution
                Route::post('/bill/distribute', [BillDistributionController::class, 'ditribute'])->name('bill.distribute');

                // Meter Reading
                Route::apiResource('meter-reading', TariffController::class);

                // DistributionTransformers
                Route::apiResource('distribution-transformers', DistributionTransformerController::class);

                // Roles
                Route::resource('/roles', RoleController::class);
                Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
                Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

                // Customers
                Route::post('/import-customers', [CustomerController::class, 'importSubmittedCustomersFile'])->name('customers.importCustomersFile');

                Route::get('/customers', [CustomerController::class, 'index']);
                Route::get('/customer/{customer}', [CustomerController::class, 'show']);
                Route::post('/customers-status', [CustomerStatusController::class, 'create']);


                // Permissions
                Route::resource('/permissions', PermissionController::class);
                Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
                Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
            });


            Route::middleware('guest')->group(static function (): void {
                Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');
                Route::post('/reset-password', [AuthController::class, 'changePassword'])->name('password.update');
                Route::post('login', [AuthController::class, 'login'])->name('auth.login');
                Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

                Route::get('ping', static fn () => response()->json(['result' => 'pong']));
            });
        });
    });
}
