<tr>
<td class="header">
<a href="{{ $url }}" class="dib">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/notification-logo.png') }}" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
