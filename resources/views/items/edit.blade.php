<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <div>
      <h2 class="mt-8">商品情報を編集する</h2>
      <form action="{{ route('items.update', ['item' => $item->itemid]) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="item_name">商品名</label>
          <input type="text" name="item_name" value="{{ $item->item_name }}" class="form-control @error('item_name') is-invalid @enderror">
          @error('item_name')
          <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="item_detail">商品説明</label>
          <textarea name="item_detail" class="form-control @error('item_detail') is-invalid @enderror" cols="30" rows="10">{{ $item->item_detail }}</textarea>
          @error('item_detail')
          <span class=" invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="price">価格</label>
          <input type="number" name="price" value="{{ $item->price }}" class="form-control @error('price') is-invalid @enderror">
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
            <option value="{{ $item_status->id }}" @if($item_status->id == $item->itemstatus_id) selected @endif>{{ $item_status->status }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="genre">ジャンル</label>
          <select name="genre" class="form-control">
            @foreach($genres as $genre)
            <option value="{{ $genre->id }}" @if($genre->id == $item->genre_id) selected @endif >{{ $genre->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label for="date_shipping">発送までの日数</label>
          <select name="date_shipping" class="form-control">
            @foreach($date_ships as $date_ship)
            <option value="{{ $date_ship->id }}" @if($date_ship->id == $item->dateship_id) selected @endif >{{ $date_ship->date }}</option>
            @endforeach
          </select>
        </div>
        <input type="submit" value="更新する" class="btn btn-primary col-lg-12 mt-2">
      </form>
    </div>
    @if($item->item_detail_flag != 9)
    <div>
      <form action="{{ route('item.stop', ['item' => $item->itemid]) }}" method="post">
        @csrf
        <input type="submit" value="出品を停止する" class="btn btn-danger col-lg-12 mt-2">
      </form>
    </div>
    @endif
    @if($item->item_detail_flag == 9)
    <div>
      <form action="{{ route('item.restart', ['item' => $item->itemid]) }}" method="post">
        @csrf
        <input type="submit" value="出品を再開する" class="btn btn-danger col-lg-12 mt-2">
      </form>
    </div>
    @endif
  </div>
</x-app-layout>