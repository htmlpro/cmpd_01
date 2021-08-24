<ul id="tabs" class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#orderReception">
            <div>Order<span class="d-block">Reception</span></div>
            <div class="order-items my-2"><?= count($orders); ?></div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#orderEntry">
            <div>Order<span class="d-block">Entry</span></div>
            <div class="order-items my-2"><?= count($orders); ?></div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#preVerification">
            <div>Pre<span class="d-block">Verification</span></div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#filing">
            <div>Filing</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#verfication">
            <div>Verification</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#dispatch">
            <div>Dispatch</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#invoice">                                
            <div>Invoice</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#problemHold">
            <div>Problem<span class="d-block">Hold</span></div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#delete">
            <div>Delete</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link pt-3" data-toggle="tab" href="#complete">
            <div>Complete</div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#allQueues">
            <div>All<span class="d-block">Queues</span></div>
            <div class="order-items my-2">0</div>
        </a>
    </li>
</ul>