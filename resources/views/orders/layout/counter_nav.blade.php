<ul id="tabs" class="nav nav-tabs">
    @if(Auth::user()->role <= 3)
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '1') { echo "active"; }?>" href="{{ url('orders') }}">
            <div>Order<span class="d-block">Reception</span></div>
            <div class="order-items my-2">{{ $counter ? $counter['reception_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '2') { echo "active"; }?>" href="{{ url('entry') }}">
            <div>Order<span class="d-block">Entry</span></div>
            <div class="order-items my-2">{{ $counter ? $counter['entry_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '3') { echo "active"; }?>" href="{{ url('preverification') }}">
            <div>Pre<span class="d-block">Verification</span></div>
            <div class="order-items my-2">{{ $counter ? $counter['pre_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '4') { echo "active"; }?>" href="{{ url('filling') }}">
            <div>Filling</div>
            <div class="order-items my-2">{{ $counter ? $counter['filling_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '6') { echo "active"; }?>" href="{{ url('verification') }}">
            <div>Verification</div>
            <div class="order-items my-2">{{ $counter ? $counter['verification_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '7') { echo "active"; }?>" href="{{ url('dispatch') }}">
            <div>Dispatch</div>
            <div class="order-items my-2">{{ $counter ? $counter['dispatch_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '8') { echo "active"; }?>"  href="{{ url('invoice') }}">                                
            <div>Invoice</div>
            <div class="order-items my-2">{{ $counter ? $counter['invoice_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '9') { echo "active"; }?>"  href="{{ url('onhold') }}">
            <div>Problem<span class="d-block">Hold</span></div>
            <div class="order-items my-2">{{ $counter ? $counter['onhold_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '5') { echo "active"; }?>"  href="{{ url('order/delete') }}">
            <div>Delete</div>
            <div class="order-items my-2">{{ $counter ? $counter['delete_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == '10') { echo "active"; }?>"  href="{{ url('complete') }}">
            <div>Complete</div>
            <div class="order-items my-2">{{ $counter ? $counter['complete_count']: '0' }}</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3 <?php if($stage == 'all') { echo "active"; }?>" href="{{ url('all') }}">
            <div>All<span class="d-block">Queues</span></div>
            <div class="order-items my-2">{{ $counter ? $counter['all_count']: '0' }}</div>
        </a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link pt-3 active" href="{{ url('providerallqueue') }}">
            <div>All<span class="d-block">Queues</span></div>
            <div class="order-items my-2">{{ $all_count ? $all_count: '0' }}</div>
        </a>
    </li>
    @endif
</ul>