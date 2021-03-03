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
            <form action="{{ route('bands.update', $bands) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

               @include('bands.partials.form-control')

            </form>
        </div>
    </div>

@endsection