@extends('layouts.app')
@section('title')
<title>Welcome</title>
@endsection
@section('content')
    <div class="container general">
        <div class="carro">
            <table class="table">
                <tr>
                    <th>Product name</th>
                    <th>Precio</th>
                </tr>
                @foreach ($list as $l)
                    @if ( $l['id_user']=== Auth()->user()->id )
                        <tr>
                            <td>{{ $l['product'] }} </td>
                            <td>{{ $l['precio'] }}</td>
                            <td>
                                <form method="POST" action="wishlist/{{ Auth()->user()->id }}/{{ $l['product'] }} ">
                                    {{ csrf_field() }}
                                    <button class="btnDelete" onclick="alerta()" name="delete"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>