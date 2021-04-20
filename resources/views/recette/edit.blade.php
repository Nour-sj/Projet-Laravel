@extends('layouts.main')
@section('content')
    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
        </div>
    @endif
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID Recettes</th>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Date de publication</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <th scope="row">{{ $recipe->id }}</th>
                    <td>{{ $recipe->title }}</td>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ substr($recipe->date, 0, 10) }}</td>
                    <td class="text-center">
                        <button>
                        <a href=" {{ url('admin/recettes/edit_recette/'.$recipe->id) }} " class="btn btn-primary"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> Modifier</a>
                        </button>
                        ||
                        <form id="delete-form-{{ $recipe->id }}" action="{{ url('admin/recettes/edit/'.$recipe->id) }}" method="delete" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                        </form>
                        <button class="btn btn-danger" onclick="if (confirm('Etes-vous sur de vouloir suprimer cette recette ?')) {
                            document.getElementById('delete-form-{{ $recipe->id }}').submit();
                        }"><i class="fa fa-trash-o" aria-hidden="true"></i> Suprimer</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <span>
        {{ $recipes->links() }}
        </span>
    </div>



@endsection
