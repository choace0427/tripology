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

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('agency');
    }

    public function index()
    {
        $total_post = Blog::count();
        $total_active_travellers = Traveller::where('traveller_status', 'Active')->count();
        $total_services = Service::count();
        $total_team_members = TeamMember::count();
        $total_destinations = Destination::count();
        $total_packages = Package::count();
        $total_completed_orders = Order::where('payment_status', 'Completed')->count();
        $total_pending_orders = Order::where('payment_status', 'Pending')->count();
        return view('admin.home', compact('total_post','total_active_travellers','total_services','total_team_members','total_destinations','total_packages','total_completed_orders','total_pending_orders'));
    }
}