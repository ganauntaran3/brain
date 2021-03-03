@extends('layouts.backend')

@push('scripts')

    <script>
        $(document).ready(function() {
            $('.select2-multiple').select2();
        });
    </script>
    
@endpush

@section('content')
    
    <div class="card">

        @include('alert')

        <div class="card-header">New Band</div>

        <div class="card-body">
            <form action="{{ route('bands.post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('bands.partials.form-control')

            </form>
        </div>
    </div>

@endsection