<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">出品商品一覧</h2>
    <table class="table">
      <thead class="thead-dark">
        <th>出品商品</th>
        <th>金額</th>
        <th>ステータス</th>
        <th>詳細</th>
      </thead>
      <tbody>
        @foreach($sells as $sell)
        <tr>
          <td>{{ $sell->item_name }}</td>
          <td>{{ $sell->price }}円</td>
          <td>{{ App\Enums\ItemStatusType::getKey($sell->item_detail_flag) }}</td>
          <td><a href="{{ route('items.show' , ['item' => $sell->itemid]) }}" class="btn btn-primary">詳細</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
</x-app-layout>