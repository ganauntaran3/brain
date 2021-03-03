 <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control-file">

                    @error('thumbnail')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?? $bands->name }}" id="name" class="form-control">

                    @error('name')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genres">Choose Genres</label>
                    <select name="genres[]" id="genres" class="form-control select2-multiple" multiple>

                        @foreach ($genres as $genre)
                            <option {{ $bands->genres()->find($genre->id) ? 'selected' : '' }} value="{{ $genre->id }}">{{$genre->name}}</option>
                        @endforeach
                    </select>

                    @error('genres')
                        <div class="mt-2 text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">{{ $submit }}</button>