@extends('layouts.master')

@section('title') Filiais @endsection
@section('content')
    <table width="100%" class="short-table">
        @if($filiais->count() == 0)
            <tr>
                <th class="features" colspan="4">Nenhuma filial foi cadastrada.</th>
            </tr>
        @else
            <thead>
                <tr>
                    <th></th>
                    <th style="width: 100px;">Estado</th>
                    {{--<th style="width: 100px;">Visualizar</th>--}}
                    <th style="width: 100px;">Editar</th>
                    <th style="width: 100px;"></th>
                </tr>
            </thead>

            <tbody>
            @foreach($filiais as $filial)
                <tr>
                    <th class="features">{{ $filial->nome }}</th>
                    <th class="features">{{ $filial->uf->sigla }}</th>
                    {{--<td><a href="{{ action('FiliaisController@show', ['filiais' => $filial]) }}"><img src="{{ asset('images/icons/search.png') }}" alt="Visualizar"/></a></td>--}}
                    <td><a href="{{ action('FiliaisController@edit', ['filiais' => $filial]) }}"><img src="{{ asset('images/icons/pencil32.png') }}" alt="Editar"/></a></td>
                    <td>
                        {!! Form::open(['action' => ['FiliaisController@destroy', $filial], 'method' => 'delete']) !!}
                            <button class="small button red" style="border: none">Excluir</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tbody>
            @endforeach
        @endif
    </table>
@endsection