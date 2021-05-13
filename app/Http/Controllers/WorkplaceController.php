<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workplace;

class WorkplaceController extends Controller
{
    public function workplaceList()
    {
        return Workplace::all();
    }
}
