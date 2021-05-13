<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    public function devicesWorkplace($id)
    {
        return Device::where('workplace_id',$id)->first();
    }

    public function devicesWorkplaceTotal($id)
    {
        return Device::where('workplace_id',$id)->count();
    }
}
