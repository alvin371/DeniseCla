@extends('pages/dashboard/index')
@section('content')
<div class="container mx-auto px-4">
    <a href="/payroll" class="w-24 px-6 py-2 bg-gray-500 text-white border-4 border-gray-300 rounded-lg block my-6">Back</a>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22">
        <form action="/jabatan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex mx-4 my-2">
                <div class="flex col mx-5">
                    <label for="gaji" class="my-2 w-48">Buat Jabatan Baru</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="Buat Jabatan Baru" name='jabatan' id="jabatan" />
                </div>
                <button type="submit" class="px-8 py-2 bg-green-500 text-white rounded-full">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
