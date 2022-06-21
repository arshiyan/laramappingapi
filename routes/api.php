<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getdata', [ApiController::class, 'index'])->name("getdata");


Route::get('xml', function () {

    return <<<XML
           <?xml version="1.0" encoding="UTF-8" ?>
            <root>
              <page>1</page>
              <per_page>6</per_page>
              <total>12</total>
              <total_pages>2</total_pages>
              <data>
                <id>1</id>
                <email>george.bluth@reqres.in</email>
                <first_name>George</first_name>
                <last_name>Bluth</last_name>
                <avatar>https://reqres.in/img/faces/1-image.jpg</avatar>
              </data>
              <data>
                <id>2</id>
                <email>janet.weaver@reqres.in</email>
                <first_name>Janet</first_name>
                <last_name>Weaver</last_name>
                <avatar>https://reqres.in/img/faces/2-image.jpg</avatar>
              </data>
              <data>
                <id>3</id>
                <email>emma.wong@reqres.in</email>
                <first_name>Emma</first_name>
                <last_name>Wong</last_name>
                <avatar>https://reqres.in/img/faces/3-image.jpg</avatar>
              </data>
              <data>
                <id>4</id>
                <email>eve.holt@reqres.in</email>
                <first_name>Eve</first_name>
                <last_name>Holt</last_name>
                <avatar>https://reqres.in/img/faces/4-image.jpg</avatar>
              </data>
              <data>
                <id>5</id>
                <email>charles.morris@reqres.in</email>
                <first_name>Charles</first_name>
                <last_name>Morris</last_name>
                <avatar>https://reqres.in/img/faces/5-image.jpg</avatar>
              </data>
              <data>
                <id>6</id>
                <email>tracey.ramos@reqres.in</email>
                <first_name>Tracey</first_name>
                <last_name>Ramos</last_name>
                <avatar>https://reqres.in/img/faces/6-image.jpg</avatar>
              </data>
              <support>
                <url>https://reqres.in/#support-heading</url>
                <text>To keep ReqRes free, contributions towards server costs are appreciated!</text>
              </support>
            </root>
        XML;

});

