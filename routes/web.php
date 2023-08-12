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

// Route::get('/', function () {
//     return view('welcome');
// });

//ajax
//Route::get('/dutrainghiem', 'DutrainghiemController@index');
//Route::post('/trainghiem', 'DutrainghiemController@store_dutrainghiem')->name('store_dutrainghiem');

Route::get('/', 'DefaultController@index');
Route::get('/home', 'DefaultController@index');
Route::get('/chu', 'DefaultController@index');
// Route::get('/search', 'DefaultController@search');
//Route::get('/', 'DefaultController@search');
Route::get('/getdistrict', 'DefaultController@ajaxGetDistricts');
Route::get('/getdistrict/{id}', 'DefaultController@ajaxGetDistricts_id');
Route::get('/getschool', 'DefaultController@ajaxGetschools');

//a
Route::post('/verify_email', 'DefaultController@verify_email')->name('verify_email');
Route::get('/register/step2/{id}', 'DefaultController@get_step_2')->name('get_step_2');
Route::post('/step_2', 'DefaultController@step_2')->name('step_2');
Route::get('/register/step3/{id}', 'DefaultController@get_step_3')->name('get_step_3');
Route::post('/store_student', 'DefaultController@store_student')->name('store_student');
Route::get('/payment/{id}', 'DefaultController@payment')->name('payment');
// Route::get('/test_email', 'DefaultController@test_email')->name('test_email');
//Route::get('/xacnhan/{id}', 'DefaultController@xacnhan')->name('xacnhan');
//Route::get('/truong/{id}', 'DefaultController@truong')->name('truong');
//Route::get('/emailthu', 'DefaultController@emailthu')->name('emailthu');
Route::get('/phieudutrainghiem/{code}', 'CandidateController@export_trainghiem')->name('phieudutrainghiem');


// Route::post('/result_candidates', 'DefaultController@result_candidates')->name('result_candidates');
// Route::get('/export_candidates/{id}', 'CandidateController@export_candidates')->name('export_candidates');
//Route::get('/card_school/{id}', 'CandidateController@card_school')->name('card_school');
//Route::get('/room/{id}', 'CandidateController@room')->name('room');



// adminlogin
Route::get('/admin', 'UserController@getloginadmin');
Route::get('/admin/login', 'UserController@getloginadmin');
Route::post('/admin/login', 'UserController@postloginadmin')->name('admin_login');
Route::get('admin/logout', 'UserController@logoutadmin')->name('admin_logout');

Route::get('pdf/{id}', 'PdfViewerController@index')->name('pdf_viewer');

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    // Route::get('/', function () {
//     return view('welcome');
    // });

    Route::get('test_send_email', 'StudentController@test_send_email')->name('test_send_email');

    Route::group(['prefix' => 'users'], function () {
        Route::get('dashboard', 'UserController@dashboard')->name('user_dashboard');
        Route::get('list', 'UserController@index')->name('user_list');
        Route::get('create', 'UserController@create')->name('user_create');
        Route::post('store', 'UserController@store')->name('user_store');
        Route::get('edit/{id}', 'UserController@edit')->name('user_edit');
        Route::post('update/{id}', 'UserController@update')->name('user_update');
        Route::get('delete/{id}', 'UserController@destroy')->name('user_destroy');
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('list', 'NewsController@index')->name('news_list');
        Route::get('create', 'NewsController@create')->name('news_create');
        Route::post('store', 'NewsController@store')->name('news_store');
        Route::get('edit/{id}', 'NewsController@edit')->name('news_edit');
        Route::post('update/{id}', 'NewsController@update')->name('news_update');
        Route::get('delete/{id}', 'NewsController@destroy')->name('news_destroy');
    });

    Route::group(['prefix' => 'students'], function () {
        Route::get('list', 'StudentController@index')->name('students_list');
        Route::get('accept_all', 'StudentController@accept_all')->name('accept_all');


        Route::post('json_students', 'StudentController@json_students')->name('json_students');

        Route::get('list_verify', 'StudentController@list_verify')->name('students_list_verify');
        Route::get('create', 'StudentController@create')->name('students_create');
        Route::post('store', 'StudentController@store')->name('students_store');
        Route::get('edit/{id}', 'StudentController@edit')->name('students_edit');
        Route::post('update/{id}', 'StudentController@update')->name('students_update');
        Route::post('update_school/{id}', 'StudentController@update_school')->name('students_update_school');
        Route::get('delete/{id}', 'StudentController@destroy')->name('students_destroy');
        Route::get('mail_payment/{id}', 'StudentController@mail_payment')->name('mail_payment');
        Route::get('destroy_payment/{id}', 'StudentController@destroy_payment')->name('destroy_payment');
        Route::get('list_paid', 'StudentController@list_paid')->name('list_paid');
        Route::get('mail_payment_list', 'StudentController@mail_payment_list')->name('mail_payment_list');

        Route::post('update-status', 'StudentController@update_status')->name('students_update_status');

        Route::get('experience', 'StudentController@experience')->name('students_experience');
    });

    Route::group(['prefix' => 'accountant'], function() {
        Route::get('list', 'AccountantController@index')->name('accountant_list');
        Route::get('list-data', 'AccountantController@index_data')->name('accountant_list_data');
        Route::get('list-update', 'AccountantController@list_update')->name('accountant_list_update');
        Route::get('payment-update', 'AccountantController@payment_update')->name('accountant_payment_update');
        Route::get('deposit', 'AccountantController@deposit')->name('accountant_deposit_list');
        Route::get('deposit-data', 'AccountantController@deposit_data')->name('accountant_deposit_list_data');
        Route::post('deposit-update', 'AccountantController@deposit_update')->name('accountant_deposit_update');
        Route::get('no-deposit', 'AccountantController@no_deposit')->name('accountant_no_deposit_list');
        Route::get('no-deposit-data', 'AccountantController@no_deposit_data')->name('accountant_no_deposit_list_data');
    });

    Route::group(['prefix' => 'schools'], function () {
        Route::get('school_create', 'StudentController@school_create')->name('school_create');
        Route::post('school_store', 'StudentController@school_store')->name('school_store');
        Route::get('school_list', 'StudentController@school_list')->name('school_list');
        Route::post('json_schools', 'StudentController@json_schools')->name('json_schools');
        Route::get('all_school', 'StudentController@all_school')->name('all_school');
    });

     Route::group(['prefix' => 'dutrainghiem'], function () {
         Route::get('index', 'DutrainghiemController@admin_index')->name('dutrainghiem_admin_index');
         Route::get('create', 'DutrainghiemController@admin_create')->name('dutrainghiem_admin_create');
    //     Route::post('store', 'DutrainghiemController@admin_store')->name('dutrainghiem_admin_store');
         Route::get('edit/{id}', 'DutrainghiemController@admin_edit')->name('dutrainghiem_admin_edit');
    //     Route::post('update/{id}', 'DutrainghiemController@admin_update')->name('dutrainghiem_admin_update');
         Route::get('delete/{id}', 'DutrainghiemController@admin_destroy')->name('dutrainghiem_admin_destroy');
         Route::post('json_dutrainghiem', 'DutrainghiemController@json_list')->name('dutrainghiem_json_list');
     });

    // Route::group(['prefix' => 'project'], function () {
    //     Route::get('list', 'ProjectController@index')->name('project_list');
    //     Route::get('create', 'ProjectController@create')->name('project_create');
    //     Route::post('store', 'ProjectController@store')->name('project_store');
    //     Route::get('edit/{id}', 'ProjectController@edit')->name('project_edit');
    //     Route::post('update/{id}', 'ProjectController@update')->name('project_update');
    //     Route::get('delete/{id}', 'ProjectController@destroy')->name('project_destroy');
    // });

    // Route::group(['prefix' => 'service'], function () {
    //     Route::get('list', 'ServiceController@index')->name('service_list');
    //     Route::get('create', 'ServiceController@create')->name('service_create');
    //     Route::post('store', 'ServiceController@store')->name('service_store');
    //     Route::get('edit/{id}', 'ServiceController@edit')->name('service_edit');
    //     Route::post('update/{id}', 'ServiceController@update')->name('service_update');
    //     Route::get('delete/{id}', 'ServiceController@destroy')->name('service_destroy');
    // });

    // Route::group(['prefix' => 'contact'], function () {
    //     Route::get('list', 'ContactController@index')->name('contact_list');
    //     Route::get('create', 'ContactController@create')->name('contact_create');
    //     Route::post('store', 'ContactController@store')->name('contact_store');
    //     Route::get('edit/{id}', 'ContactController@edit')->name('contact_edit');
    //     Route::post('update/{id}', 'ContactController@update')->name('contact_update');
    //     Route::get('delete/{id}', 'ContactController@destroy')->name('contact_destroy');
    // });
    // Route::group(['prefix' => 'candidates'], function () {
    //     Route::get('export_sbd/{id}', 'CandidateController@export_sbd')->name('export_sbd');
    //     Route::get('export_all_sbd/{id}', 'CandidateController@export_all_sbd')->name('export_all_sbd');
    //     //Route::get('test_sbd', 'CandidateController@test_sbd')->name('test_sbd');
    //     //Route::get('export_room/{id}', 'CandidateController@export_room')->name('export_room');
    // });

    //Excel

    // Route::get('ex', 'ExcelController@exview');
    // Route::post('import_payments', 'ExcelController@import_payments')->name('import_payments');
    // Route::get('export_payments', 'ExcelController@export_payments')->name('export_payments');

    Route::get('export_students', 'ExcelController@export_students')->name('export_students');
    Route::get('import_students', 'ExcelController@import_students')->name('import_students');
    Route::get('unpaid_export', 'ExcelController@unpaid_export')->name('unpaid_export');
    Route::get('full_option', 'ExcelController@full_option')->name('full_option');
    //Route::post('payment', 'ExcelController@payment')->name('payment');


    // Route::get('sendmail', 'ExcelController@sendmail')->name('sendmail');
    // Route::post('sending_email', 'ExcelController@sending_email')->name('sending_email');

    // Route::post('import_contestants', 'ExcelController@import_contestants')->name('import_contestants');
    // Route::post('contestants_school', 'ExcelController@contestants_school')->name('contestants_school');
    // Route::post('update_contestants_school', 'ExcelController@update_contestants_school')->name('update_contestants_school');
    // Route::get('export_contestants', 'ExcelController@export_contestants')->name('export_contestants');
    // Route::get('export_combo', 'ExcelController@export_combo')->name('export_combo');
    // Route::post('update_contestants', 'ExcelController@update_contestants')->name('update_contestants');


    // Route::post('sendmailconfirm', 'ExcelController@sendmailconfirm')->name('sendmailconfirm');
    // Route::get('export_confirmmail', 'ExcelController@export_confirmmail')->name('export_confirmmail');
});
