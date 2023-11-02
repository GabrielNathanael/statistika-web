@extends('layout.indexLayout')
@section('content')

    <div class="container mx-auto px-16 py-8 w-3/5">
        <!-- Create Section -->
        <h1 class="text-2xl font-bold text-white mb-4">Masukkan Data Nilai</h1>
        <a href="{{ route('nilai.index') }}" class="text-blue-700 font-semibold text-lg hover:font-bold hover:underline ">Kembali</a>
        <form method="post" action="{{ route('nilai.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('post')
            <div class="mb-4">
                <label for="nilai_siswa" class="block text-gray-700 font-semibold">Nilai</label>
                <input type="text" id="nilai_siswa" name="nilai_siswa" placeholder="Contoh: 70" class="w-full p-2 border rounded">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Tambahkan</button>
            </div>
        </form>
    </div>
@endsection
