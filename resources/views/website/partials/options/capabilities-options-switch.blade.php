@php $option = (int) ($option ?? 1); @endphp

@if($option === 2)
    @include('website.partials.options.CapabilitiesOption2', ['data' => $data ?? null])
@elseif($option === 3)
    @include('website.partials.options.CapabilitiesOption3', ['data' => $data ?? null])
@elseif($option === 4)
    @include('website.partials.options.CapabilitiesOption4', ['data' => $data ?? null])
@elseif($option === 5)
    @include('website.partials.options.CapabilitiesOption5', ['data' => $data ?? null])
@else
    @include('website.partials.options.CapabilitiesOption1', ['data' => $data ?? null])
@endif
