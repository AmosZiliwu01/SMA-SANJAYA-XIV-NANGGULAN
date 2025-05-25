<?php

use App\Http\Controllers\backend\ActivityLogController;
use App\Http\Controllers\backend\AgendaController;
use App\Http\Controllers\backend\AnnouncementController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\FileController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\VisitorController;
use Illuminate\Support\Facades\Route;

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

/*Frontend Routes*/
Route::prefix('/')->group(function () {

});

/*Backend Routes*/
Route::prefix('dashboard')->group(function () {
    //Dashboard Routes
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    //User Routes
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
    });

    //Activity Log Routes
    Route::prefix('activity-log')->group(function () {
        Route::get('/', [ActivityLogController::class, 'index'])->name('activity-log.index');
    });

    //Agenda Routes
    Route::prefix('agenda')->group(function () {
        Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');
    });

    //Announcement
    Route::prefix('announcement')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('announcement.index');
    });

    //Category Routes
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    });

    //Class Routes
    Route::prefix('class')->group(function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::post('/', [ClassController::class, 'store'])->name('class.store');
    });

    //Comment Routes
    Route::prefix('comment')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comment.index');
    });

    //File Routes
    Route::prefix('file')->group(function () {
        Route::get('/', [FileController::class, 'index'])->name('file.index');
    });

    //Gallery Routes
    Route::prefix('gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    });

    //Message Routes
    Route::prefix('message')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('message.index');
    });

    //Post Routes
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
    });

    //Student Routes
    Route::prefix('student')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('student.index');
    });

    //Teacher Routes
    Route::prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
    });

    //Testimonial Routes
    Route::prefix('testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
    });

    //Visitor Routes
    Route::prefix('visitor')->group(function () {
        Route::get('/', [VisitorController::class, 'index'])->name('visitor.index');
    });
});

/*Auth Routes*/
Route::prefix('auth')->group(function () {
    //Login Routes

    //Logout Routes

    //Password Reset Routes

});

/*Storage Routes*/
