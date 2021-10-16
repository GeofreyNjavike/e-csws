@extends('layouts.pmu')
@section('content')


    <x-admin.bread-cumbs name="File Management" />
    @include('flash.flash-messages')
    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (Auth::user()->role_id == 2)
                        <div class="d-flex justify-content-start">
                            <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary"><i
                                    class="fas fa-plus">Add
                                    File</i></button>
                        </div>
                    @endif
                </div>
                <h3 class="d-flex justify-content-center">Available Files</h3>

                <x-pmu.files />
                <x-admin.add-file />
            </div>
        </div>
    </div>





@endsection
