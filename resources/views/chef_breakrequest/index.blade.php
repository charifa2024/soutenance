@extends('layouts.chefnav')
@section('text_css')
<title>break request</title>
    <link rel="stylesheet" href="{{asset('css/breakrequest.css')}}">
    <div class="requests_container">
    <div class="requests-table-header">
      <form action="#" method="get" class="search-form">
      <h1>Demandes des congés </h1>
                <input type="text" name="search" placeholder="Rechercher..." class="search-input">
                <button type="submit" class="search-btn">Rechercher</button>
            </form>
    </div>


    <div class="requests-table">
    <table class="table">
  <thead>
    <tr>
      <th>Date</th>
      <th>Reason</th>
      <th>status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($requests as $request)
    <tr>
      <td>{{$request['date']}}</td>
      <td>{{$request['reason']}}</td>
      <td>{{$request['status']}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
<div>
        <div class="add">
            <a href="{{route('chef_breakrequest.create')}}" class="add-btn">Ajouter une demande du congé</a>
        </div>
    </div>
    </div>
</div>

</body>
</html>
@endsection