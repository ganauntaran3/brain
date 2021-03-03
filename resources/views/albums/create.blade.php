@extends('layouts.backend', ['title' => $title])


@section('content')

    <div class="card">
        <div class="card-header"> {{ $title }} </div>
        <div class="card-body">
            <form method="POST" action="{{ route('albums.post') }}">
                @csrf

                <div class="form-group">
                    <label for="band">Band</label>
                    <select name="band" id="band" class="form-control">
                        <option disabled selected>Choose Band</option>
                        @foreach ($bands as $band)
                            <option value="{{ $band->id }}"> {{$band->name}}</option>
                        @endforeach
                    </select> 

                    @error('band')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">

                    @error('name')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-control">
                    <option disabled selected>Choose Year</option>
                    @for ($i = 1997; $i <= date('Y'); $i++)
                        <option value="{{ $i }}"> {{$i}}</option>
                    @endfor
                </select> 

                    @error('year')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
                
            </form>
        </div>
    </div>
@endsection

