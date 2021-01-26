<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-8">
    <div>
      <h2 class="mt-8">配送先一覧</h2>
      <table class="table">
        <thead class="thead-dark">
          <th>配送先住所</th>
          <th>配送先宛名</th>
          <th>変更・削除</th>
        </thead>
        <tbody>
          @foreach($addresses as $address)
          <tr>
            <td>{{ $address->postal_code}}<br>{{ $address->prefectures . $address->address }}</td>
            <td>{{ $address->name }}</td>
            <td>
              <a href="{{ route('addresses.edit', ['address' => $address->id]) }}" class="btn btn-primary">変更</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">削除</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @if($address = "")
      <x-address-delete :address="$address" />
      @endif
    </div>

    <div>
      <h2 class="mt-8">配送先登録</h2>
      <form action="{{ route('addresses.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="postal_code">郵便番号</label>
          <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" onKeyUp="AjaxZip3.zip2addr(this,'','prefectures','address');">
          @error('postal_code')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="prefectures">都道府県</label>
          <select name="prefectures" class="form-control @error('prefectures') is-invalid @enderror">
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="宮城県">宮城県</option>
            <option value="秋田県">秋田県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="茨城県">茨城県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="新潟県">新潟県</option>
            <option value="富山県">富山県</option>
            <option value="石川県">石川県</option>
            <option value="福井県">福井県</option>
            <option value="山梨県">山梨県</option>
            <option value="長野県">長野県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="大阪府">大阪府</option>
            <option value="兵庫県">兵庫県</option>
            <option value="奈良県">奈良県</option>
            <option value="和歌山県">和歌山県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="島根県">島根県</option>
            <option value="岡山県">岡山県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="徳島県">徳島県</option>
            <option value="香川県">香川県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="福岡県">福岡県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="大分県">大分県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
          </select>
          @error('prefectures')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">住所</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
          @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div>
          <label for="name">宛先</label>
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mt-3">
          <input type="submit" value="登録" class="btn btn-primary col-12">
        </div>

      </form>
    </div>
  </div>
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</x-app-layout>