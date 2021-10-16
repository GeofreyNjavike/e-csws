@extends('layouts.contract')
@section('content')


    <x-admin.bread-cumbs name="Edit File Details" />
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
                <!-- Modal -->


                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title " id="exampleModalLongTitle" style="font-weight: 500">Create File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="{{ route('files.update', $file->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="document">Select file</label>
                                <input type="file" class="form-control-file" id="document" name="filename">
                            </div>
                            <div class="form-group">
                                <label for="message">Simple Message</label>
                                <select name="fileobjective" id="" class="form-control">
                                    <option value="{{ $file->fileobjective }}">{{ $file->fileobjective }}</option>
                                    <option value="">--Update Purpose Of the Document--</option>
                                    @foreach ($objectives as $object)
                                        <option value="{{ $object->fileobjective }}">{{ $object->fileobjective }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('files.show', $file->id) }}" data-toggle="tooltip" data-placement="right"
                            title="View the document"><i class="fas fa-eye">View Availablde Document</i></a>
                        <button type="submit" class="btn btn-primary" style="position: center" value="submit">
                            Update File</button>
                        </form>
                    </div>
                </div>
                <x-admin.add-file />

            </div>
        </div>
    </div>





@endsection
