<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">取引中商品一覧</h2>
    <table class="table">
      <thead class="thead-dark">
        <th>取引商品</th>
        <th>出品者</th>
        <th>金額</th>
        <th>ステータス</th>
        <th>詳細</th>
      </thead>
      <tbody>
        @foreach($trades as $trade)
        <tr>
          <td>{{ $trade->item->item_name }}</td>
          <td>{{ $trade->item->user->user_name }}</td>
          <td>{{ $trade->amount }}円</td>
          <td>{{ App\Enums\TradeStatusType::getKey($trade->status) }}</td>
          <td><a href="{{ route('trade.show', ['trade' => $trade->uuid]) }}" class="btn btn-primary">詳細</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</x-app-layout>