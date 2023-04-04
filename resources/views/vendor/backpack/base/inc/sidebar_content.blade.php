{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Geo-Locations</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('countries') }}"><i class="nav-icon la la-grip-horizontal"></i> Countries</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('states') }}"><i class="nav-icon la la-grip-horizontal"></i> States</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('cities') }}"><i class="nav-icon la la-grip-horizontal"></i> Cities</a></li>
    </ul>
</li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('categories') }}"><i class="nav-icon la la-layer-group"></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('site-settings') }}"><i class="nav-icon la la-cog"></i> Site settings</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('customers') }}"><i class="nav-icon la la-user-circle"></i> Customers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('affiliates') }}"><i class="nav-icon la la-users"></i> Affiliates</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('destinations') }}"><i class="nav-icon la la-map-marker"></i> Destinations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('leads') }}"><i class="nav-icon la la-dollar-sign"></i> Leads</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('packages') }}"><i class="nav-icon la la-route"></i> Packages</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('collections') }}"><i class="nav-icon la la-database"></i> Collections</a></li>
<!--li class="nav-item"><a class="nav-link" href="{{ backpack_url('collection-mappings') }}"><i class="nav-icon la la-question"></i> Collection mappings</a></li-->