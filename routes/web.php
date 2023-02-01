<?php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route for quiz 
Route::group(['prefix'=>'quiz'], function(){
    Route::get('/',[QuizController::class, 'index'])->name('quiz.index');
    Route::get('/create',[QuizController::class, 'create'])->name('quiz.create');
   Route::post('/store',[QuizController::class, 'store'])->name('quiz.store');
   Route::get('/{id}/edit',[QuizController::class, 'edit'])->name('quiz.edit');
   Route::put('/{id}/update', [QuizController::class, 'update'])->name('quiz.update');
   Route::delete('/{id}/delete', [QuizController::class, 'destroy'])->name('quiz.delete');
   
});

// route for Question
Route::group(['prefix'=>'question'], function(){
    Route::get('/create',[QuestionController::class, 'create'])->name('question.create');
    Route::post('/store',[QuestionController::class, 'store'])->name('question.store');
});