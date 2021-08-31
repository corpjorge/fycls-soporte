<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services');
    }

    public function create(Request $request, Service $service)
    {
        $service->fill($request->all());
        $service->save();
        return $service->id;
    }

    public function edit(Service $service): Service
    {
        return $service->load('user');
    }

    public function update(Request $request, Service $service): bool
    {
        $service->attention_date = $request->attention_date;
        $service->solution = $request->solution;
        $service->observations = $request->observations;
        $service->closing_date = Carbon::now();
        $service->token = Str::random(40);
        return $service->save();
    }

    public function qualify(Request $request, Service $service): bool
    {
        $service->qualify = $request->qualify;
        return $service->save();
    }

}
