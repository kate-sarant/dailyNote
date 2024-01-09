<?php



use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedNoteController;
use Illuminate\Support\Str;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/notes',NoteController::class)->middleware(['auth']);



// Route Grouping Trash
Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function(){
    // move to trash
    Route::get('/',[TrashedNoteController::class,'index'])->name('index');
    // show note
    Route::get('/{note}',[TrashedNoteController::class,'show'])->name('show')->withTrashed()->middleware('auth');
    // update trashed note
    Route::put('/{note}',[TrashedNoteController::class,'update'])->name('update')->withTrashed()->middleware('auth');
    // destroy note
    Route::delete('/{note}',[TrashedNoteController::class,'destroy'])->name('destroy')->withTrashed()->middleware('auth');
   
});

Route::any('/search',[SearchController::class,'index']);
Route::any('/search.trashed_search',[SearchController::class,'trashed_search']);

require __DIR__.'/auth.php';
