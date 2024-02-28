<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\agencecontroler;
use App\Http\Controllers\clientcontroler;
use App\Http\Controllers\comptecontroler;

use App\Http\Controllers\FactureController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\gestionairecontroler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [agencecontroler::class, 'index']);

Route::resource('agence', agencecontroler::class);

Route::get('/', [gestionairecontroler::class, 'index']);

Route::resource('gestionaire', gestionairecontroler::class);

Route::get('/', [clientcontroler::class, 'index']);

Route::resource('client', clientcontroler::class);

Route::get('/', [comptecontroler::class, 'index']);

Route::resource('compte', comptecontroler::class);

Route::get('/', [OperationController::class, 'index']);
Route::get('/operationslist/{id}', [comptecontroler::class, 'compteoperations'])->name('compte.operation');;

Route::resource('operation', OperationController::class);

Route::get('/operat/deposit', [OperationController::class, 'showDepositForm'])->name('operation.showDepositForm');
Route::post('/operat/deposit', [OperationController::class, 'deposit'])->name('operation.deposit');

Route::get('/operat/withdraw', [OperationController::class, 'showWithdrawForm'])->name('operation.showWithdrawForm');
Route::post('/operat/withdraw', [OperationController::class, 'withdraw'])->name('operation.withdraw');

Route::get('/operat/transfer', [OperationController::class, 'showTransferForm'])->name('operation.showTransferForm');
Route::post('/operat/transfer', [OperationController::class, 'transfer'])->name('operation.transfer');

Route::prefix('factures')->group(function () {
    Route::get('/', [FactureController::class, 'index'])->name('facture.index');
    Route::get('/{id}/payer', [FactureController::class, 'showPayBillForm'])->name('facture.payer');
    Route::post('/{id}/payer', [FactureController::class, 'payerFacture'])->name('facture.payer.store');
});
Route::get('/factures/create', [FactureController::class, 'create'])->name('facture.create');
Route::post('/factures', [FactureController::class, 'store'])->name('facture.store');
