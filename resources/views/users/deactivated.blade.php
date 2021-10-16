@extends('layouts.base')
@section('content')


    <x-admin.bread-cumbs name="Deactivated Users" />
    @include('flash.flash-messages')
    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="d-flex justify-content-start">
                        <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus">Add
                                User</i></a>
                    </div>
                </div>
                <h3 class="d-flex justify-content-center">Available Users</h3>

                <x-users.deactivated />
            </div>
        </div>
    </div>





@endsection
