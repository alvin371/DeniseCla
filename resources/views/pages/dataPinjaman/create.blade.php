@extends('pages/dashboard/index')
@section('content')
<div class="container mx-auto px-4">
    <a href="/pinjaman" class="w-24 px-6 py-2 bg-gray-500 text-white border-4 border-gray-300 rounded-lg block my-6">Back</a>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22">
        <form action="/pinjaman" method="post" enctype="multipart/form-data">
            @csrf
            <div class="block mx-4 my-2">
                <div class="flex col mx-5">
                    <div class="col mx-2">
                        <label for="name" class="w-full">Nama Karyawan</label>
                        <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" name="paned" id="name" value="{{auth()->user()->name}}" />
                    </div>
                    <div class="col mx-2">
                        <label for="note" class="w-full">Keterangan Pinjaman</label>
                        <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" name='note' id="note" />
                    </div>
                    <div class="col mx-2">
                        <label for="money" class="w-full">Besaran Uang Pinjaman</label>
                        <input type="number" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" name='money' id="money" />
                    </div>
                    <div class="col mx-2">
                        <label for="end" class="w-full">Tanggal Pengembalian</label>
                        <input type="date" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" name='end' id="end" />
                    </div>
                </div>
                <button type="submit" class="mx-6 my-6 px-8 py-2 bg-green-500 text-white rounded-full">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
