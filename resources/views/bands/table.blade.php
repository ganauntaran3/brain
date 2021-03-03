@extends('layouts.backend')

@section('content')
    
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Genres</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bands as $band)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->genres()->get()->implode('name', ' | ') }}</td>
                    <td>
                        <a href="{{ route('bands.edit', $band->slug) }}" class="btn btn-warning text-white">Edit</a>
                        <div endpoint="{{ route('bands.delete', $band->slug) }}" class="delete d-inline"></div>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>

      {{ $bands->links() }}


@endsection