@extends('layout.indexLayout')
@section('content')
<title>Tabel Z Chi Kuadrat</title>
    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold  mb-8 mt-10  text-white">Tabel Z Chi Kuadrat</h1>
            
       
        </div>
        <div class="container mx-auto width-3/5 px-12 mt-4 bg-white py-6 rounded-md">
            <table id="myTable" class="table-auto pb-2 w-full bg-white shadow-lg rounded-lg border border-gray-300 ">
                <thead>
                    <tr>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Nilai Z</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Nol</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Satu</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Dua</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Tiga</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Empat</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Lima</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Enam</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Tujuh</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Delapan</th>
                        <th class="font-poppins px-6 py-3 border-b-2 border-gray-300 border-r-2 border-gray-300">Sembilan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($result as $chi)
                    <tr>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->z}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->nol}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->satu}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->dua}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->tiga}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->empat}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->lima}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->enam}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->tujuh}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->delapan}}</td>
                        <td class="font-poppins border border-r-2 border-b-2 px-6 py-4 text-center ">{{ $chi->sembilan}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        <div>
            <form action="{{route('chi')}}" method="post" >
                @csrf
                <input class="w-full py-2 rounded-md mt-4 mb-4 border-2 border-black" type="text" name="chi" id="chi" placeholder="3.10">
                <button class="font-poppins bg-gradient-to-r from-green-200 to-blue-500 hover:from-blue-500 hover:to-green-200 hover:font-bold text-black font-semibold py-2 px-4 rounded border border-blue-700 mb-4 "type ="submit">Temukan</button>
                {{-- @error('chi')
                    {{ $message }}
                @enderror --}}
            </form>
            @if (session()->has('success'))
            <div class=" ">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
@endsection