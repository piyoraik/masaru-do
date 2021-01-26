<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-8">
    <div>
      <h2 class="mt-8">ジャンル一覧</h2>
      <table class="table">
        <thead class="thead-dark">
          <th>ID</th>
          <th>ジャンル名</th>
          <th>出品数</th>
        </thead>
        <tbody>
          @foreach($genres as $genre)
          <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
            <td>{{ count($genre->items) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      <h2 class="mt-8">ジャンル登録</h2>
      <form action="{{ route('genres.store') }}" method="post" class="form-inline">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
          <label for="name" class="sr-only">ジャンル名</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-2">登録</button>
      </form>

    </div>
  </div>
</x-app-layout>