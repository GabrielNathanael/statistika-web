@extends('layout.indexLayout')
@section('content')
<title>Editting Data</title>
    <div class="container mx-auto px-4 py-8 w-3/5">
        <!-- Edit Section -->
        <h1 class="text-2xl font-bold text-white mb-4">Edit Data Nilai</h1>
        <a href="{{ route('nilai.index') }}" class="text-blue-700 font-semibold text-lg hover:underline hover:font-bold">Kembali</a>
        <form method="post" action="{{ route('nilai.update', ['dataSiswa' => $dataSiswa]) }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="nilai_siswa" class="block text-gray-700 font-semibold">Nilai</label>
                <input type="text" id="nilai_siswa" name="nilai_siswa" placeholder="Contoh: 70" value="{{$dataSiswa->nilai_siswa}}" class="w-full p-2 border rounded">
            </div>
            <div class="text-center">
                <button type="submit" class="font-poppins bg-gradient-to-r from-green-200 to-blue-500 hover:from-blue-500 hover:to-green-200 hover:font-bold text-black font-semibold py-2 px-4 rounded border border-blue-700 ">Update</button>
            </div>
        </form>
    </div>
@endsection
