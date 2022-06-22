@extends('pages/dashboard/index')
@section('content')
<div class="container mx-auto px-4">
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22">
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                    <div class="relative"><img alt="..." src="{{asset('img/user2.jpg')}}" class="shadow-xl rounded-full h-auto align-middle border-none w-48 mt-20"></div>
                </div>
            </div>
            <div class="text-center mt-12">
                <h3 class="text-4xl font-semibold leading-normal mb-2 text-slate-700 mb-2">Jenna Stones</h3>
                <div class="text-sm leading-normal mt-0 mb-2 text-slate-400 font-bold uppercase"><i class="fas fa-map-marker-alt mr-2 text-lg text-slate-400"></i> <!-- -->Los Angeles, California</div>
                <div class="mb-2 text-slate-600 mt-10"><i class="fas fa-briefcase mr-2 text-lg text-slate-400"></i>Cashier</div>
                <div class="mb-2 text-slate-600"><i class="fas fa-university mr-2 text-lg text-slate-400"></i>Universitas Brawijaya</div>
                <div class="mb-2 text-slate-600"><i class="fas fa-user-plus mr-2 text-lg text-slate-400"></i>Karyawan</div>
                <div class="mb-2 text-slate-600"><i class="fas fa-mp3-player mr-2 text-lg text-slate-400"></i>085736656434</div>
            </div>
            <div class="mt-10 py-10 border-t border-slate-200 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <a href="#pablo" class="font-normal text-pink-500">Show more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
