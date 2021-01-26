<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <div>
      <h2 class="mt-8 d-inline">商品一覧</h2>
      <form action="{{ route('root') }}" method="get">
        <input type="text" name="search" placeholder="検索ワードを入力" class="form-control col-4 d-inline">
        <input type="submit" value="検索" class="btn btn-primary">
      </form>
    </div>
    <div class="row">
      @foreach($items as $item)
      <div class="col-lg-4">
        <h4><a href="{{ route('items.show', ['item' => $item->itemid]) }}">{{ $item->item_name }}</h4>
        @if($item->item_path == 'default.png')
        <img src="../../uploads/thumb_default.png">
        @else
        <img src="../../uploads/thumb_{{ $item->itemid . $item->item_path }}">
        @endif
        </a>
      </div>
      @endforeach
    </div>
    <div>
      {{ $items->appends(request()->input())->links() }}
    </div>
  </div>
</x-app-layout>