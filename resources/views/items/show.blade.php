<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    @if($item->item_detail_flag == 9)
    <div class="bs-callout bs-callout-info">
      <h4>商品出品停止中</h4>
    </div>
    @endif
    <h2 class="mt-8">{{ $item->item_name }}</h2>
    <div>
      <h3 class="mt-4 bg-dark text-light">商品情報</h3>
      <table class="table">
        <tr>
          <th>商品詳細</th>
          <td>{!! $item->item_detail !!}</td>
        </tr>
        <tr>
          <th>商品画像</th>
          <td>
            @if($item->item_path == 'default.png')
            <img src="../../uploads/{{ $item->item_path }}">
            @else
            <img src="../../uploads/{{ $item->itemid.$item->item_path }}" alt="">
            @endif
          </td>
        </tr>
        <tr>
          <th>価格</th>
          <td>{{ $item->price }}円</td>
        </tr>
        <tr>
          <th>商品の状態</th>
          <td>{{ $item->itemstatus->status }}</td>
        </tr>
        <tr>
          <th>出品者</th>
          <td><a href="{{ route('u.show', ['u' => $item->user->user_id]) }}">{{ $item->user->user_name }}</a></td>
        </tr>
        <tr>
          <th>発送までの日数</th>
          <td>{{ $item->dateship->date }}</td>
        </tr>
      </table>
      @if(Auth::check())
      <div>
        @if($user->id != $item->user->id && $item->item_detail_flag == 0)
        <form action="{{ route('items.buyshow', ['item' => $item->itemid]) }}" method="post">
          @csrf
          <input type="hidden" name="item" value="{{ $item->itemid }}">
          <input type="submit" value="購入画面に進む" class="btn btn-primary col-lg-12">
        </form>
        @endif
        @if($user->id == $item->user_id)
        <a href="{{ route('items.edit', ['item' => $item->itemid]) }}" class="btn btn-primary col-lg-12">商品を編集する</a>
        @endif
      </div>
      @endif
    </div>
</x-app-layout>