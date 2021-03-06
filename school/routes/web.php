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
Route::post('/contact', [App\Http\Controllers\Frontend\EmailController::class, 'email_send'])->name('frontend.layouts.contact.store');
// Route::post('/contact', [App\Http\Controllers\Frontend\FrontendController::class, 'contact_store'])->name('frontend.layouts.contact.store');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function () {

    Route::prefix('users')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.view');
        Route::get('/create',[\App\Http\Controllers\Admin\UserController::class,'create'])->name('users.create');
        Route::post('/create',[\App\Http\Controllers\Admin\UserController::class,'store'])->name('users.store');
        Route::put('/update/{id}',[\App\Http\Controllers\Admin\UserController::class,'update'])->name('users.update');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\UserController::class,'destroy'])->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\ProfileController::class,'index'])->name('profiles.view');
        Route::get('/edit',[\App\Http\Controllers\Admin\ProfileController::class,'edit'])->name('profiles.edit');
        Route::post('/update',[\App\Http\Controllers\Admin\ProfileController::class,'update'])->name('profiles.update');
        Route::get('/change-password',[\App\Http\Controllers\Admin\ProfileController::class,'passworView'])->name('profiles.change-password');
        Route::post('/change-password/update',[\App\Http\Controllers\Admin\ProfileController::class,'passworUpdate'])->name('profiles.change-password.update');
    });

    Route::prefix('communicates')->group(function(){
        Route::get('/view',[\App\Http\Controllers\Admin\CommunicateController::class,'index'])->name('communicates.view');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CommunicateController::class,'destroy'])->name('communicates.delete');
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

    Route::prefix('students')->group(function(){

        /*Student Registration*/
        Route::get('/reg/view',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'index'])->name('students.registration.view');
        Route::get('/reg/create',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'create'])->name('students.registration.create');
        Route::post('/reg/create',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'store'])->name('students.registration.store');
        Route::get('/reg/edit/{student_id}',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'edit'])->name('students.registration.edit');
        Route::post('/reg/update/{student_id}',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'update'])->name('students.registration.update');
        Route::get('/year-class-wise',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'yearClassWise'])->name('students.year.class.wise');
        Route::get('/reg/promotion/{student_id}',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'getPromotion'])->name('students.registration.getPromotion');
        Route::post('/reg/promotion/{student_id}',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'setPromotion'])->name('students.registration.setPromotion');
        Route::get('/reg/details/{student_id}',[\App\Http\Controllers\Admin\Student\StudentRegController::class,'details'])->name('students.registration.details');
        /*Student Registration*/


        /*Roll Generate*/
        Route::get('/roll/view',[\App\Http\Controllers\Admin\Student\StudentRollController::class,'index'])->name('students.roll.view');
        Route::get('/roll/get',[\App\Http\Controllers\Admin\Student\StudentRollController::class,'get'])->name('students.roll.get');
        Route::post('/roll/create',[\App\Http\Controllers\Admin\Student\StudentRollController::class,'store'])->name('students.roll.store');
        /*Roll Generate*/


        /*Registration Fee*/
        Route::get('/reg/fee/view',[\App\Http\Controllers\Admin\Student\RegistrationFeeController::class,'index'])->name('students.reg.fee.view');
        Route::get('/reg/get-student',[\App\Http\Controllers\Admin\Student\RegistrationFeeController::class,'getStudent'])->name('students.reg.fee.get');
        Route::get('/reg/fee/playslip',[\App\Http\Controllers\Admin\Student\RegistrationFeeController::class,'playslip'])->name('students.reg.fee.payslip');
        /*Registration Fee*/

        /*Monthly Fee*/
        Route::get('/monthly/fee/view',[\App\Http\Controllers\Admin\Student\MonthlyFeeController::class,'index'])->name('students.monthly.fee.view');
        Route::get('/monthly/get-student',[\App\Http\Controllers\Admin\Student\MonthlyFeeController::class,'getStudent'])->name('students.monthly.fee.get');
        Route::get('/monthly/fee/playslip',[\App\Http\Controllers\Admin\Student\MonthlyFeeController::class,'playslip'])->name('students.monthly.fee.payslip');
        /*Monthly Fee*/

        /*Exam Fee*/
        Route::get('/exam/fee/view',[\App\Http\Controllers\Admin\Student\ExamFeeController::class,'index'])->name('students.exam.fee.view');
        Route::get('/exam/get-student',[\App\Http\Controllers\Admin\Student\ExamFeeController::class,'getStudent'])->name('students.exam.fee.get');
        Route::get('/exam/fee/playslip',[\App\Http\Controllers\Admin\Student\ExamFeeController::class,'playslip'])->name('students.exam.fee.payslip');
        /*Exam Fee*/
    });

    Route::prefix('employees')->group(function(){

        /*Empployee Registration*/
        Route::get('/reg/view',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'index'])->name('employees.registration.view');
        Route::get('/reg/create',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'create'])->name('employees.registration.create');
        Route::post('/reg/create',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'store'])->name('employees.registration.store');
        Route::get('/reg/edit/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'edit'])->name('employees.registration.edit');
        Route::post('/reg/update/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'update'])->name('employees.registration.update');
        Route::get('/reg/details/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeRegController::class,'details'])->name('employees.registration.details');
        /*Empployee Registration*/

        /*Empployee Salary*/
        Route::get('/salary/view',[\App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class,'index'])->name('employees.salary.view');
        Route::get('/salary/increment/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class,'increment'])->name('employees.salary.increment');
        Route::post('/salary/increment/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class,'increment_store'])->name('employees.salary.increment.store');
        Route::get('/salary/details/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class,'details'])->name('employees.salary.details');
        /*Empployee Salary*/

         /*Empployee Leave*/
         Route::get('/leave/view',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'index'])->name('employees.leave.view');
         Route::get('/leave/create',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'create'])->name('employees.leave.create');
         Route::post('/leave/create',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'store'])->name('employees.leave.store');
         Route::get('/leave/edit/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'edit'])->name('employees.leave.edit');
         Route::post('/leave/update/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'update'])->name('employees.leave.update');
         Route::get('/leave/details/{id}',[\App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class,'details'])->name('employees.leave.details');
         /*Empployee Leave*/

          /*Empployee Attendence*/
          Route::get('/attendence/view',[\App\Http\Controllers\Admin\Employee\EmployeeAttendenceController::class,'index'])->name('employees.attendence.view');
          Route::get('/attendence/create',[\App\Http\Controllers\Admin\Employee\EmployeeAttendenceController::class,'create'])->name('employees.attendence.create');
          Route::post('/attendence/create',[\App\Http\Controllers\Admin\Employee\EmployeeAttendenceController::class,'store'])->name('employees.attendence.store');
          Route::get('/attendence/edit/{date}',[\App\Http\Controllers\Admin\Employee\EmployeeAttendenceController::class,'edit'])->name('employees.attendence.edit');
          Route::get('/attendence/details/{date}',[\App\Http\Controllers\Admin\Employee\EmployeeAttendenceController::class,'details'])->name('employees.attendence.details');
          /*Empployee Attendence*/

         /*Empployee Monthly Salary*/
         Route::get('/monthly/salary/view',[\App\Http\Controllers\Admin\Employee\MonthlySalaryController::class,'index'])->name('employees.monthly.salary.view');
         Route::get('/monthly/salary/get',[\App\Http\Controllers\Admin\Employee\MonthlySalaryController::class,'getSalary'])->name('employees.monthly.salary.get');
         Route::get('/monthly/salary/payslip/{employee_id}',[\App\Http\Controllers\Admin\Employee\MonthlySalaryController::class,'payslip'])->name('employees.monthly.salary.payslip');
         /*Empployee Monthly Salary*/

    });

    Route::prefix('marks')->group(function(){

        /*Marks Entry*/
        Route::get('/create',[\App\Http\Controllers\Admin\Mark\MarksController::class,'create'])->name('marks.create');
        Route::post('/create',[\App\Http\Controllers\Admin\Mark\MarksController::class,'store'])->name('marks.store');
        /*Marks Entry*/

        /*Marks Edit*/
        Route::get('/edit',[\App\Http\Controllers\Admin\Mark\MarksController::class,'edit'])->name('marks.edit');
        Route::post('/update',[\App\Http\Controllers\Admin\Mark\MarksController::class,'update'])->name('marks.update');
        /*Marks Edit*/


        /*Grade*/
        Route::get('/grade/view',[\App\Http\Controllers\Admin\Mark\GradeController::class,'index'])->name('marks.grade.view');
        Route::get('/grade/create',[\App\Http\Controllers\Admin\Mark\GradeController::class,'create'])->name('marks.grade.create');
        Route::post('/grade/create',[\App\Http\Controllers\Admin\Mark\GradeController::class,'store'])->name('marks.grade.store');
        Route::get('/grade/edit/{id}',[\App\Http\Controllers\Admin\Mark\GradeController::class,'edit'])->name('marks.grade.edit');
        Route::post('/grade/update/{id}',[\App\Http\Controllers\Admin\Mark\GradeController::class,'update'])->name('marks.grade.update');
        /*Grade*/

    });

    Route::prefix('accounts')->group(function(){
        /*Student Fee*/
        Route::get('/student/fee/view',[\App\Http\Controllers\Admin\Account\StudentFeeController::class,'index'])->name('accounts.fee.view');
        Route::get('/student/fee/create',[\App\Http\Controllers\Admin\Account\StudentFeeController::class,'create'])->name('accounts.fee.create');
        Route::post('/student/fee/create',[\App\Http\Controllers\Admin\Account\StudentFeeController::class,'store'])->name('accounts.fee.store');
        /*Student Fee*/

        /*Employee Salary*/
        Route::get('/employee/salary/view',[\App\Http\Controllers\Admin\Account\EmployeeSalaryController::class,'index'])->name('accounts.salary.view');
        Route::get('/employee/salary/create',[\App\Http\Controllers\Admin\Account\EmployeeSalaryController::class,'create'])->name('accounts.salary.create');
        Route::post('/employee/salary/create',[\App\Http\Controllers\Admin\Account\EmployeeSalaryController::class,'store'])->name('accounts.salary.store');
        /*Employee Salary*/

        /*Other Cost*/
        Route::get('cost/view',[\App\Http\Controllers\Admin\Account\OtherCostController::class,'index'])->name('accounts.cost.view');
        Route::get('cost/create',[\App\Http\Controllers\Admin\Account\OtherCostController::class,'create'])->name('accounts.cost.create');
        Route::post('cost/create',[\App\Http\Controllers\Admin\Account\OtherCostController::class,'store'])->name('accounts.cost.store');
        Route::get('cost/edit/{id}',[\App\Http\Controllers\Admin\Account\OtherCostController::class,'edit'])->name('accounts.cost.edit');
        Route::post('cost/update/{id}',[\App\Http\Controllers\Admin\Account\OtherCostController::class,'update'])->name('accounts.cost.update');
        /*Other Cost*/
    });


    Route::prefix('reports')->group(function(){
        /*Profit*/
        Route::get('/profit/view',[\App\Http\Controllers\Admin\Report\PorfitController::class,'index'])->name('reports.profit.view');
        Route::get('/profit/create',[\App\Http\Controllers\Admin\Report\PorfitController::class,'getProfit'])->name('reports.profit.datewise.get');
        Route::get('/profit/pdf',[\App\Http\Controllers\Admin\Report\PorfitController::class,'pdf'])->name('reports.profit.pdf');
        /*Profit*/

        /*Marksheet*/
        Route::get('/marksheet/view',[\App\Http\Controllers\Admin\Report\MarksheetController::class,'index'])->name('reports.marksheet.view');
        Route::get('/marksheet/create',[\App\Http\Controllers\Admin\Report\MarksheetController::class,'pdf'])->name('reports.marksheet.pdf');
        // Route::get('/marksheet/pdf',[\App\Http\Controllers\Admin\Report\MarksheetController::class,'pdf'])->name('reports.marksheet.pdf');
        /*Marksheet*/

        /*Attendence*/
        Route::get('/attendence/view',[\App\Http\Controllers\Admin\Report\AttendenceController::class,'index'])->name('reports.attendence.view');
        Route::get('/attendence/create',[\App\Http\Controllers\Admin\Report\AttendenceController::class,'getAttendence'])->name('reports.attendence.get');
        Route::get('/attendence/pdf',[\App\Http\Controllers\Admin\Report\AttendenceController::class,'pdf'])->name('reports.attendence.pdf');
        /*Attendence*/


        /*Result*/
        Route::get('/result/view',[\App\Http\Controllers\Admin\Report\ResultController::class,'index'])->name('reports.result.view');
        Route::get('/result/create',[\App\Http\Controllers\Admin\Report\ResultController::class,'getResult'])->name('reports.result.get');
        Route::get('/result/pdf',[\App\Http\Controllers\Admin\Report\ResultController::class,'pdf'])->name('reports.result.pdf');
        /*Result*/

         /*ID Card*/
         Route::get('/id-card/view',[\App\Http\Controllers\Admin\Report\IdCardController::class,'index'])->name('reports.id-card.view');
         Route::get('/id-card/create',[\App\Http\Controllers\Admin\Report\IdCardController::class,'getIdCard'])->name('reports.id-card.get');
         Route::get('/id-card/pdf',[\App\Http\Controllers\Admin\Report\IdCardController::class,'pdf'])->name('reports.id-card.pdf');
         /*ID Card*/
    });


    Route::get('/get-student',[\App\Http\Controllers\Admin\DefaultController::class,'getStudent'])->name('get-student');
    Route::get('/get-subject',[\App\Http\Controllers\Admin\DefaultController::class,'getSubject'])->name('get-subject');
    Route::get('/get-student-mark',[\App\Http\Controllers\Admin\DefaultController::class,'getMark'])->name('get-student-mark');
    /*Student Fee*/
    Route::get('/get-student-account-fee',[\App\Http\Controllers\Admin\DefaultController::class,'getAccountFee'])->name('get-student-account-fee');
    /*Student Fee*/

    /*Employee Salary*/
    Route::get('/get-employee-account-salary',[\App\Http\Controllers\Admin\DefaultController::class,'getAccountSalary'])->name('get-employee-account-salary');
    /*Employee Salary*/
});


