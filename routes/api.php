<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\IsplateController;
use App\Http\Controllers\OpcineController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\PlanoviController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VodicController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ImageController;
use App\Models\Planovi;
use Illuminate\Support\Facades\Log;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/{name}/transparentnost/{queryParam}', [IsplateController::class, 'queryEntries']);


/////isplate
Route::get('/{name}/transparentnost', [IsplateController::class, 'showEntries']);
Route::get('/{name}/transparentnost/godinePodataka', [IsplateController::class, 'showYearsOfEnteredData']);
Route::get('/isplate', [IsplateController::class, 'index']);
Route::get('/opcine/all', [OpcineController::class, 'index']);
Route::get('/opcine/{name}', [OpcineController::class, 'getOpcinaByName']);
Route::get('/opcine/id/{id}', [OpcineController::class, 'getOpcinaById']);


/////Vodic za gradane
//renamed /{name}/transparentnost
Route::get('/{name}/isplate', [IsplateController::class, 'showEntries']);
Route::get('/{rkpid}/planovi', [PlanoviController::class, 'getProracunPlanovi']);
Route::get('/{rkpid}/{proracunplanid}/{vodicsekcija}/vodici', [VodicController::class, 'getProracunVodic']);
Route::get('/{rkpid}/{proracunplanid}/{vodicsekcija}/vodiciPodaci', [VodicController::class, 'getProracunVodicPodaci']);
Route::get('/{rkpid}/{proracunplanid}/vodiciAktivnostList', [VodicController::class, 'getProracunVodicAktinostList']);

Route::post('/generate-pdf', [PdfController::class, 'generatePdf']);
Route::get('/image/{filename}', [ImageController::class, 'getImage']);
//Auth
// Route::group(['middleware' => ['web']], function () {
// your routes here
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
// });

///images
//For adding an image
// Route::get('/add-image', [App\Http\Controllers\ImageUploadController::class, 'addImage'])->name('images.add');
// //For storing an image
// Route::post('/store-image', [App\Http\Controllers\ImageUploadController::class, 'storeImage']);



///


Route::post('/profile', [ProfileController::class, 'create']);
Route::put('/profile/{id}', [ProfileController::class, 'update']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    ///images
    //For adding an image
    Route::get('/add-image', [App\Http\Controllers\ImageUploadController::class, 'addImage'])->name('images.add');
    //For storing an image
    Route::post('/store-image', [App\Http\Controllers\ImageUploadController::class, 'storeImage']);
});
