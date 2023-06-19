@php
        $url = Request::path();
        $conName = explode('/',$url);
        if(!isset($conName[3]))
        {
            $conName[3] = '';
        }
        if(!isset($conName[2]))
        {
            $conName[2] = '';
        }
        @endphp

<li class="@if($conName[1] == 'quotes') active @endif">
	<a href="{{ route('traveller.leads') }}"><span><i class="fas fa-home"></i></span>Quotes</a>
</li>
<li class="@if($conName[1] == 'wishlist') active @endif">
	<a href="{{ route('traveller.wishlist') }}"><span><i class="fas bi-heart-fill"></i></span>Wishlist</a>
</li>
<!--li>
	<a href="{{ route('traveller.order') }}"><span><i class="fas fa-history"></i></span>{{ PAYMENT_HISTORY }}</a>
</li-->
<li class="@if($conName[1] == 'profile-change') active @endif">
	<a href="{{ route('traveller.profile_change') }}"><span><i class="fas fa-user"></i></span>{{ UPDATE_PROFILE }}</a>
</li>
<li class="@if($conName[1] == 'password-change') active @endif">
	<a href="{{ route('traveller.password_change') }}"><span><i class="fas fa-key"></i></span>{{ UPDATE_PASSWORD }}</a>
</li>
<li>
	<a href="{{ route('traveller.logout') }}"><span><i class="fas fa-sign-out-alt"></i></span>{{ LOGOUT }}</a>
</li>