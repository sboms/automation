<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ApologyController;
use App\Http\Controllers\Admin\CommitteeController;
use App\Http\Controllers\Admin\CycleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeprivationController;
use App\Http\Controllers\Admin\ExamCenterController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamFeeController;
use App\Http\Controllers\Admin\ExamResidentsController;
use App\Http\Controllers\Admin\PenaltyController;
use App\Http\Controllers\Admin\PenaltyResidentController;
use App\Http\Controllers\Admin\PreviousTrainingController;
use App\Http\Controllers\Admin\ResidenceYearController;
use App\Http\Controllers\Admin\ResidentController;
use App\Http\Controllers\Admin\ResidentSpecialtyController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\StateResidentController;
use App\Http\Controllers\Admin\VacationController;
use App\Http\Controllers\Admin\VacationResidentController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\Permission\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/e', function () {
    return view('admin.specialty.add');
});
Route::get('/register', function () {
    return redirect()->back();
});
Route::group(['prefix' => 'test'], function () {
    //dd("dfdf");
    Route::get('/', [AdminController::class, 'test']);
});
// Route::group(['prefix' => 'admin', 'middleware' => [
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ]]
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->prefix('admin')->group(function () {


    Route::resources([
        'specialty' => SpecialtyController::class,
        'resident' => ResidentController::class,
        'committee' => CommitteeController::class,
        'user' => AdminController::class,
        'role' => RoleController::class,
        'vacation' => VacationController::class,
        'penalty' => PenaltyController::class,
        'examCenter' => ExamCenterController::class,
        'cycle' => CycleController::class,
        'exam' => ExamController::class,
        'state' => StateController::class,
    ]);
    /** Specialty  Routes */
    Route::group(['prefix' => 'specialty'], function () {
        Route::get('{specialty}/residents', [ResidentSpecialtyController::class, 'residents'])->name('specialty.residents');
    });
    Route::group(['prefix' => 'specialty'], function () {
        Route::get('{specialty}/finished', [ResidentSpecialtyController::class, 'finished'])->name('specialty.finished');
    });
    Route::group(['prefix' => 'specialty'], function () {
        Route::get('{specialty}/graduates', [ResidentSpecialtyController::class, 'graduates'])->name('specialty.graduates');
    });
    Route::group(['prefix' => 'specialty'], function () {
        Route::get('{specialty}/other', [ResidentSpecialtyController::class, 'other'])->name('specialty.other');
    });
    /** Previous Training Routes */
    Route::group(['prefix' => 'test'], function () {
        Route::get('/', [SpecialtyController::class, 'test'])->name('previousTraining.test');
    });
    /** Previous Training Routes */
    Route::group(['prefix' => 'previousTraining'], function () {
        Route::get('{resident}/index', [PreviousTrainingController::class, 'index'])->name('previousTraining.index');
        Route::get('{residentId}/create', [PreviousTrainingController::class, 'create'])->name('previousTraining.create');
        Route::post('{residentid}/store', [PreviousTrainingController::class, 'store'])->name('previousTraining.store');
        Route::get('{residentid}/show', [PreviousTrainingController::class, 'show'])->name('previousTraining.show');
        Route::get('{previousTraining}/edit', [PreviousTrainingController::class, 'edit'])->name('previousTraining.edit');
        Route::get('{previousTraining}/update', [PreviousTrainingController::class, 'update'])->name('previousTraining.update');
    });
    /** Specialty  Routes */
    Route::group(['prefix' => 'role'], function () {
        Route::get('{role}/permissions-to-role', [RoleController::class, 'addPermissionToRoleCreate'])->name('permissionToRole.create');
        Route::put('{role}/permissions-to-role', [RoleController::class, 'addPermissionToRoleStore'])->name('permissionToRole.update');
    });
    /**Residence ResidenceYear Routes */
    Route::group(['prefix' => 'residenceYear'], function () {
        Route::get('{resident}/{specialty}/index', [ResidenceYearController::class, 'index'])->name('residenceYear.index');
        Route::get('{resident}/{specialty}/create', [ResidenceYearController::class, 'create'])->name('residenceYear.create');
        Route::post('{resident}/{specialty}/create', [ResidenceYearController::class, 'store'])->name('residenceYear.create');
        Route::get('{residenceYear}/edit', [ResidenceYearController::class, 'edit'])->name('residenceYear.edit');
        Route::post('{residenceYear}/edit', [ResidenceYearController::class, 'update'])->name('residenceYear.edit');
        Route::delete('{residenceYear}/destroy', [ResidenceYearController::class, 'destroy'])->name('residenceYear.destroy');
    });
    /**VacationResident Routes */
    Route::group(['prefix' => 'VacationResident'], function () {
        Route::get('{resident}/{specialty}/index', [VacationResidentController::class, 'index'])->name('vacationResident.index');
        Route::get('{resident}/{specialty}/create', [VacationResidentController::class, 'create'])->name('vacationResident.create');
        Route::post('{resident}/{specialty}/store', [VacationResidentController::class, 'store'])->name('vacationResident.store');
        Route::get('{resident}/{specialty}/{vacation}/edit', [VacationResidentController::class, 'edit'])->name('vacationResident.edit');
        Route::post('{resident}/{specialty}/{vacation}/update', [VacationResidentController::class, 'update'])->name('vacationResident.update');
        Route::delete('{resident}/{specialty}/{vacation}/destroy', [VacationResidentController::class, 'destroy'])->name('vacationResident.destroy');
    });
    /**PenaltyResident Routes */
    Route::group(['prefix' => 'PenaltyResident'], function () {
        Route::get('{resident}/{specialty}/index', [PenaltyResidentController::class, 'index'])->name('penaltyResident.index');
        Route::get('{resident}/{specialty}/create', [PenaltyResidentController::class, 'create'])->name('penaltyResident.create');
        Route::post('{resident}/{specialty}/store', [PenaltyResidentController::class, 'store'])->name('penaltyResident.store');
        Route::get('{resident}/{specialty}/{penalty}/edit', [PenaltyResidentController::class, 'edit'])->name('penaltyResident.edit');
        Route::post('{resident}/{specialty}/{penalty}/update', [PenaltyResidentController::class, 'update'])->name('penaltyResident.update');
        Route::delete('{resident}/{specialty}/{penalty}/destroy', [PenaltyResidentController::class, 'destroy'])->name('penaltyResident.destroy');
    });
    /**Resident Change State Routes */
    Route::group(['prefix' => 'StateResident'], function () {
        Route::get('{resident}/{specialty}/index', [StateResidentController::class, 'index'])->name('StateResident.index');
        Route::get('{resident}/{specialty}/create', [StateResidentController::class, 'create'])->name('StateResident.create');
        Route::post('{resident}/{specialty}/store', [StateResidentController::class, 'store'])->name('StateResident.store');
        Route::get('{resident}/{specialty}/{state}/{pivotId}/edit', [StateResidentController::class, 'edit'])->name('StateResident.edit');
        Route::post('{resident}/{specialty}/{state}/{pivotId}/update', [StateResidentController::class, 'update'])->name('StateResident.update');
        Route::delete('{resident}/{specialty}/{state}/destroy', [StateResidentController::class, 'destroy'])->name('StateResident.destroy');
    });
    /** ExamResidents Routes */
    Route::group(['prefix' => 'ExamResidents'], function () {
        Route::get('{exam}/index', [ExamResidentsController::class, 'index'])->name('ExamResidents.index');
        Route::get('{exam}/create', [ExamResidentsController::class, 'create'])->name('ExamResidents.create');
        Route::post('{exam}/store', [ExamResidentsController::class, 'store'])->name('ExamResidents.store');
        Route::delete('{exam}/destroy', [ExamResidentsController::class, 'destroy'])->name('ExamResidents.destroy');
    });
    /** DeprivationResidents Routes */
    Route::group(['prefix' => 'Deprivation'], function () {
        Route::get('{resident}/{specialty}/index', [DeprivationController::class, 'index'])->name('Deprivation.index');
        Route::get('{resident}/{specialty}/create', [DeprivationController::class, 'create'])->name('Deprivation.create');
        Route::post('{resident}/{specialty}/store', [DeprivationController::class, 'store'])->name('Deprivation.store');
        Route::get('{deprivation}/edit', [DeprivationController::class, 'edit'])->name('Deprivation.edit');
        Route::post('{deprivation}/update', [DeprivationController::class, 'update'])->name('Deprivation.update');
        Route::delete('{deprivation}/destroy', [DeprivationController::class, 'destroy'])->name('Deprivation.destroy');
    });
    /** Apology Routes */
    Route::group(['prefix' => 'Apology'], function () {
        Route::get('{resident}/{specialty}/index', [ApologyController::class, 'index'])->name('Apology.index');
        Route::get('{exam}/{resident}/create', [ApologyController::class, 'create'])->name('Apology.create');
        Route::post('{exam}/{resident}/store', [ApologyController::class, 'store'])->name('Apology.store');
        Route::get('{apology}/edit', [ApologyController::class, 'edit'])->name('Apology.edit');
        Route::post('{apology}/update', [ApologyController::class, 'update'])->name('Apology.update');
        Route::delete('{apology}/destroy', [ApologyController::class, 'destroy'])->name('Apology.destroy');
    });
    /** Exam Fee Routes */
    Route::group(['prefix' => 'ExamFee'], function () {
        Route::get('{exam}/index', [ExamFeeController::class, 'index'])->name('ExamFee.index');
        Route::get('{exam}/{resident}/create', [ExamFeeController::class, 'create'])->name('ExamFee.create');
        Route::post('{exam}/{resident}/store', [ExamFeeController::class, 'store'])->name('ExamFee.store');
        Route::get('{exam}/{resident}/edit', [ExamFeeController::class, 'edit'])->name('ExamFee.edit');
        Route::post('{examFee}/update', [ExamFeeController::class, 'update'])->name('ExamFee.update');
        Route::delete('{exam}/{resident}/destroy', [ExamFeeController::class, 'destroy'])->name('ExamFee.destroy');
    });
    /** Result Routes */
    Route::group(['prefix' => 'Result'], function () {
        Route::get('{exam}/index', [ResultController::class, 'index'])->name('Result.index');
        Route::get('{exam}/create', [ResultController::class, 'create'])->name('Result.create');
        Route::post('{exam}/store', [ResultController::class, 'store'])->name('Result.store');
        Route::get('{result}/edit', [ResultController::class, 'edit'])->name('Result.edit');
        Route::post('{result}/update', [ResultController::class, 'update'])->name('Result.update');
        Route::delete('{result}/destroy', [ResultController::class, 'destroy'])->name('Result.destroy');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});
