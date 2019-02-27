<?php

Route::get('/', function () {return view('frontend/index');});
Route::get('about-us', function () {return view('frontend/about');});
Route::get('our-doctors', function () {return view('frontend/doctor');});
Route::get('doctor-profille', function () {return view('frontend/doctor-profile');});
Route::get('our-gallery', function () {return view('frontend/image-gallery');});
Route::get('our-medicine', function () {return view('frontend/all-medicine');});
Route::get('medicine-details', function () {return view('frontend/medicine-details');});
Route::get('contact-us', function () {return view('frontend/contact');});
Route::get('faqs', function () {return view('frontend/faqs');});
Route::get('privacy-policy', function () {return view('frontend/privacy-policy');});
Route::get('proccess-details', function () {return view('frontend/proccess-details');});


//User frontend
Route::get('blog/{sSlug}', 'FrontendController@blog');
Route::get('blog-details/{sSlug}', 'FrontendController@blogDetails');
Route::get('news/{sSlug}', 'FrontendController@news');
Route::get('news-details/{sSlug}', 'FrontendController@newsDetails');
Route::get('medicine-category/{id}/{sSlug}', 'FrontendController@medicine_category');
Route::get('medicine-details/{sSlug}', 'FrontendController@medicineDetails');
Route::get('our-doctors', 'FrontendController@doctors');
Route::get('doctors-profile/{id}', 'FrontendController@doctorsProfile');
Route::get('all-medicine', 'FrontendController@allmedicine');
//Patient Dashboard

Route::resource('patient-profile','PatientController');
Route::post('patient-request/{pID}/{dID}','PatientController@request');
Route::get('all-prescription/{pID}','PatientController@prescription_by_patient')->name('prescriptionByPatient');
Route::get('prescription-by-date/{phID}','PatientController@prescription_by_date')->name('prescriptionByDate');
//PDF generate
Route::get('pdf/{id}','PDFController@export');
Route::get('pdf-invoice/{id}','PDFController@exportInvoice');

// Prescription Order
Route::get('order/{id}','OrderController@order');
Route::post('order-confirm','OrderController@orderConfirm');

//order without prescription
Route::get('order-without-prescription','OrderController@orderWithoutPrescription');
Route::post('order-confirmation','OrderController@confirmOrderWithoutPrescription');
Route::get('all-invoice','OrderController@allInvoice');
Route::get('invoice-by-order-id/{id}','OrderController@invoiceByOrderId');
Route::get('condition-online-health-service','PDFController@condition');

//Admin Order Management
Route::get('admin-all-invoice','OrderController@adminAllInvoice');
Route::get('invoice-details-by-order-id/{id}','OrderController@InvoiceDetailsByOrderId');
Route::post('search-by-order-id','OrderController@searchByOrderId');
Route::put('deliver/{id}','OrderController@deliver');
Route::get('countView','OrderController@index');
Route::get('waiting-order','OrderController@waitingOrder');
Route::get('pending-order','OrderController@pendingOrder');

//Doctor Dashboard
Route::resource('doctor-profile','DoctorController');
//Subscription
Route::resource('subscriber', 'SubscriberController');

Auth::routes();
//After Login or Registration
Route::get('/home', 'HomeController@index')->name('home');
//User Setting
Route::resource('user-information', 'UserController');
Route::resource('members-information', 'MemberPatientsController');
//Product Information
Route::resource('product-category', 'ProductCategoryController');
Route::resource('product-measurement', 'ProductMeasurementController');
Route::resource('product-information', 'ProductMasterController');
Route::resource('product-price', 'ProductPriceController');
//Route::resource('product-stock', 'ProductStockController');
Route::post('select-product', ['as'=>'select-product','uses'=>'ProductPriceController@selectProduct']);
Route::post('select-stock', ['as'=>'select-stock','uses'=>'ProductPriceController@selectProduct']);
Route::post('select-measurment',['as'=>'select-measurment','uses'=>'ProductPriceController@selectMeasurment']);
Route::post('select-price',['as'=>'select-price','uses'=>'ProductPriceController@selectPrice']);
//Blog Information
Route::resource('blog-category', 'BlogCategoryController');
Route::resource('blog-information', 'BlogContentMasterController');
//News Events.3
Route::resource('testimonials', 'TestimonialsController');
Route::resource('news-events', 'NewsEventsController');
Route::resource('gallery-category', 'GalleryCategoryController');
Route::resource('gallery-image', 'GalleryController');
// Prescription
Route::get('pres', 'PrescriptionController@pres')->name('pres');
Route::post('prescription', 'PrescriptionController@store');
//Patient History Coltroller
Route::post('patient-history', 'PatienthistoryController@store');
//Generate HTML
Route::get('generate/{iContentsID}/{iCategoryID}', 'GenerateHTMLController@generate');


?>
