<?php

use App\Http\Controllers\backend\ActivityLogController;
use App\Http\Controllers\backend\AgendaController;
use App\Http\Controllers\backend\AnnouncementController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\FileController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SchoolManagementController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\VisitorController;
use App\Http\Controllers\frontend\FeAboutController;
use App\Http\Controllers\frontend\FeContactController;
use App\Http\Controllers\frontend\FeDocumentController;
use App\Http\Controllers\frontend\FeHomeController;
use App\Http\Controllers\frontend\FeInformationController;
use App\Http\Controllers\frontend\FeGalleryController;
use App\Http\Controllers\frontend\FePostController;
use App\Http\Controllers\frontend\FeTeacherController;
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
    // Home Page
    Route::get('/', [FeHomeController::class, 'index'])->name('fe-home.index');

    // Information Page
    Route::get('/information', [FeInformationController::class, 'index'])->name('fe-information.index');

    // About Page
    Route::get('/about', [FeAboutController::class, 'index'])->name('fe-about.index');

    // Contact Page
    Route::get('/contact', [FeContactController::class, 'index'])->name('fe-contact.index');
    Route::post('/contact', [FeContactController::class, 'store'])->name('fe-contact.store');

    // Gallery Page
    Route::get('/gallery', [FeGalleryController::class, 'index'])->name('fe-gallery.index');

    // Post Page
    Route::prefix('artikel')->name('fe-post.')->group(function () {
        Route::get('/', [FePostController::class, 'index'])->name('index');
        Route::get('/search', [FePostController::class, 'search'])->name('search');
        Route::get('/kategori/{slug}', [FePostController::class, 'category'])->name('category');
        Route::get('/{slug}', [FePostController::class, 'show'])->name('detail');
    });

    //Teacher Page
    Route::get('/teacher', [FeTeacherController::class, 'index'])->name('fe-teacher.index');

    //Document Page
    Route::get('/document', [FeDocumentController::class, 'index'])->name('fe-document.index');
});

/*Backend Routes*/
Route::prefix('dashboard')->middleware('auth')->group(function () {
    //Dashboard Routes
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    //School Management Routes
    Route::prefix('school-management')->middleware('role:administrator')->name('school-management.')->group(function () {
        Route::get('/', [SchoolManagementController::class, 'index'])->name('index');
        // Principal Routes
        Route::prefix('principal')->name('principal.')->group(function () {
            Route::post('/', [SchoolManagementController::class, 'storePrincipal'])->name('store');
            Route::put('/{principal}', [SchoolManagementController::class, 'updatePrincipal'])->name('update');
            Route::delete('/{principal}', [SchoolManagementController::class, 'deletePrincipal'])->name('delete');
            Route::patch('/{principal}/toggle-active', [SchoolManagementController::class, 'togglePrincipalActive'])->name('toggle-active');
        });
        // About School Routes
        Route::prefix('about-school')->name('about-school.')->group(function () {
            Route::post('/', [SchoolManagementController::class, 'storeAboutSchool'])->name('store');
            Route::put('/{aboutSchool}', [SchoolManagementController::class, 'updateAboutSchool'])->name('update');
            Route::delete('/{aboutSchool}', [SchoolManagementController::class, 'deleteAboutSchool'])->name('delete');
            Route::patch('/{aboutSchool}/toggle-active', [SchoolManagementController::class, 'toggleAboutSchoolActive'])->name('toggle-active');
        });
    });

    //User Routes
    Route::prefix('user')->middleware('role:administrator')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::put('/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.resetPassword');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    //Agenda Routes
    Route::prefix('agenda')->group(function () {
        Route::get('/', [AgendaController::class, 'index'])->name('agenda.index');
        Route::post('/store', [AgendaController::class, 'store'])->name('agenda.store');
        Route::put('/update/{id}', [AgendaController::class, 'update'])->name('agenda.update');
        Route::delete('/destroy/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
    });

    //Announcement
    Route::prefix('announcement')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('announcement.index');
        Route::post('/store', [AnnouncementController::class, 'store'])->name('announcement.store');
        Route::put('/update{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');
        Route::delete('/destroy{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
    });

    //Category Routes
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    //Class Routes
    Route::prefix('class')->middleware('role:administrator')->group(function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::post('/store', [ClassController::class, 'store'])->name('class.store');
        Route::get('/edit/{class}', [ClassController::class, 'edit'])->name('class.edit');
        Route::put('/update/{class}', [ClassController::class, 'update'])->name('class.update');
        Route::delete('/destroy/{class}', [ClassController::class, 'destroy'])->name('class.destroy');
    });

    //File Routes
    Route::prefix('file')->group(function () {
        Route::get('/', [FileController::class, 'index'])->name('file.index');
        Route::post('/', [FileController::class, 'store'])->name('file.store');
        Route::put('/update/{id}', [FileController::class, 'update'])->name('file.update');
        Route::delete('/destroy/{id}', [FileController::class, 'destroy'])->name('file.destroy');
    });

    //Gallery Routes
    Route::prefix('gallery')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
        Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::put('/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::delete('/destroy/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        });

    //Message Routes
    Route::prefix('message')->middleware('role:administrator')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('message.index');
        Route::post('/store', [MessageController::class, 'store'])->name('message.store');
        Route::delete('/destroy/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
        Route::post('/message/reply/{id}', [MessageController::class, 'reply'])->name('message.reply');
    });

    //Post Routes
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
        Route::post('/ckeditor/upload', [PostController::class, 'uploadImage'])->name('ckeditor.upload');
    });

    //Student Routes
    Route::prefix('students')->middleware('role:administrator')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('students.index');
        Route::post('/store', [StudentController::class, 'store'])->name('students.store');
        Route::post('/{student}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('/export', [StudentController::class, 'export'])->name('students.export');
        Route::post('/import/student', [StudentController::class, 'import'])->name('students.import');
    });

    //Teacher Routes
    Route::prefix('teachers')->middleware('role:administrator')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
        Route::post('/store', [TeacherController::class, 'store'])->name('teachers.store');
        Route::post('/update/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
        Route::post('/destroy/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
        Route::get('/export', [TeacherController::class, 'export'])->name('teachers.export');
        Route::post('/import/teacher', [TeacherController::class, 'import'])->name('teachers.import');
    });

    //Testimonial Routes
    Route::prefix('testimonial')->middleware('role:administrator')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
        Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::put('/update/{testimonial}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/destroy/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    });

    //Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.index');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    //faq Routes
    Route::prefix('faq')->group(function () {
        Route::view('/', 'backend.faq.index')->name('faq.index');
    });
});



/* Auth Routes */
Route::prefix('auth')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    // Forgot Password (Request Reset Link)
    Route::get('/forgot-password', [AuthController::class, 'forgot_password'])->name('forgot.password');
    Route::post('/forgot-password', [AuthController::class, 'send_reset_link'])->name('send.reset.link');

    // Reset Password
    Route::get('/reset-password/{token}', [AuthController::class, 'password_reset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'update_password'])->name('update.password');
});
