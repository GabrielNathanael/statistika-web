@extends('layout.indexLayout')
@section('content')
<title>Tabel Z Liliefors</title>
    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold  mb-8 mt-10  text-white">Tabel Z Liliefors</h1>
            
            <div class="mb-4">
                <a href="{{ route('nilai.create') }}" class="font-poppins bg-gradient-to-r from-green-200 to-blue-500 hover:from-blue-500 hover:to-green-200 hover:font-bold text-black font-semibold py-2 px-4 rounded border border-blue-700 mb-4">Memasukkan data baru</a>
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
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Z</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">F(x)</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">S(z)</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">|F(x) - S(z)|</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($zScores as $scoreId => $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data['scoreValue'] }}</td>
                        <td>{{ $data['zScore'] }}</td>
                        <td>{{ $data['normsdist'] }}</td>
                        <td>{{ $data['empiricalCumulativeProbability'] }}</td>
                        <td>{{ $data['fx'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection