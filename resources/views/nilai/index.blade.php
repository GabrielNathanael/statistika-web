@extends('layout.indexLayout')
@section('content')
    
    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold  mb-8 mt-10  text-white">Data Nilai</h1>
            
            <div class="mb-4">
                <a href="{{ route('nilai.create') }}" class="font-poppins bg-green-200 hover:bg-green-400 hover:font-bold text-black font-semibold py-2 px-4 rounded border border-blue-700 mb-4">Memasukkan data baru</a>
            </div>
            <div>
                @if(session()->has('success'))
                <div class="font-poppins bg-green-200 text-green-800 px-6 py-4 mt-6 rounded-lg">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
        <div class="container mx-auto width-3/5 px-12 mt-4 bg-white py-6 rounded-md ">
            <table id="myTable" class="table-auto pb-2 w-full bg-white shadow-lg rounded-lg border border-gray-300 ">
                <thead>
                    <tr>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">No</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Nilai</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Edit Data</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300">Delete Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nilai as $dataSiswa)
                    <tr>
                        <td class="font-poppins w-12 border border-r-2 border-b-2 px-6 py-4 text-center">{{ $loop->iteration }}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 ">{{ $dataSiswa->nilai_siswa }}</td>
                        <td class="font-poppins w-36 border border-r-2 border-b-2 px-6 py-4 text-center">
                            <a href="{{ route('nilai.edit', ['dataSiswa' => $dataSiswa]) }}" class="font-poppins text-blue-500 hover:text-green-500 hover:font-bold">Edit</a>
                        </td>
                        <td class="font-poppins w-36 border border-r-2 border-b-2 px-6 py-4 text-center">
                            <form method="post" action="{{ route('nilai.delete', ['dataSiswa' => $dataSiswa]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="font-poppins text-red-500 hover:font-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection