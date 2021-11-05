<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('frontend.layouts.home');
Route::get('/course', [App\Http\Controllers\Frontend\FrontendController::class, 'course'])->name('frontend.layouts.course');
Route::get('/teacher', [App\Http\Controllers\Frontend\FrontendController::class, 'teacher'])->name('frontend.layouts.teacher');
Route::get('/about', [App\Http\Controllers\Frontend\FrontendController::class, 'about'])->name('frontend.layouts.about');
Route::get('/pricing', [App\Http\Controllers\Frontend\FrontendController::class, 'pricing'])->name('frontend.layouts.pricing');
Route::get('/blog', [App\Http\Controllers\Frontend\FrontendController::class, 'blog'])->name('frontend.layouts.blog');
Route::get('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact'])->name('frontend.layouts.contact');
Route::post('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact_store'])->name('frontend.layouts.contact.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {

    Route::prefix('users')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.view');
        Route::get('/create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.create');
        Route::post('/create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.store');
        //Route::get('/edit/{id}',[\App\Http\Controllers\Admin\UserController::class,'edit'])->name('users.edit');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profiles.view');
        Route::get('/edit',[\App\Http\Controllers\Admin\ProfileController::class,'edit'])->name('profiles.edit');
        Route::post('/update',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profiles.update');
    });

    Route::prefix('logos')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\LogoController::class,'index'])->name('logos.view');
        Route::get('/create',[\App\Http\Controllers\Admin\LogoController::class,'create'])->name('logos.create');
        Route::post('/create',[\App\Http\Controllers\Admin\LogoController::class,'store'])->name('logos.store');
        Route::get('/edit/{id}',[\App\Http\Controllers\Admin\LogoController::class,'edit'])->name('logos.edit');
        Route::post('/update/{id}',[\App\Http\Controllers\Admin\LogoController::class,'update'])->name('logos.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\LogoController::class,'destroy'])->name('logos.delete');
    });

    Route::prefix('setups')->group(function(){
        /*Student Class*/
        Route::get('/student/class/view',[\App\Http\Controllers\Admin\Setup\StudentClassController::class,'index'])->name('setups.student.class.view');
        Route::get('/student/class/create',[\App\Http\Controllers\Admin\Setup\StudentClassController::class,'create'])->name('setups.student.class.create');
        Route::post('/student/class/create',[\App\Http\Controllers\Admin\Setup\StudentClassController::class,'store'])->name('setups.student.class.store');
        Route::put('/student/class/update/{id}',[\App\Http\Controllers\Admin\Setup\StudentClassController::class,'update'])->name('setups.student.class.update');
        Route::get('/student/class/delete/{id}',[\App\Http\Controllers\Admin\Setup\StudentClassController::class,'destroy'])->name('setups.student.class.delete');
        /*Student Class*/

        /*Year*/
        Route::get('/student/year/view',[\App\Http\Controllers\Admin\Setup\YearController::class,'index'])->name('setups.student.year.view');
        Route::get('/student/year/create',[\App\Http\Controllers\Admin\Setup\YearController::class,'create'])->name('setups.student.year.create');
        Route::post('/student/year/create',[\App\Http\Controllers\Admin\Setup\YearController::class,'store'])->name('setups.student.year.store');
        Route::put('/student/year/update/{id}',[\App\Http\Controllers\Admin\Setup\YearController::class,'update'])->name('setups.student.year.update');
        /*Year*/


        /*Group*/
        Route::get('/student/group/view',[\App\Http\Controllers\Admin\Setup\GroupController::class,'index'])->name('setups.student.group.view');
        Route::get('/student/group/create',[\App\Http\Controllers\Admin\Setup\GroupController::class,'create'])->name('setups.student.group.create');
        Route::post('/student/group/create',[\App\Http\Controllers\Admin\Setup\GroupController::class,'store'])->name('setups.student.group.store');
        Route::put('/student/group/update/{id}',[\App\Http\Controllers\Admin\Setup\GroupController::class,'update'])->name('setups.student.group.update');
        /*Group*/

        /*Shift*/
        Route::get('/student/shift/view',[\App\Http\Controllers\Admin\Setup\ShiftController::class,'index'])->name('setups.student.shift.view');
        Route::post('/student/shift/create',[\App\Http\Controllers\Admin\Setup\ShiftController::class,'store'])->name('setups.student.shift.store');
        Route::put('/student/shift/update/{id}',[\App\Http\Controllers\Admin\Setup\ShiftController::class,'update'])->name('setups.student.shift.update');
        /*Shift*/

        /*Fee Category*/
        Route::get('/fee/category/view',[\App\Http\Controllers\Admin\Setup\FeeCategoryController::class,'index'])->name('setups.fee.category.view');
        Route::post('/fee/category/create',[\App\Http\Controllers\Admin\Setup\FeeCategoryController::class,'store'])->name('setups.fee.category.store');
        Route::put('/fee/category/update/{id}',[\App\Http\Controllers\Admin\Setup\FeeCategoryController::class,'update'])->name('setups.fee.category.update');
        /*Fee Category*/

        /*Fee Category Amount*/
        Route::get('/fee/amount/view',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'index'])->name('setups.fee.amount.view');
        Route::get('/fee/amount/create',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'create'])->name('setups.fee.amount.create');
        Route::post('/fee/amount/create',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'store'])->name('setups.fee.amount.store');
        Route::get('/fee/amount/edit/{id}',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'edit'])->name('setups.fee.amount.edit');
        Route::post('/fee/amount/update/{id}',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'update'])->name('setups.fee.amount.update');
        Route::get('/fee/amount/delete/{id}',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'destroy'])->name('setups.fee.amount.delete');
        Route::get('/fee/amount/details/{id}',[\App\Http\Controllers\Admin\Setup\FeeAmountController::class,'show'])->name('setups.fee.amount.details');
        /*Fee Category Amount*/


        /*Exam Type*/
        Route::get('/exam/type/view',[\App\Http\Controllers\Admin\Setup\ExamTypeController::class,'index'])->name('setups.exam.type.view');
        Route::post('/exam/type/create',[\App\Http\Controllers\Admin\Setup\ExamTypeController::class,'store'])->name('setups.exam.type.store');
        Route::put('/exam/type/update/{id}',[\App\Http\Controllers\Admin\Setup\ExamTypeController::class,'update'])->name('setups.exam.type.update');
        /*Exam Type*/

        /*Subject*/
        Route::get('/subject/view',[\App\Http\Controllers\Admin\Setup\SubjectController::class,'index'])->name('setups.subject.view');
        Route::post('/subject/create',[\App\Http\Controllers\Admin\Setup\SubjectController::class,'store'])->name('setups.subject.store');
        Route::put('/subject/update/{id}',[\App\Http\Controllers\Admin\Setup\SubjectController::class,'update'])->name('setups.subject.update');
        /*Subject*/


        /*Assign Subject*/
        Route::get('/assign/subject/view',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'index'])->name('setups.assign.subject.view');
        Route::get('/assign/subject/create',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'create'])->name('setups.assign.subject.create');
        Route::post('/assign/subject/create',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'store'])->name('setups.assign.subject.store');
        Route::get('/assign/subject/edit/{class_id}',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'edit'])->name('setups.assign.subject.edit');
        Route::post('/assign/subject/update/{id}',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'update'])->name('setups.assign.subject.update');
        Route::get('/assign/subject/delete/{id}',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'destroy'])->name('setups.assign.subject.delete');
        Route::get('/assign/subject/details/{id}',[\App\Http\Controllers\Admin\Setup\AssignSubjectController::class,'show'])->name('setups.assign.subject.details');
        /*Assign Subject*/


         /*Subject*/
         Route::get('/designation/view',[\App\Http\Controllers\Admin\Setup\DesignationController::class,'index'])->name('setups.designation.view');
         Route::post('/designation/create',[\App\Http\Controllers\Admin\Setup\DesignationController::class,'store'])->name('setups.designation.store');
         Route::put('/designation/update/{id}',[\App\Http\Controllers\Admin\Setup\DesignationController::class,'update'])->name('setups.designation.update');
         /*Subject*/

    });

});


