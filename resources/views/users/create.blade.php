@extends('layouts.base')
@section('content')

    @include('flash.flash-messages')

    <x-admin.bread-cumbs name="Register User" />



    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <form action="{{ route('user.store') }}" method="POST">

                            @csrf
                            @method('post')
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example1" class="form-control" name="firstname" />
                                        <label class="form-label" for="form3Example1">First name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="form3Example2" class="form-control" name="lastname" />
                                        <label class="form-label" for="form3Example2">Last name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <!-- Email input -->
                                    <div class="form-outline">
                                        <input type="email" id="form3Example3" class="form-control" name="email" />
                                        <label class="form-label" for="form3Example3">Email address</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- Email input -->
                                    <div class="form-outline">
                                        <select class="form-control" name="role_id">
                                            <option active>--Select Roles--</option>
                                            @forelse ($role as $role )
                                                <option value="{{ $role->id }}">{{ $role->role }}</option>
                                            @empty
                                                <option style="color: red">No Roles defined</option>
                                            @endforelse
                                        </select>
                                        <label class="form-label" for="form3Example3">Select Role</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <!-- Password input -->
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="password" id="form3Example4" class="form-control" name="password" />
                                        <label class="form-label" for="form3Example4">Password</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="password" id="form3Example4" class="form-control"
                                            name="password_confirmation" />
                                        <label class="form-label" for="form3Example4">Confirm Password</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary  btn-block mb-4">Create User</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
