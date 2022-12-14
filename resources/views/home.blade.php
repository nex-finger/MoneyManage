@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン状況</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>ログイン完了しています!</p>
                    <p><a href="/">トップページに移る</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
