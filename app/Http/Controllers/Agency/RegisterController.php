<?php

namespace App\Http\Controllers\Agency;
use App\Models\Admin\Blog;
use App\Models\Traveller;
use App\Models\Admin\Service;
use App\Models\Admin\TeamMember;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use App\Models\Admin\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        //$this->middleware('agency');
    }

    public function index()
    {
        return view('register_agency');
    }
}