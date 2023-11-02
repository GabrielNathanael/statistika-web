<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Landing Page</title>
    
</head>
<body class="font-poppins bg-gradient-to-r from-cyan-500 to-blue-500 text-gray-800">
    <!-- Sidenav -->
@include('components.sidebar')


 @yield("content")



 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  let table = new DataTable('#myTable');

//   tailwind.config = {
//     darkMode: "class",
//     theme: {
//       fontFamily: {
//         'poppins' = ['Poppins', 'sans-serif']
//       },
//     },
//     corePlugins: {
//       preflight: false,
//     },
//   };
</script>


</body>
</html>