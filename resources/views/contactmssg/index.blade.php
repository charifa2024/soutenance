@extends('layouts.adminnav')
@section('text_css')
<title>contact form messages</title>
<link rel="stylesheet" href="{{ asset('css/contactmssg.css') }}">
</head>
<body>
    
<div class="contactmssg-table">
    <div class="contactmssg-table-container">
        <div class="contactmssg-table-header">
            <h1>Gestion des Messages de Contact</h1>
        </div>
        <div class="contactmssg-table-body">
            <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Email</th>
                <th>subjet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contactmssgs as $contactmssg)
    <tr>
      <td>{{$contactmssg['id']}}</td>
      <td>{{$contactmssg['date']}}</td>
      <td>{{$contactmssg['Email']}}</td>
      <td>{{$contactmssg['subject']}}</td>
      <td><a href="{{route('contactmssg.show' , $contactmssg['id'])}}" class="action-btn">Lire</a></td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
</body>
</html>
@endsection
