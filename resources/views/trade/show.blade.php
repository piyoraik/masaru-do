<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">取引詳細</h2>
    @if($trade->status == 0 && $trade->user_id == $user->id)
    <div class="bs-callout bs-callout-info">
      <h4>支払いをしてください</h4>
      商品を購入しました。<br>
      下の「カードで支払う」から支払いを完了してください。
    </div>
    @endif
    @if($trade->status == 1 && $trade->sale_user_id == $user->id)
    <div class="bs-callout bs-callout-success">
      <h4>発送してください</h4>
      商品が購入され、支払いがされました。<br>
      発送をし、発送を通知してください。
    </div>
    <div class="col text-center">
      <form action="{{ route('trade.shipping') }}" method="post">
        @csrf
        <input type="hidden" name="trade" value="{{ $trade->uuid }}">
        <input type="hidden" name="shipping" value="1">
        <input type="submit" value="発送しました" class="btn btn-success">
      </form>
    </div>
    @endif
    @if($trade->status == 2 && $trade->user_id == $user->id)
    <div class="bs-callout bs-callout-info">
      <h4>受取評価をしてください</h4>
      商品が発送されました。<br>
      商品が到着したら、中身を確認し取引相手を評価してください。
    </div>
    <div class="col text-center">
      <form action="{{ route('rating.buyer') }}" method="post">
        @csrf
        <div class="form-group">
          <input class="form-check-input" type="checkbox" value="1" id="receive">
          <label class="form-check-label" for="receive">
            商品の受取を確認しました
          </label>
        </div>
        <div class="form-group">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="good" value="1">
            <label class="form-check-label" for="good">良い</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="bad" value="2">
            <label class="form-check-label" for="bad">悪い</label>
          </div>
          <div class="form-group">
            <textarea name="comment" cols="10" rows="3" class="form-control col-8 mx-auto"></textarea>
          </div>
        </div>
        <input type="hidden" name="trade" value="{{ $trade->uuid }}">
        <input type="submit" value="評価する" class="btn btn-info" id="rating_button" disabled="disabled">
      </form>
    </div>
    @endif
    @if($trade->status == 3 && $trade->sale_user_id == $user->id)
    <div class="bs-callout bs-callout-success">
      <h4>評価をしてください</h4>
      購入者に商品が到着し評価がありました。<br>
      購入者の評価を行って取引を完了してください
    </div>
    <div class="col text-center">
      <form action="{{ route('rating.seller') }}" method="post">
        @csrf
        <div class="form-group">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="good" value="1">
            <label class="form-check-label" for="good">良い</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="bad" value="2">
            <label class="form-check-label" for="bad">悪い</label>
          </div>
          <div class="form-group">
            <textarea name="comment" cols="10" rows="3" class="form-control col-lg-8 mx-auto"></textarea>
          </div>
        </div>
        <input type="hidden" name="trade" value="{{ $trade->uuid }}">
        <input type="submit" value="評価する" class="btn btn-success">
      </form>
    </div>
    @endif
    <div>
      <h3 class="mt-4 bg-dark text-light">【商品情報】</h3>
      <table class="table">
        <tr>
          <th>商品タイトル</th>
          <td>{{ $trade->item->item_name }}</td>
        </tr>
        <tr>
          <th>商品詳細</th>
          <td>{{ $trade->item->item_detail }}</td>
        </tr>
        <tr>
          <th>販売価格</th>
          <td>{{ $trade->item->price }}円</td>
        </tr>
        <tr>
          <th>送料</th>
          <td>{{ $trade->shipping }}円</td>
        </tr>
        <tr>
          <th>出品者</th>
          <td>{{ $trade->item->user->user_name }}</td>
        </tr>
        <tr>
          <th>発送までの日数</th>
          <td>{{ $trade->item->dateship->date }}</td>
        </tr>
        <tr>
          <th>出品日</th>
          <td>{{ $trade->item->created_at }}</td>
        </tr>
        <tr>
          <th>商品ID</th>
          <td>{{ $trade->item->itemid }}</td>
        </tr>
      </table>
    </div>
    <div>
      <h3 class="mt-4 bg-dark text-light">【購入情報】</h3>
      <table class="table">
        <tr>
          <th>購入日</th>
          <td>{{ $trade->created_at }}</td>
        </tr>
        <tr>
          <th>購入者</th>
          <td>{{ $trade->user->user_name }}</td>
        </tr>
        <tr>
          <th>手数料</th>
          <td>7%</td>
        </tr>
        <tr>
          <th>支払金額</th>
          <td>{{ $trade->amount }}円</td>
        </tr>
        <tr>
          <th>支払い</th>
          <td>
            @if($trade->status > 0)
            【支払い済み】
            @else
            【未払い】
            @endif
            @if($trade->user_id == $user->id && $trade->status == 0)
            <form action="{{ route('trade.cash') }}" method="post">
              @csrf
              <input type="hidden" name="id" value="{{ $trade->uuid }}">
              <input type="hidden" name="amount" value="{{ $trade->amount }}">
              <script src="https://checkout.pay.jp/" class="payjp-button" data-key="pk_test_3949162135bf92c458a25d32" data-text="カードで支払う" data-submit-text="カードを登録"></script>
            </form>
            @endif
          </td>
        </tr>
      </table>
    </div>
    <div>
      <h3 class="mt-4 bg-dark text-light">【発送先】</h3>
      <table class="table">
        <tr>
          <th>配送先住所</th>
          <td>
            〒{{ $trade->postal_code }}<br>
            {{ $trade->address }}
          </td>
        </tr>
        <tr>
          <th>宛先</th>
          <td>{{ $trade->address_name }}</td>
        </tr>
      </table>
    </div>
  </div>
</x-app-layout>