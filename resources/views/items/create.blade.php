<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">商品登録</h2>
    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="item_name">商品名</label>
        <input type="text" value="{{ old('item_name') }}" name="item_name" class="form-control @error('item_name') is-invalid @enderror">
        @error('item_name')
        <span class=" invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="imagePreview"></div>
      <div class="input-group">
        <label class="input-group-btn">
          <span class="btn btn-primary">
            Choose File<input type="file" name="item_pic" style="display:none" class="uploadFile">
          </span>
        </label>
        <input type="text" class="form-control @error('item_pic') is-invalid @enderror" readonly="">
        @error('item_pic')
        <span class=" invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class=" form-group">
        <label for="item_detail">商品説明</label>
        <textarea name="item_detail" class="form-control @error('item_detail') is-invalid @enderror" cols="30" rows="10">{{ old('item_detail') }}</textarea>
        @error('item_detail')
        <span class=" invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="price">価格</label>
        <input type="number" value="{{ old('price') }}" name="price" class="form-control @error('price') is-invalid @enderror">
        @error('price')
        <span class=" invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="form-group">
        <label for="item_status">商品の状態</label>
        <select name="item_status" class="form-control">
          @foreach($item_statuses as $item_status)
          <option value="{{ $item_status->id }}">{{ $item_status->status }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="genre">ジャンル</label>
        <select name="genre" class="form-control">
          @foreach($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label for="date_shipping">発送までの日数</label>
        <select name="date_shipping" class="form-control">
          @foreach($date_ships as $date_ship)
          <option value="{{ $date_ship->id }}">{{ $date_ship->date }}</option>
          @endforeach
        </select>
      </div>
      <input type="submit" value="出品する" class="btn btn-primary col-lg-12 mt-2">
    </form>
  </div>
</x-app-layout>