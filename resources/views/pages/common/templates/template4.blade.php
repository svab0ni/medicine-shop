<div class="col-md-12">
    <div class="template4Title">
        <span>
            {{ $title }}
        </span>
    </div>
    <div class="row">
        @foreach($topSelling as $item)
            <div class="col-md-3">
                @include('pages.common.cards.medicine-card', ['item' => $item, 'cardType' => 'related'])
            </div>
        @endforeach
    </div>
</div>