<div class="col-md-12">
    <div class="template3Title">
        <span>
            {{ $title }}
        </span>
    </div>
    <div class="row">
        @foreach($relatedMedicine as $item)
            <div class="col-md-12">
                @include('pages.common.cards.medicine-card', ['item' => $item, 'cardType' => 'related'])
            </div>
        @endforeach
    </div>
</div>