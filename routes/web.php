<?php



use Illuminate\Support\Str;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CountNumController;
use App\Http\Controllers\ForgetPWController;
use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\InformationController;

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



Route::middleware('auth')->group(function(){

    Route::resource("/", GuestbookController::class)->only("index");

    Route::resource("/information", InformationController::class)->only("index", "store");

    Route::resource("/count-num", CountNumController::class);

    Route::get("/log-in-suc", function(){
        return view("log-in-suc");
    });

});

// This middleware is nothing now, cause the auth never store the corresponding column from your database into session.
Route::middleware('EALO')->group(function () {

    // Route::resource("/log-in", LoginController::class)->only("index", "store");
    Route::get("log-in", [LoginController::class, 'index'])->name('log-in');
    Route::post("log-in", [LoginController::class, 'login']);

    Route::resource("/sign-up", SignupController::class)->only("index", "store");

    Route::resource("/forget-pw", ForgetPWController::class)->only("index", "store");

    Route::get("/sign-up-suc", function(){
        return view("sign-up-suc");
    });

});

Route::resource("/log-out", LogoutController::class)->only("index");



// Test to see something such as session()->all() to check out what happen when use the auth();
Route::get("/test", function(){
    return view('test');
});


// Route::get('/redirect', function (Request $request) {
//     $request->session()->put('state', $state = Str::random(40));
 
//     $query = http_build_query([
//         'client_id' => '3',
//         'redirect_uri' => 'http://127.0.0.1:8000/auth/callback',
//         'response_type' => 'code',
//         'scope' => '',
//         'state' => $state,
//     ]);
 
//     return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
// });

// Route::get('auth/callback', function (Request $request) {
//     $state = $request->session()->pull('state');
 
//     throw_unless(
//         strlen($state) > 0 && $state === $request->state,
//         InvalidArgumentException::class
//     );
 
//     $response = Http::asForm()->post('http://passport-app.test/oauth/token', [
//         'grant_type' => 'authorization_code',
//         'client_id' => 'client-id',
//         'client_secret' => 'client-secret',
//         'redirect_uri' => 'http://third-party-app.com/callback',
//         'code' => $request->code,
//     ]);
 
//     return $response->json();
// });





