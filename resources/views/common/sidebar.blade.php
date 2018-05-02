<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{ route('dashboard') }}" class="simple-text">
            AAAS Inventory
        </a>
    </div>

    <ul class="nav">
        <li {!! (Request::is('/') ? 'class="active"' : '') !!}>
            <a href="{{ url('/') }}">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <p>Stock Issue</p>
            </a>
        </li>

        <li {!! (Route::currentRouteName() == 'stock.issue.report' ? 'class="active"' : '') !!}>
            <a href="{{ route('stock.issue.report') }}">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <p>Stock Issue Report</p>
            </a>
        </li>

        
        <li {!! (Route::currentRouteName() == 'stock.receive' ? 'class="active"' : '') !!}>
            <a href="{{ route('stock.receive') }}">
                <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                <p>Stock Receive</p>
            </a>
        </li>
        
        <li {!! (Route::currentRouteName() == 'stock.receive.report' ? 'class="active"' : '') !!}>
            <a href="{{ route('stock.receive.report') }}">
                <i class="fa fa-rss" aria-hidden="true"></i>
                <p>Stock Receive Report</p>
            </a>
        </li> 

        <li {!! (Route::currentRouteName() == 'items.report' ? 'class="active"' : '') !!}>
            <a href="{{ route('items.report') }}">
                <i class="fa fa-hashtag" aria-hidden="true"></i>
                <p>Items</p>
            </a>
        </li>

    </ul>
</div>