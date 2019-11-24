@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Enviar Mensaje</div>
                <form method="POST" action=" {{ route('messages.store') }}">
                    @csrf
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <select name="recipient_id" class="form-control">
                                <option value="">Seleciona el Usuario</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach

                            </select>
                            {!! $errors->first('recipient_id', "<span class=help-block>:message</span> ") !!}
                        </div>
                        <div class="form-group">
                            <textarea name="body" class="form-control" placeholder="Escribe tu mensaje "></textarea>
                            {!! $errors->first('body', "<span class=help-block>:message</span> ") !!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Enviar Mensaje</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
