@extends('pages/dashboard/index')
@section('content')
<div class="container mx-auto px-4">
    <a href="/karyawan" class="w-24 px-6 py-2 bg-gray-500 text-white border-4 border-gray-300 rounded-lg block my-6">Back</a>
    <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-22">
        <form action="/karyawan/update/{{$user->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="flex mx-4 my-12">
                <div class="col mx-5">
                    <label for="name" class="my-2">Name</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name" placeholder="John Doe" name='name' value="{{$user->name}}" />
                </div>
                <div class="col mx-5">
                    <label for="email" class="my-2">Email</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="email" placeholder="Email address" name='email' value="{{$user->email}}" />
                </div>
                <div class="col mx-5">
                    <label for="password" class="my-2">Password</label>
                    <input type="password" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="password" placeholder="leave it blank if not updated" name='password' />
                </div>
                <div class="col mx-5">
                    <label for="role" class="my-2 ">Role</label>
                    <select name="role" id="role" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none ">
                        <?php $role = $user->role; ?>
                        <option value="-">Only Admins Can Updated Role</option>
                        <option value="admin" <?php if ($role == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="owner" <?php if ($role == 'owner') echo 'selected'; ?>>Owner</option>
                        <option value="karyawan" <?php if ($role == 'karyawan') echo 'selected'; ?>>Karyawan</option>
                    </select>
                </div>
            </div>
            <div class="flex mx-4 my-2">
                <div class="col mx-5">
                    <label for="nip" class="my-2">NIP</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="001" name='nip' value="{{$user->nip}}" />
                </div>
                <div class="col mx-5">
                    <label for="jenis_kelamin" class="my-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control block w-64 px-6 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <?php $jk = $user->jenis_kelamin ?>
                        <option value="-">Choose Your Gender</option>
                        <option value="pria" <?php if ($jk == 'pria') echo 'selected'; ?>>Pria</option>
                        <option value="wanita" <?php if ($jk == 'wanita') echo 'selected'; ?>>Wanita</option>
                        <option value="others" <?php if ($jk == 'others') echo 'selected'; ?>>Others</option>
                    </select>
                </div>
                <div class="col mx-5">
                    <label for="TTL" class="my-2">Tempat Tanggal Lahir</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="Malang, 01 Januari 2001" name='TTL' id="TTL" value="{{$user->TTL}}" />
                </div>
                <div class="col mx-5">
                    <label for="phone" class="my-2">Phone</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="08123456789" name='phone' value="{{$user->phone}}" />
                </div>
            </div>
            <div class="flex mx-4 my-2">
                <div class="col mx-5">
                    <label for="jabatan" class="my-2">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="form-control block w-64 px-6 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <?php $jbtn = $user->jabatan ?>
                        <option value="-">Choose Employee Jabatan</option>
                        @foreach($jabatan as $jb)
                        <option value="{{$jb->jabatan}}" <?php if ($jbtn == $jb->jabatan) echo 'selected'; ?>>{{$jb->jabatan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col mx-5">
                    <label for="alamat" class="my-2">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control block w-64 px-6 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"">{{$user->alamat}}</textarea>
                </div>
                <div class=" col mx-5">
                    <label for="status" class="my-2">Status</label>
                    <select name="status" id="status" class="form-control block w-64 px-6 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <?php $status = $user->status ?>
                        <option value="-">Choose Employee Status</option>
                        <option value="Active" <?php if ($status == 'Active') echo 'selected'; ?>>Active</option>
                        <option value="Inactive" <?php if ($status == 'Inactive') echo 'selected'; ?>>Inactive</option>
                        <option value="Resign" <?php if ($status == 'Resign') echo 'selected'; ?>>Resign</option>
                    </select>
                </div>
                <div class="col mx-5">
                    <label for="gaji" class="my-2">Gaji</label>
                    <input type="text" autocomplete="off" class="form-control block w-full px-4 py-2 text-md font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleFormControlInput2" placeholder="Rp. 17.000.000,-" name='gaji' id="gaji" disabled value="{{$user->gaji}}"/>
                </div>
            </div>
            <div class="flex mx-10 my-2">
                @if($user->image === null)
                <img src="{{asset('img/User.png')}}" alt="" class="w-24 h-auto border-2 border-gray-400 rounded-sm">
                @else
                <img src="{{asset('storage/public/'.$user->image)}}" alt="" class="w-24 h-auto border-2 border-gray-400 rounded-sm">
                @endif
                <label class="block file:text-red-500">
                    <input type="file" class="block w-full text-sm
                    mr-4 py-2 px-4
                    rounded-full border-0
                    font-semibold
                    bg-violet-50 text-gray-500
                    hover:bg-violet-100
                    " name="image"/>
                </label>
            </div>
            <div class="flex justify-center my-8">
                <button type="submit" class="w-5/6 bg-green-400 border-2 border-green-200 rounded-lg text-white text-md focus:text-lg focus:bg-green-500 focus:border-4 focus:border-green-400 focus:outline-none">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@endsection
