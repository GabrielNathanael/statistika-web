<table>
    <thead>
     <tr>
      <th><b>No</b></th>
      <th><b>Score</b></th>
     </tr>
    </thead>
    <tbody>
     @foreach($nilai as $nilai)
     <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $nilai->nilai_siswa }}</td>
     </tr>
     @endforeach
    </tbody>
   </table>