<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\Blog;
use App\Models\Traveller;
use App\Models\Admin\Service;
use App\Models\Admin\TeamMember;
use App\Models\Admin\Destination;
use App\Models\Admin\Package;
use App\Models\Admin\Order;
use App\Models\Lead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $leads = Lead::with('package')->get();
        return view('agency.leads.index', compact('leads'));
    }
}