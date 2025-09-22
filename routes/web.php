<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("landing");
});

Route::get('/2/{uuid}', function ($uuid) {
    return view("step-2", [
        "donation" => \App\Models\Donation::where('uuid', $uuid)->firstOrFail()
    ]);
});

Route::get('/3/{uuid}', function ($uuid) {
    return view("step-3", [
        "supporter" => \App\Models\Supporter::where('uuid', $uuid)->firstOrFail()
    ]);
});
