@extends('layouts.default')
<style>
    th {
        background-color: #289ADC;
        color: white;
        padding: 5px 40px;
    }
    tr:nth-child(odd) td {
        background-color: #FFFFFF;
    }
    td {
        padding: 25px 40px;
        background-color: #EEEEEE;
        text-align: center;
    }

    svg.w-5.h-5 {
        width: 30px;
        height: 30px;
    }
</style>
@section('title', 'index.blade.php')

@section('content')
<table>
    <!-- <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>nationality</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
        <td>{{$author->id}}</td>
        <td>{{$author->name}}</td>
        <td>{{$author->age}}</td>
        <td>{{$author->nationality}}</td>
    </tr>
    @endforeach -->
    <tr>
        <th>Data</th>
    </tr>
    @foreach ($authors as $author)
    <tr>
        <td> {{$author->getDetail()}} </td>
    </tr>
    @endforeach
</table>
{{ $authors->links() }}
@endsection 