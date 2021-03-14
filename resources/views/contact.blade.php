@extends('layouts.main')
@section('content')
    @if (session('successMsg'))
        <div class="alert alert-primary" role="alert" data-mdb-color="primary">
            {{ session('successMsg') }}
        </div>
    @endif
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <form action="{{ route('send') }}" method="post">
        {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nom et Prénom</label>
                <input type="text" class="form-control" name="name" id="inputName" placeholder="Nom et Prénom">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <label for="subject">Subject</label>
        <div>
            <textarea id="message" class="form-control" name="message" placeholder="Votre message.." style="height:200px"></textarea>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Envoyer</button>
        </div>


    </form>
@endsection
