@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="card">
                <livewire:cancellationappt>
            </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    window.addEventListener('close-modal', event => {
        $('#cancelModal').modal('hide');

    });
    </script>
@endsection

