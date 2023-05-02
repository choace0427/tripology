<div class="col-md-4 wow fadeIn" data-wow-delay="0.2s">
    <div class="sidebar mt_30">

        <form action="{{ url('search') }}" method="post">
            @csrf
            <div class="sidebar-item">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="{{ SEARCH_HERE }}" name="search_string">
                    <span class="input-group-btn">
						<button class="btn btn-default" type="submit" name="form_search"><i class="fa fa-search"></i></button>
					</span>
                </div>
            </div>
        </form>

        <div class="sidebar-item">
            <h3>{{ CATEGORIES }}</h3>
            <ul>
                @foreach($categories as $row)
                    <li><a href="{{ url('category/'.$row->category_slug) }}">{{ $row->category_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="sidebar-item">
            <h3>{{ RECENT_NEWS }}</h3>
            <ul>
                @php $i=0 @endphp
                @foreach($blog_items_no_pagi as $row)
                    @php $i++ @endphp
                    @if($i > $g_setting->sidebar_total_recent_post)
                        @break
                    @endif
                    <li>
                        <a href="{{ url('blog/'.$row->blog_slug) }}">{{ $row->blog_title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
