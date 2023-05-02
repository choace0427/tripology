@if(session()->get('traveller_country') == '')
<div class="col-md-12">
    <div class="bg-danger text-white p_15 m_0">
        {{ PROFILE_DATA_UPDATE_WARNING }}
    </div>
</div>
@endif