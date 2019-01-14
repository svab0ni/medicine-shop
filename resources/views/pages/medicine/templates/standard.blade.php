@php
    $classes = '';
    switch($templateType)
    {
        case $templateType === 'standard':
        $classes .= ' hasMedicineIndexHeader hasMedicineIndexDescription hasMedicineIndexName hasMedicineIndexShortText hasMedicineIndexDetails hasMedicineIndexDate hasMedicineIndexCategory hasMedicineIndexImg hasMedicineIndexInfo hasMedicineIndexLongText';

    }
@endphp

<div class="medicine-index {{ $classes }}">
    <div class="medicine-index-header">
        <div class="medicine-index-description">
            <div class="medicine-index-name">
                {{ $item->name }}
            </div>
            <div class="medicine-index-short-text">
                {{ $item->short_text }}
            </div>
        </div>
        <div class="medicine-index-details">
            <span>
                <a href="/{{$item->category->slug}}" style="color: {{ $item->category->color }};">{{ $item->category->name }}</a>
            </span>
            |
            <span>
                  {{ formatMedicineCardDate($item->published_at)}}
            </span>
            |
            <span>
                  {{ $item->company->name}}
            </span>
        </div>
        <img class="medicine-index-img img-fluid" src="{{ $item->image_url }}" alt="Image description">

    </div>
    <div class="medicine-index-info">
        <div class="medicine-index-long-text">
            {{ $item->long_text }}
        </div>
    </div>
</div>