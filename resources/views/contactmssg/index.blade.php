@extends('layouts.adminnav')
@section('text_css')
<title>contact form messages</title>
<link rel="stylesheet" href="{{ asset('css/contactmssg.css') }}">
</head>
<body>
    
<div class="contactmssg-table">
    <div class="contactmssg-table-container">
        <div class="contactmssg-table-header">
        <form action="#" method="get" class="search-form">
        <h1>Gestion des Messages de Contact</h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
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
            
            @foreach ($contact_messages_fromDB as $contactmssg)
    <tr>
      <td>{{$contactmssg->id}}</td>
      <td>{{$contactmssg->created_at}}</td>
      <td>{{$contactmssg->email}}</td>
      <td>{{$contactmssg->subject}}</td>
      <td><a href="{{route('contactmssg.show' , $contactmssg->id)}}" class="action-btn">Lire</a></td>
    </tr>
    @endforeach
        </tbody>
        </table>
        </div>
</div>
</body>
</html>
@endsection
