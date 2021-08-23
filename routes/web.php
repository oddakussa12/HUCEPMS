<?php

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
    // return redirect('/login');
    return redirect('/nonAuthHome');
});

// routes for student
Route::get('/nonAuthHome','NonAuthController@index')->name('nonAuthHome');
Route::get('/applicationForm','NonAuthController@getApplicationForm')->name('applicationForm');
Route::get('/student_courses','StudentController@getStudentCourses')->name('student_courses');
Route::get('/course_details','StudentController@getCourse')->name('course_details');

// route for Admin
// return study program dashboard
Route::get('programes','ProgramLevelController@index')->name('programes');
// route to add program level
Route::post('/addprogramlevel', 'ProgramLevelController@store')->name('addprogramlevel');
// route to edit program level
Route::post('/editProgramLevel', 'ProgramLevelController@update')->name('editProgramLevel');

// route to add program type
Route::post('/addprogramtype', 'ProgramTypeController@store')->name('addprogramtype');
// route to edit program type
Route::post('/editProgramType', 'ProgramTypeController@update')->name('editProgramType');

// return collage dashboard
Route::get('/collages','CollageController@index')->name('collages');
// return collage create page
Route::get('/create_collage','CollageController@create')->name('create_collage');

// create collage post request
Route::post('/create_collage','CollageController@store')->name('create_collage');
// return edit page for collage
Route::get('/collage/edit/{id}','CollageController@edit');

// return post request for updating collage
Route::post('/update_collage/{id}','CollageController@update');

// return departement dashboard
Route::get('/departements','DepartementController@index')->name('departements');
// route to create departement 
Route::get('/create_departement/{id}','DepartementController@create')->name('create_departement');
// reoute to create departement
Route::post('/create_dept','DepartementController@store')->name('create_dept');
















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
Route::put('/profile/update', 'HomeController@profileUpdate')->name('profile.update');
Route::get('/profile/changepassword', 'HomeController@changePasswordForm')->name('profile.change.password');
Route::post('/profile/changepassword', 'HomeController@changePassword')->name('profile.changepassword');

Route::group(['middleware' => ['auth','role:Admin']], function () 
{
    Route::get('/roles-permissions', 'RolePermissionController@roles')->name('roles-permissions');
    Route::get('/role-create', 'RolePermissionController@createRole')->name('role.create');
    Route::post('/role-store', 'RolePermissionController@storeRole')->name('role.store');
    Route::get('/role-edit/{id}', 'RolePermissionController@editRole')->name('role.edit');
    Route::put('/role-update/{id}', 'RolePermissionController@updateRole')->name('role.update');

    Route::get('/permission-create', 'RolePermissionController@createPermission')->name('permission.create');
    Route::post('/permission-store', 'RolePermissionController@storePermission')->name('permission.store');
    Route::get('/permission-edit/{id}', 'RolePermissionController@editPermission')->name('permission.edit');
    Route::put('/permission-update/{id}', 'RolePermissionController@updatePermission')->name('permission.update');

    Route::get('assign-subject-to-class/{id}', 'GradeController@assignSubject')->name('class.assign.subject');
    Route::post('assign-subject-to-class/{id}', 'GradeController@storeAssignedSubject')->name('store.class.assign.subject');

    Route::resource('assignrole', 'RoleAssign');
    Route::resource('classes', 'GradeController');
    Route::resource('subject', 'SubjectController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('parents', 'ParentsController');
    Route::resource('student', 'StudentController');
    Route::get('attendance', 'AttendanceController@index')->name('attendance.index');
});

Route::group(['middleware' => ['auth','role:Teacher']], function () 
{
    Route::post('attendance', 'AttendanceController@store')->name('teacher.attendance.store');
    Route::get('attendance-create/{classid}', 'AttendanceController@createByTeacher')->name('teacher.attendance.create');
});

Route::group(['middleware' => ['auth','role:Parent']], function () 
{
    Route::get('attendance/{attendance}', 'AttendanceController@show')->name('attendance.show');
});

Route::group(['middleware' => ['auth','role:Student']], function () {

});
