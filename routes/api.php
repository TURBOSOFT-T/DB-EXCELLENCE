<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
    DepartmentController,
    UniversityController,
    BranchController,
    CoursesController,
    CategoryController,

    ReviewsController,
    EpisodeController,
    ModuleController,
    ChapitreController,
    OnlineClassesController,
    UserController,


};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:passport')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\API\AuthController;

Route::group([ 'prefix' => 'auth'], function () {

  //  Route::post('changepassword', [AuthController::class, 'changepassword']);
});

///////////////////////////users///////////////////////////////////////////////////
Route::post('register', [AuthController::class, 'register']);

Route::post('change_password', [AuthController::class, 'change_password']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgotPassword', [AuthController::class, 'forgotPassword']);
Route::post('changepassword', [AuthController::class, 'changepassword']);
Route::post('resetpassword', [AuthController::class, 'resetpassword']);



Route::post('logout', [AuthController::class, 'logout']);

Route::post('details', [AuthController::class, 'details']);



//////////////////////API ////////////

/////////////////////Users////////////////////////////////

Route::prefix('users')->group(function () {
    Route::get('/AllUsers', [UserController::class, 'AllUsers']);
    Route::get('/istInstructors', [UserController::class, 'listInstructors']);
    Route::get('/detailInstructor/{id}', [UserController::class, 'detailInstructor']);
});


/////////////////////////// University/////////////////////
 Route::prefix('universities')->group(function () {
  //  Route::get('/', [UniversityController::class, 'index'])->middleware('auth');
    Route::get('/', [UniversityController::class, 'index']);
    Route::post('/', [UniversityController::class, 'create']);
    Route::delete('/{id}', [UniversityController::class, 'delete']);
    Route::get('/{id}', [UniversityController::class, 'show']);
    Route::put('/{id}', [UniversityController::class, 'update']);
});

///////////////Departments//////////////////////////////
Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'create']);
    Route::delete('/{id}', [DepartmentController::class, 'delete']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    Route::put('/{id}', [DepartmentController::class, 'update']);
});

///////////////Categories//////////////////////////////
Route::prefix('branches')->group(function () {
    Route::get('/', [BranchController::class, 'index']);
    Route::post('/', [BranchController::class, 'create']);
    Route::delete('/{id}', [BranchController::class, 'delete']);
    Route::get('/{id}', [BranchController::class, 'show']);
    Route::put('/{id}', [BranchController::class, 'update']);
});

///////////////Modules//////////////////////////////
Route::prefix('modules')->group(function () {
    Route::get('/', [ModuleController::class, 'index']);
    Route::post('/', [ModuleController::class, 'create']);
    Route::delete('/{id}', [ModuleController::class, 'delete']);
    Route::get('/{id}', [ModuleController::class, 'show']);
    Route::put('/{id}', [ModuleController::class, 'update']);
});


///////////////Courses//////////////////////////////
Route::prefix('courses')->group(function () {
    Route::get('/', [CoursesController::class, 'index']);
    Route::post('/', [CoursesController::class, 'create']);
    Route::delete('/{id}', [CoursesController::class, 'delete']);
    Route::get('/{id}', [CoursesController::class, 'show']);
    Route::put('/{id}', [CoursesController::class, 'update']);
});

///////////////Chapitres//////////////////////////////
Route::prefix('chapitres')->group(function () {
    Route::get('/', [ChapitreController::class, 'index']);
    Route::post('/', [ChapitreController::class, 'create']);
    Route::delete('/{id}', [ChapitreController::class, 'delete']);
    Route::get('/{id}', [ChapitreController::class, 'show']);
    Route::put('/{id}', [ChapitreController::class, 'update']);
    Route::get('download/{id}', [ChapitreController::class, 'download']);
    Route::get('download/{id}', [ChapitreController::class, 'download']);
    Route::get('/mark-as-read', [ChapitreController::class, 'markAsRead'])->name('mark-as-read');
});



///////////////Online Class//////////////////////////////
Route::prefix('onlines')->group(function () {
    Route::get('/', [OnlineClassesController::class, 'index']);
    Route::post('/', [OnlineClassesController::class, 'create']);
    Route::delete('/{id}', [OnlineClassesController::class, 'delete']);
    Route::get('/{id}', [OnlineClassesController::class, 'show']);
    Route::put('/{id}', [OnlineClassesController::class, 'update']);
});






///////////////Reviews//////////////////////////////
Route::prefix('reviews')->group(function () {
    Route::get('/', [ReviewsController::class, 'index']);
    Route::post('/', [ReviewsController::class, 'create']);
    Route::delete('/{id}', [ReviewsController::class, 'delete']);
    Route::get('/{id}', [ReviewsController::class, 'show']);
    Route::put('/{id}', [ReviewsController::class, 'update']);
});








/*
 Route::middleware('admin')->group(function () {


    Route::prefix('universities')->group(function () {
        Route::get('/', [UniversityController::class, 'index']);
        Route::post('/', [UniversityController::class, 'create']);
        Route::delete('/{id}', [UniversityController::class, 'delete']);
        Route::get('/{id}', [UniversityController::class, 'show']);
        Route::put('/{id}', [UniversityController::class, 'update']);
    });


    }); */





//require __DIR__ . '/auth.php';