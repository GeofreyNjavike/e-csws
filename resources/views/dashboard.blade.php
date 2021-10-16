@extends('layouts.base')
@section('content')



    <x-admin.bread-cumbs name="Dashboard" />
    @include('flash.flash-messages')

    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-admin.files />
                </div>
            </div>
        </div>
    </div>





@endsection
