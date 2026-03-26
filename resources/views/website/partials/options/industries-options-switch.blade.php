@php $option = (int) ($option ?? 1); @endphp

@if($option === 2)
    @include('website.partials.options.IndustriesOption2', ['data' => $data ?? null])
@elseif($option === 3)
    @include('website.partials.options.IndustriesOption3', ['data' => $data ?? null])
@elseif($option === 4)
    @include('website.partials.options.IndustriesOption4', ['data' => $data ?? null])
@elseif($option === 5)
    @include('website.partials.options.IndustriesOption5', ['data' => $data ?? null])
@else
    @include('website.partials.options.IndustriesOption1', ['data' => $data ?? null])
@endif
