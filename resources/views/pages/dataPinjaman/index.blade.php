@extends('pages/dashboard/index')
@section('content')

<!-- Breadcrumb -->
<nav class="flex py-3 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Apps</span>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Pengajuan Pinjaman</span>
            </div>
        </li>
    </ol>
</nav>

<div class="row flex justify-end my-5">
    <div class="col-3 grid justify-items-end">

        <a href="/pinjaman/create" class="btn-shadow mr-6 lg:mr-0 lg:mb-6 w-32">
            Tambah
        </a>
    </div>
</div>
<div class="container mx-auto px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22">
        <div class="px-12">
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            #
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Nama Karyawan
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Keterangan Pinjaman
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Besaran Uang Pinjaman
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Tanggal Pengembalian
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Status
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pinjaman as $data)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$loop->iteration}}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data->name}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data->note}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap" id="rupiah">
                                            {{$data->money}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$data->end}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if($data->status !=null)
                                            @if($data->status == 'Rejected')
                                            <a class="text-white bg-red-400 px-4 py-2 rounded-lg">Ditolak</a>
                                            @elseif($data->status == 'Approved')
                                            <a class="text-white bg-green-400 px-4 py-2 rounded-lg">Diterima</a>
                                            @endif
                                            @else
                                            <a class="text-gray-500 font-bold bg-gray-400 px-4 py-2 rounded-lg">Belum diputuskan</a>
                                            @endif
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex">
                                            @if((auth()->user()->role == 'admin') || (auth()->user()->role == 'owner'))
                                            @if($data->status == null)
                                            <form action="/leave-request/approved/{{$data->id}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="text-white bg-green-400 px-4 py-2 rounded-lg"><i class="fas fa-check"></i></button>
                                            </form>
                                            <form action="/leave-request/rejected/{{$data->id}}" method="post">
                                                @csrf
                                                @method('patch')
                                                <button type="submit" class="text-white bg-red-400 px-4 py-2 rounded-lg" name="rejected"><i class="fas fa-times"></i></button>
                                            </form>
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var getMoney = document.getElementById('rupiah');
    // let yahoo = formatRupiah('Rp. ', rupiah.innerHTML);
    // console.log(yahoo, "ini valuenya")
    document.querySelectorAll('#rupiah').forEach(x => {
        console.log(x.textContent)

        let intMoney = parseInt(x.textContent)
        console.log(intMoney, 'ini money')
        const rupiah = (number) => {
            if (number === NaN) {
                return "Gaji Belum Diisi"
            }
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
        console.log(rupiah(intMoney), 'ini after convert')
        if (rupiah(intMoney) == 'RpNaN') {
            getMoney.innerHTML = 'Gaji Belum dimasukkan'
        } else {

            x.innerHTML = rupiah(intMoney)
        }
    })
</script>
@endsection
