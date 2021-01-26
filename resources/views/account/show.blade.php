<x-app-layout>
  <x-menu :user='$user' />
  <div class="col-lg-8">
    <h2 class="mt-8">{{ $u->user_name }}</h2>
    <h3 class="mt-4 bg-dark text-light col-lg-12">出品物</h3>
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
    <h3 class="mt-4 bg-dark text-light col-lg-12">評価</h3>
    @foreach($ratings as $rating)
    <div>
      <h4>{{ $rating->user->user_name }}</h4>
      <table class="table">
        <tr>
          <th>評価</th>
          <td>{{ App\Enums\RatingsStatus::getKey($rating->rating) }}</td>
        </tr>
        <tr>
          <th>コメント</th>
          <td>{{ $rating->rating_comment }}</td>
        </tr>
      </table>
    </div>
    @endforeach
</x-app-layout>