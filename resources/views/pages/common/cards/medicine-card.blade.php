@php
    $classes = '';
    switch($cardType)
    {
        case $cardType === 'index':
        $classes .= ' hasIndexMedicineHeader hasIndexMedicineImg hasIndexMedicineCategory hasIndexMedicineInfo hasIndexMedicineName hasIndexMedicinePrice hasIndexMedicineDate';

    }
@endphp

<div class="medicine {{ $classes }}">
    <a href="{{ formatMedicineUrl($item->category->slug, $item->slug, $item->id) }}">
        <div class="medicine-header-info">
            <img class="medicine-img img-fluid" src="{{ $item->image_url }}" alt="Image description">
            <div class="medicine-category-name" style="background: {{ $item->category->color }}">
                {{ $item->category->name }}
            </div>
        </div>
        <div class="medicine-info">
            <div class="medicine-name">
                {{ $item->name }}
            </div>
            <div class="medicine-price">
                Price: {{ $item->price }} $
            </div>
            <div class="medicine-date">
                {{ formatMedicineCardDate($item->published_at )}}
            </div>
        </div>
    </a>
</div>