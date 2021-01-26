<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    @if($addresses->first() == NULL)
    <div class="bs-callout bs-callout-info">
      <h4>配送先が登録されていません</h4>
      購入前に、配送先の登録を行ってください。
    </div>
    @endif
    <h2 class="mt-8">購入確認</h2>
    <div>
      <h3 class="mt-4 bg-dark text-light">商品情報</h3>
      <table class="table">
        <tr>
          <th>商品タイトル</th>
          <td>{{ $item->item_name }}</td>
        </tr>
        <tr>
          <th>商品詳細</th>
          <td>{{ $item->item_detail }}</td>
        </tr>
        <tr>
          <th>価格</th>
          <td>{{ $item->price }}円</td>
        </tr>
        <tr>
          <th>出品者</th>
          <td>{{ $item->user->user_name }}</td>
        </tr>
        <tr>
          <th>発送までの日数</th>
          <td>{{ $item->dateship->date }}</td>
        </tr>
      </table>
      <div>
        <h3 class="mt-4 bg-dark text-light">購入情報</h3>
        <table class="table">
          <tr>
            <th>送料</th>
            <td>800円</td>
          </tr>
          <tr>
            <th>手数料</th>
            <td>7%</td>
          </tr>
          <tr>
            <th>支払金額</th>
            <td>{{ intval($item->price * 1.07 + 800) }}円</td>
          </tr>
        </table>
      </div>
      @if($addresses->first() != NULL)
      <div>
        <h3 class="mt-4 bg-dark text-light">配送先</h3>
        〒{{ $addresses->first()->postal_code }}<br>
        {{ $addresses->first()->prefectures . $addresses->first()->address }}<br>
        {{ $addresses->first()->name }}
      </div>
      <div>
        <form action="{{ route('items.buy') }}" method="post">
          @csrf
          <input type="hidden" name="saleuser" value="{{ $item->user_id }}">
          <input type="hidden" name="item" value="{{ $item->itemid }}">
          <input type="hidden" name="postal_code" value="{{ $addresses->first()->postal_code }}">
          <input type="hidden" name="address" value=" {{ $addresses->first()->prefectures . $addresses->first()->address }}">
          <input type="hidden" name="name" value="{{ $addresses->first()->name }}">
          <input type="submit" value="購入する" class="btn btn-primary col-lg-12">
        </form>
      </div>
      @endif
    </div>
</x-app-layout>