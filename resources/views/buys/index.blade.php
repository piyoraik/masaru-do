<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">購入商品一覧</h2>
    <table class="table">
      <thead class="thead-dark">
        <th>取引商品</th>
        <th>金額</th>
        <th>ステータス</th>
        <th>詳細</th>
      </thead>
      <tbody>
        @foreach($buys as $buy)
        <tr>
          <td>{{ $buy->item->item_name }}</td>
          <td>{{ $buy->amount }}円</td>
          <td>{{ App\Enums\TradeStatusType::getKey($buy->status) }}</td>
          <td><a href="{{ route('trade.show', ['trade' => $buy->uuid]) }}" class="btn btn-primary">詳細</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</x-app-layout>