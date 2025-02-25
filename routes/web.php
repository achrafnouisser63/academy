<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MsgController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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




Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['ar', 'fr'])) {
       // App()->setLocale($locale); // تغيير لغة التطبيق
        Session()->put('locale', $locale); // حفظ اللغة في الجلسة
    }
    return redirect()->back();
})->name('lang');




Route::get('/', function () {
    return view('welcome');
});
Route::get('/cources', function () {
    return view('site.cource');
})->name('courses');
Route::get('/cources-details', function () {
    return view('site.course-details');
});

Route::get('/elements', function () {
    return view('site.elements');
});
Route::get('/cource/details', function () {
    return view('site.cource-details');
});
Route::get('/about', function () {
    return view('site.about');
});
Route::get('/event', function () {
    return view('site.event');
});
// Route::get('/faculty', function () {
//     return view('site.faculty');
// });
// Route::get('/admissions', function () {
//     return view('site.admissions');
// });
Route::get('/course/details/{id}', [CourseController::class, 'details'])->name('course.details');
Route::get('/contact', function () {
    return view('site.contact');
});
Route::get('/blog', function () {
    return view('site.blog');
});
Route::get('/blog-single', function () {
    return view('site.blog-single');
});
Route::post('/send-message', [MsgController::class, 'store'])->name('send.message');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');


// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// });

Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

    Route::get('/add-course', [CourseController::class, 'index'])->name('add.course');
    Route::get('/all-course', [CourseController::class, 'all'])->name('all.courses');
    Route::get('/active-courses', [CourseController::class, 'active'])->name('active.courses');
    Route::get('/suspended-courses', [CourseController::class, 'suspended'])->name('suspended.courses');
    Route::get('/course-categories', [CourseController::class, 'categories'])->name('course.categories');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/pending-purchase-orders', [UserController::class, 'pending'])->name('pending.purchase.orders');
    Route::get('/completed-purchase-orders', [UserController::class, 'completed'])->name('completed.purchase.orders');
    Route::post('/add-course', [CourseController::class, 'store'])->name('add.course');
    Route::get('/edit-course/{id}', [CourseController::class, 'edit'])->name('edit.course');
    Route::post('/update-course/{id}', [CourseController::class, 'update'])->name('update.course');
    Route::get('/delete-course/{id}', [CourseController::class, 'destroy'])->name('delete.course');

    Route::get('/suspend-course/{id}', [CourseController::class, 'suspend'])->name('suspend.course');
    Route::get('/activate-course/{id}', [CourseController::class, 'activate'])->name('activate.course');
    Route::get('/all-courses-suspended', [CourseController::class, 'allSuspended'])->name('all.courses.suspended');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::post('/update-user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');
    Route::get('/course-v', [CourseController::class, 'topics'])->name('course.topics');
    Route::post('/add-course-topic', [CourseController::class, 'storeTopic'])->name('add.course.topic');
    // Route::get('/add-topics', [CourseController::class, 'add_topic'])->name('course.topc');
    // Route::post('/add-course-topc', [CourseController::class, 'adddTopic'])->name('add.course.topc');
    Route::post('/approve-course/{id}', [CourseController::class, 'approve'])->name('approve.course');
    Route::post('/reject-course/{id}', [CourseController::class, 'reject'])->name('reject.course');
    Route::get('/rejected-purchase-orders', [CourseController::class, 'rejected'])->name('rejected.purchase.orders');
    Route::get('/show-message/{id}', [MsgController::class, 'show'])->name('show.message');
    Route::get('/all-messages', [MsgController::class, 'all'])->name('all_message');
    Route::get('/delete-message/{id}', [MsgController::class, 'destroy'])->name('delete.message');
    Route::get('/my_account', [ProfileController::class, 'my_account'])->name('my_account');
    Route::patch('/update-profile', [ProfileController::class, 'update_profile'])->name('profile.update');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');

    Route::patch('/update-settings', [ProfileController::class, 'update_settings'])->name('settings.update');
    Route::get('/course-topics', [CourseTopics::class, 'topics'])->name('course.topics');
    Route::get('/course-edite', [CourseController::class, 'edite'])->name('course.edite');
    Route::get('/topics/{id}/edit', [CourseController::class, 'editTopic'])->name('topics.edit');
    Route::delete('/topics/{id}', [CourseController::class, 'destroyTopic'])->name('topics.destroy');

    Route::patch('/topics/{id}', [CourseController::class, 'updateTopic'])->name('topics.update');





}); // End admin middleware group
Route::middleware(['auth'])->group(function () {
    Route::get('/course/enroll/{id}', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::get('/my-profile', [ProfileController::class, 'my_profile'])->name('my_profile');
    Route::get('/my-courses', [CourseController::class, 'my_courses'])->name('my_courses');
    // Route::get('/send-message', [MsgController::class, 'create'])->name('send.message');
    Route::get('/my-requests', [CourseController::class, 'my_requests'])->name('my_requests');
    Route::get('/edit-profile', [ProfileController::class, 'edit_profile'])->name('profile.edit');
    Route::patch('/update-profile', [ProfileController::class, 'update_profile'])->name('profile.update');




});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Route::get('user/{page}', [AdminController::class, 'index']);

require __DIR__.'/auth.php';
