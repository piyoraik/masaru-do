<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <div>
      <h2 class="mt-8">登録口座一覧</h2>
      <table class="table">
        <thead class="thead-dark">
          <th>金融機関名</th>
          <th>口座番号</th>
          <th>口座名義(カナ)</th>
          <th>住所</th>
          <th>変更・削除</th>
        </thead>
        <tbody>
          @foreach($banks as $bank)
          <tr>
            <td>{{ $bank->financial_institution_name }}</td>
            <td>{{ $bank->account_number }}</td>
            <td>{{ $bank->account_first_name . $bank->account_last_name }}</td>
            <td>
              {{ $bank->postal_code }}<br>
              {{ $bank->prefectures . $bank->address }}
            </td>
            <td>
              <a href="{{ route('banks.edit', ['bank' => $bank->id]) }}" class="btn btn-primary">変更</a>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal">削除</button>
              <x-bankaccount-delete :bank="$bank" />
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h2 class="mt-8">振り込み口座登録</h2>
      <form action="{{ route('banks.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="financial_institution_name">金融機関名</label>
          <input type="text" name="financial_institution_name" class="form-control @error('financial_institution_name') is-invalid @enderror" value="{{old('financial_institution_name')}}">
          @error('financial_institution_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_number">口座番号</label>
          <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror" value="{{old('account_number')}}">
          @error('account_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_first_name">セイ</label>
          <input type="text" name="account_first_name" class="form-control @error('account_first_name') is-invalid @enderror" value="{{old('account_first_name')}}">
          @error('account_first_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_last_name">メイ</label>
          <input type="text" name="account_last_name" class="form-control @error('account_last_name') is-invalid @enderror" value="{{old('account_last_name')}}">
          @error('account_last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="postal_code">郵便番号</label>
          <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{old('postal_code')}}">
          @error('postal_code')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="prefectures">都道府県</label>
          <input type="text" name="prefectures" class="form-control @error('prefectures') is-invalid @enderror" value="{{old('prefectures')}}">
          @error('prefectures')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">住所</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
          @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mt-3">
          <input type="submit" value="登録" class="btn btn-primary col-lg-12">
        </div>
      </form>
    </div>
  </div>
</x-app-layout>