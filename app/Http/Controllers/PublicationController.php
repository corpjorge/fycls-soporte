<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function list(Publication $publication)
    {
        if (auth()->user()->role_id == 2 ) {
            return $publication->orderBy('id', 'desc')->get();
        } else {
            return $publication->where('workplace_id', auth()->user()->workplace_id)->orderBy('id', 'desc')->get();
        }

    }

    public function create(Request $request, Publication $publication)
    {
        $publication->fill($request->all());
        $publication->workplace_id = 1;
        $publication->save();
    }
}
