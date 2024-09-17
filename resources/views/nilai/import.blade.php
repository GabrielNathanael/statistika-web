@extends('layout.indexLayout')
@section('content')
<title>Import Page</title>
<div class="mt-5 px-3 max-w-md mx-auto bg-white p-6 rounded-md shadow-md">
    <h1 class="text-3xl font-bold mb-5">Import Data Nilai</h1>
    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="formFile" class="block text-sm font-medium text-gray-700">Choose File</label>
            <input type="file" id="formFile" name="file" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <p class="mt-2 text-sm text-gray-500"><i>Allowed extensions: xlxs, xlx, csv</i></p>
        </div>
        <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            Submit
        </button>
    </form>
</div>
@endsection
