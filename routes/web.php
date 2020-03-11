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
    return view('welcome');
});

Route::get('/user-registration',[
'uses'=>'UserRegistrationController@showRegistrationForm',
'as'=>'user-registration'
])->middleware('auth');

Route::post('/user-registration',[
'uses'=>'UserRegistrationController@userSave',
'as'=>'user-save'
])->middleware('auth');

Route::get('/user-list',[
'uses'=>'UserRegistrationController@userlist',
'as'=>'user-list'
]);


Route::get('/user-profile/{userId}',[
'uses'=>'UserRegistrationController@userprofile',
'as'=>'user-profile'
]);

Route::get('/change-user-info/{id}',[
'uses'=>'UserRegistrationController@chnageuserinfo',
'as'=>'change-user-info'
]);

Route::post('/user-info-update',[
'uses'=>'UserRegistrationController@userinfoupdate',
'as'=>'user-info-update'
]);


Route::get('/change-user-avatar/{id}',[
'uses'=>'UserRegistrationController@changeuserphoto',
'as'=>'change-user-avatar'
]);


Route::post('/update-user-photo',[
'uses'=>'UserRegistrationController@updateuserphoto',
'as'=>'update-user-photo'
]);


Route::get('/change-user-password/{id}',[
'uses'=>'UserRegistrationController@changeuserpassword',
'as'=>'change-user-password'
]);
Route::post('/user-password-update',[
'uses'=>'UserRegistrationController@userpasswordupdate',
'as'=>'user-password-update'
]);

//General Section
Route::get('/add-header-footer',[
'uses'=>'HomePageController@AddHeaderFooter',
'as'=>'add-header-footer'
]);

Route::post('/header-footer-save',[
'uses'=>'HomePageController@headerfootersave',
'as'=>'header-footer-save'
]);

Route::get('/manage-header-footer/{id}',[
'uses'=>'HomePageController@manageheaderfooter',
'as'=>'manage-header-footer'
]);



Route::post('/header-footer-update/{id}',[
'uses'=>'HomePageController@updateheaderfooter',
'as'=>'header-footer-update'
]);

Route::get('/add-slide',[
'uses'=>'SlideController@AddSlide',
'as'=>'add-slide'
]);


Route::post('/upload-slide',[
'uses'=>'SlideController@UploadeSlide',
'as'=>'upload-slide'
]);

Route::get('/manage-slide',[
'uses'=>'SlideController@manageslide',
'as'=>'manage-slide'
]);


Route::get('/slide-unpublished/{id}',[
'uses'=>'SlideController@slideunpublished',
'as'=>'slide-unpublished'
]);

Route::get('/slide-published/{id}',[
'uses'=>'SlideController@slidepublished',
'as'=>'slide-published'
]);


Route::get('/photo-gallery',[
'uses'=>'SlideController@PhotoGallery',
'as'=>'photo-gallery'
]);

Route::get('/slide-edite/{id}',[
'uses'=>'SlideController@SlideEdite',
'as'=>'slide-edite'
]);

Route::post('/update-slide/{id}',[
'uses'=>'SlideController@Slideupdate',
'as'=>'update-slide'
]);


Route::get('/slide-delete/{id}',[
'uses'=>'SlideController@SlideDelete',
'as'=>'slide-delete'
]);

Route::get('/school-added',[
'uses'=>'SchoolManagementController@SchoolAdded',
'as'=>'school-added'
]);

Route::post('/School-save',[
'uses'=>'SchoolManagementController@SchoolSave',
'as'=>'School-save'
]);


Route::get('/school-list',[
'uses'=>'SchoolManagementController@Schoollist',
'as'=>'school-list'
]);


Route::get('/school-unpublishe/{id}',[
'uses'=>'SchoolManagementController@unpublishedlist',
'as'=>'school-unpublishe'
]);

Route::get('/school-publishe/{id}',[
'uses'=>'SchoolManagementController@publishedlist',
'as'=>'school-publishe'
]);

Route::get('/school-edite/{id}','SchoolManagementController@Schooledite')->name('school-edite');
Route::post('/school-updite/{id}','SchoolManagementController@Schoolupdate')->name('School-update');
Route::get('/school-delete/{id}','SchoolManagementController@Schooldelete')->name('School-delete');


Route::get('/Class-added','ClassManagementController@ClassesAdded')->name('class-added');
Route::post('/Class-insert','ClassManagementController@ClassesInsert')->name('classInsert');
Route::get('/Class-list','ClassManagementController@AllClassesList')->name('classList');

Route::get('/Class-unpublished/{id}','ClassManagementController@Classunpublished')->name('class-unpublishe');
Route::get('/Class-published/{id}','ClassManagementController@Classpublished')->name('classpublisherd');
Route::get('/Class-edite/{id}','ClassManagementController@ClassEdite')->name('class-edite');
Route::post('/Class-update/{id}','ClassManagementController@ClassUpdate')->name('Class-update');
Route::get('/Class-delete/{id}','ClassManagementController@ClassDelete')->name('classs-delete');

Route::get('/Bath-add','BatchManagementController@BatchAdded')->name('Bath-added');

Route::post('/Bath-save','BatchManagementController@BatchSaved')->name('BatchInsert');
Route::get('/Batch-list','BatchManagementController@BatchLList')->name('Bath-List');



Route::get('/Batch-list-ajax','BatchManagementController@batchlistbyajax')->name('batch-list-by-ajax');
Route::get('/Batch-lunpublished','BatchManagementController@Batchunpublished')->name('batch-unpublished');
Route::get('/Batch-published','BatchManagementController@Batchpublished')->name('batch-published');
Route::get('/Batch-delete','BatchManagementController@BatchDeelete')->name('batch-Dltee');
Route::get('/Batch-eidte/{id}','BatchManagementController@BatchEidite')->name('batch-eidte');
Route::post('/Batch-Update/{id}','BatchManagementController@BatchUpdate')->name('BatchUpdate');

//studet type
Route::get('/student-type','StudentTypeController@StudentType')->name('student-type');
Route::post('/student-type-add','StudentTypeController@StudentTypeAdd')->name('student-type-add');
Route::get('/student-type-list','StudentTypeController@StudentTypelist')->name('student-type-list');
Route::get('/student-type-unpublished','StudentTypeController@StudentTypeunpublished')->name('student-type-unpublished');

Route::get('/student-type-published','StudentTypeController@StudentTypepublished')->name('student-type-published');

Route::post('/student-type-update','StudentTypeController@StudentTypeupdate')->name('student-type-update');

Route::get('/student-type-delete','StudentTypeController@StudentTypedelete')->name('student-type-delete');

//studentype add
        Route::get('/class-wisestudent-type-add','StudentTypeController@classwiseStudentTypeadd')->name('class-wise-student-type');
//stu type controlle
 Route::get('/student-registration-form','StudentController@studentregistrationform')->name('student-registration-form');
 
 Route::get('/bring-student-type','StudentController@bringStudentType')->name('bring-student-type');       
        

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
