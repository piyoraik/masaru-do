<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <div>
      <h2 class="mt-8">口座情報変更</h2>
      <form action="{{ route('banks.update', ['bank' => $bank->id]) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="financial_institution_name">金融機関名</label>
          <input type="text" name="financial_institution_name" class="form-control @error('financial_institution_name') is-invalid @enderror" value="{{$bank -> financial_institution_name}}">
          @error('financial_institution_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_number">口座番号</label>
          <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror" value="{{$bank -> account_number}}">
          @error('account_number')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_first_name">セイ</label>
          <input type="text" name="account_first_name" class="form-control @error('account_first_name') is-invalid @enderror" value="{{$bank -> account_first_name}}">
          @error('account_first_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="account_last_name">メイ</label>
          <input type="text" name="account_last_name" class="form-control @error('account_last_name') is-invalid @enderror" value="{{$bank -> account_last_name}}">
          @error('account_last_name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="postal_code">郵便番号</label>
          <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{$bank -> postal_code}}">
          @error('postal_code')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="prefectures">都道府県</label>
          <input type="text" name="prefectures" class="form-control @error('prefectures') is-invalid @enderror" value="{{$bank -> prefectures}}">
          @error('prefectures')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="address">住所</label>
          <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$bank -> address}}">
          @error('address')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="mt-3">
          <input type="submit" name="submit" class="btn btn-primary col-lg-12" value="変更">
        </div>
      </form>
      <div class="mt-3">
        <a href="{{ route('banks.index', ['bank' => $bank->id]) }}" class="btn btn-primary col-lg-12">戻る</a>
      </div>

    </div>
  </div>
</x-app-layout>