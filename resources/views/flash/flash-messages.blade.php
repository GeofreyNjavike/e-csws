@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
            role="alert">
            <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
            <span class="font-semibold mr-2 text-left flex-auto">{{ $message }}</span>
            <i class="fas fa-check"></i>
        </div>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="bg-red-100 border border-red-400 text-yellow-400 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error !</strong>
        <span class="block sm:inline">{{ $message }}.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </span>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info" role="alert">
        <strong class="font-bold">Info !</strong>
        <span class="block sm:inline">{{ $message }}.</span>

    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative col-sm-8" role="alert">

                @foreach ($errors->all() as $error)
                    <strong class="font-bold">Error !</strong>
                    <span class="block sm:inline">{{ $error }}.</span>
                    <br>
                @endforeach

                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <i class="fa fas-times"></i>
                </span>
            </div>

        </ul>
    </div>
@endif
