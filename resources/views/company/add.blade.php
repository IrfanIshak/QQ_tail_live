@extends('layouts.app')

@push('styles')
@endpush
@push('scripts')
@endpush

@section('content')
<div class="absolute inset-0 flex justify-center items-center ">
    <div class="m-6 w-4/5">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @livewire('company.add')
        </div>
    </div>
</div>
@endsection