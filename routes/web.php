<?php
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Http\Controllers\ExamController;
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


Auth::routes([
    'register'=>false,
    'reset'=>false,
    'verify'=>false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route for quiz 

Route::group(['middleware'=>'isAdmin'],function(){
        
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/home',function(){
        return redirect('/');
    }); 
    Route::group(['prefix'=>'quiz'], function(){
        Route::get('/',[QuizController::class, 'index'])->name('quiz.index');
        Route::get('/create',[QuizController::class, 'create'])->name('quiz.create');
        Route::post('/store',[QuizController::class, 'store'])->name('quiz.store');
        Route::get('/{id}/edit',[QuizController::class, 'edit'])->name('quiz.edit');
        Route::put('/{id}/update', [QuizController::class, 'update'])->name('quiz.update');
        Route::delete('/{id}/delete', [QuizController::class, 'destroy'])->name('quiz.delete');
        Route::get('/{id}/questions', [QuizController::class, 'question'])->name('quiz.question');
    });

    // route for Question
    Route::group(['prefix'=>'question'], function(){
        Route::get('/',[QuestionController::class, 'index'])->name('question.index');
        Route::get('/create',[QuestionController::class, 'create'])->name('question.create');
        Route::post('/store',[QuestionController::class, 'store'])->name('question.store');
        Route::get('/{id}/view',[QuestionController::class, 'show'])->name('question.show');
        Route::get('/{id}/edit',[QuestionController::class, 'edit'])->name('question.edit');
        Route::put('/{id}/update',[QuestionController::class, 'update'])->name('question.update');
        Route::delete('/{id}/delete',[QuestionController::class, 'destroy'])->name('question.delete');
    });

    // route for user controller 
    Route::group(['prefix'=>'user'], function(){
        Route::get('/',[UserController::class, 'index'])->name('user.index');
        Route::get('/create',[UserController::class, 'create'])->name('user.create');
        Route::post('/store',[UserController::class, 'store'])->name('user.store');
        Route::get('/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
        Route::put('/{id}/update',[UserController::class, 'update'])->name('user.update');
        Route::delete('/{id}/delete',[UserController::class, 'destroy'])->name('user.delete');
    });
    Route::group(['prefix'=>'exam'],function(){
        Route::get('/assign',[ExamController::class, 'create'])->name('exam.assign.create');
        Route::post('/assign',[ExamController::class, 'assignExam'])->name('exam.assign');
        Route::get('/user',[ExamController::class, 'userExam'])->name('exam.assign.user');
        Route::post('/remove',[ExamController::class, 'removeExam'])->name('exam.remove');
    });
});

