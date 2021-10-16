@extends('layouts.accountants')
@section('content')


    <x-admin.bread-cumbs name="Accounting File Management" />
    @include('flash.flash-messages')
    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Modal -->

                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header ">
                            <h5 class="modal-title " id="exampleModalLongTitle" style="font-weight: 500">Please Fill
                                customer
                                details</h5>

                        </div>
                        <div class="modal-body">
                            <form action="{{ route('customers.update', $file->id) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Cusomer Names</label>
                                    <input class="form-control" id="names" name="names" placeholder="Name of the customer "
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Amount Payed</label>
                                    <input class="form-control" id="names" name="amountpayed" placeholder="Amount Payed"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="message">Customer Contact details</label>
                                    <textarea name="contact" id="" class="form-control" rows="3">
                                                      </textarea>
                                </div>

                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary" value="submit">Aprove Payment</button>
                            </form>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>





@endsection
