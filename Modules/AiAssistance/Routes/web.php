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

Route::middleware('web', 'SetSessionData', 'auth', 'language', 'timezone', 'AdminSidebarMenu')
    ->prefix('aiassistance')->group(function() {
    Route::get('/dashboard', 'AiAssistanceController@index');
    Route::get('/create/{tool}', 'AiAssistanceController@create');
    Route::post('/generate/{tool}', 'AiAssistanceController@generate');
    Route::get('/history', 'AiAssistanceController@history');

    Route::post('/generate/{tool}', 'AiAssistanceController@generate');

    Route::post('/generate-image', 'AiAssistanceController@generateImage');

    Route::get('install', [\Modules\AiAssistance\Http\Controllers\InstallController::class, 'index']);
    Route::post('install', [\Modules\AiAssistance\Http\Controllers\InstallController::class, 'install']);
    Route::get('install/uninstall', [\Modules\AiAssistance\Http\Controllers\InstallController::class, 'uninstall']);
    Route::get('install/update', [\Modules\AiAssistance\Http\Controllers\InstallController::class, 'update']);

    Route::get('/download-image', 'AiAssistanceController@downloadImage');
    Route::post('/fetch-image', 'AiAssistanceController@fetchImage');
    
    // Add route for processing purchase files
    Route::post('/process-purchase-file', 'AiAssistanceController@processPurchaseFile');

    Route::get('/get-generate-image-modal', 'Modules\AiAssistance\Http\Controllers\AiAssistanceController@getGenerateImageModal')->name('aiassistance.get-generate-image-modal');
    Route::get('/get-purchase-modal', 'Modules\AiAssistance\Http\Controllers\AiAssistanceController@getPurchaseModal')->name('aiassistance.get-purchase-modal');

    Route::post('/generate-product-description', 'Modules\AiAssistance\Http\Controllers\AiAssistanceController@generateProductDescription')->name('aiassistance.generate-product-description');

    Route::post('/generate-report-analysis', 'Modules\AiAssistance\Http\Controllers\AiAssistanceController@generateReportAnalysis')->name('aiassistance.generate-report-analysis');

    Route::post('/generate-product-image', 'AiAssistanceController@generateProductImage');
    Route::get('/download-product-image', 'AiAssistanceController@downloadProductImage');
    Route::post('/fetch-product-image', 'AiAssistanceController@fetchProductImage');
    Route::get('/get-product-image-modal', 'Modules\AiAssistance\Http\Controllers\AiAssistanceController@getProductImageModal')->name('aiassistance.get-product-image-modal');

    Route::post('/ai-profit-loss-analysis', 'AiAssistanceController@aiProfitLossAnalysis')->name('aiassistance.aiProfitLossAnalysis');
    
    // Diet plan generation route
    Route::post('/generate-diet-plan', 'AiAssistanceController@generateDietPlan')->name('aiassistance.generateDietPlan');
    Route::get('/get-diet-plan-modal', 'AiAssistanceController@getDietPlanModal')->name('aiassistance.getDietPlanModal');
    
    // Workout plan generation route
    Route::post('/generate-workout-plan', 'AiAssistanceController@generateWorkoutPlan')->name('aiassistance.generateWorkoutPlan');
    Route::get('/get-workout-plan-modal', 'AiAssistanceController@getWorkoutPlanModal')->name('aiassistance.getWorkoutPlanModal');
    Route::post('/save-workout-plan', 'AiAssistanceController@saveWorkoutPlan')->name('aiassistance.saveWorkoutPlan');
    
    // Message generation routes
    Route::get('/get-message-description-modal', 'AiAssistanceController@getMessageDescriptionModal')->name('aiassistance.getMessageDescriptionModal');
    Route::post('/generate-message', 'AiAssistanceController@generateMessage')->name('aiassistance.generateMessage');
});
