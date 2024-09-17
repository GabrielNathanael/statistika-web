@extends('layout.indexLayout')
@section('content')
<title>Point Biserial</title>
    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold  mb-8 mt-10  text-white">Point Biserial</h1>
        </div>
        <div class="container mx-auto width-3/5 px-12 mt-4 bg-white py-6 rounded-md ">
            <table id="myTable" class="table mt-3">
                <thead>
                    <tr>
                        <th class="px-4 py-2" colspan="4">Data summary</th>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">X1</th>
                        <th class="px-4 py-2">X2</th>
                        <th class="px-4 py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">N</td>
                        <td class="px-4 py-2">{{ $N }}</td>
                        <td class="px-4 py-2">{{ $N }}</td>
                        <td class="px-4 py-2">{{ $Ntotal }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">ΣY</td>
                        <td class="px-4 py-2">{{ $sumX1 }}</td>
                        <td class="px-4 py-2">{{ $sumX2 }}</td>
                        <td class="px-4 py-2">{{ $sumN }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">ΣY2</td>
                        <td class="px-4 py-2">{{ $sumY2X1 }}</td>
                        <td class="px-4 py-2">{{ $sumY2X2 }}</td>
                        <td class="px-4 py-2">{{ $sumY2N }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">SSY</td>
                        <td class="px-4 py-2">{{ $SSYX1 }}</td>
                        <td class="px-4 py-2">{{ $SSYX2 }}</td>
                        <td class="px-4 py-2">{{ $SSYN }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Mean Y</td>
                        <td class="px-4 py-2">{{ $meanX1 }}</td>
                        <td class="px-4 py-2">{{ $meanX2 }}</td>
                        <td class="px-4 py-2">{{ $meanN }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
