@extends('layouts.layout')

@section('content')
    <h3>Listagem de clientes</h3>
    <br/><br/>
    <a class="btn btn-default" href="{{ route('clients.create') }}">Criar novo</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Data Nasc.</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Sexo</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->document_number }}</td>
                <td>{{ $client->date_birth }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->sex }}</td>
                <td>
                    <a href="{{route('clients.edit',['client' => $client->id])}}">Editar</a> |
                    <a href="{{route('clients.show',['client' => $client->id])}}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection