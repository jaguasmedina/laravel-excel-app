@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Logs</h1>
    <div class="card">
        <div class="card-body">
            <pre>{{ $logContent }}</pre>
        </div>
    </div>
</div>
@endsection
