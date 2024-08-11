<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Frontend\HomeController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('privacy/policy', [HomeController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('terms-condition', [HomeController::class, 'termsCondition'])->name('termsCondition');
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('allBlog', [HomeController::class, 'allBlog'])->name('allBlog');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::post('contact/store', [ContactController::class, 'store'])->name('contact.add');
Route::post('email-subscription/store', [NewsletterController::class, 'store'])->name('subscription.add');
