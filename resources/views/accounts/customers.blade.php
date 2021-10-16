@extends('layouts.accountants')
@section('content')


    <x-admin.bread-cumbs name="Customer Management" />
    @include('flash.flash-messages')
    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-accountants.customers-details />
            </div>
        </div>
    </div>

@endsection
