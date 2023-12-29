@extends('layout.indexLayout')
@section('content')
<title>Uji T Tabel</title>
    <div class="ml-16">
        <div class="container mx-auto px-12">
            <h1 class="font-poppins text-4xl font-semibold  mb-8 mt-10  text-white">Uji T Tabel</h1>
            
           
        </div>
        <div class="container mx-auto width-3/5 px-12 mt-4 bg-white py-6 rounded-md ">
            <table id="myTable" class="table mt-3">
                <thead>
                 <tr>
                  <th>#</th>
                  <th>X1</th>
                  <th>X2</th>
                 </tr>
                </thead>
                <tbody>
                 @foreach ($result as $item)       
                 <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->x1 }}</td>
                  <td>{{ $item->x2 }}</td>
                 </tr>
                 @endforeach
                 <tr>
                  <td><strong>SUM:</strong></td>
                  <td>{{ $sumX1 }}</td>
                  <td>{{ $sumX2 }}</td>
                 </tr>
                 <tr>
                  <td><strong>Rerata:</strong></td>
                  <td>{{ $averageX1 }}</td>
                  <td>{{ $averageX2 }}</td>
                 </tr>
                 <tr>
                  <td><strong>SD:</strong></td>
                  <td>{{ $roundedSDX1 }}</td>
                  <td>{{ $roundedSDX2 }}</td>
                 </tr>
                 <tr>
                  <td><strong>Variants:</strong></td>
                  <td>{{ $roundedVariance1 }}</td>
                  <td>{{ $roundedVariance2 }}</td>
                 </tr>
                </tbody>
              </div>
        </div>
    </div>
@endsection