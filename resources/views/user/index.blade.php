<x-app-layout>
  <x-menu :user="$user" />
  <div class="col-lg-8">
    <h2 class="mt-8">登録情報</h2>
    <table class="table">
      <tr>
        <th colspan="2" class="bg-dark text-light">公開情報</th>
      </tr>
      <tr>
        <th>ユーザーネーム</th>
        <td>{{ $user->user_name }}</td>
      </tr>
      <tr>
        <th>ユーザーID</th>
        <td><a href="{{ route('u.show', ['u' => $user->user_id]) }}">{{ $user->user_id }}</a></td>
      </tr>
      <tr>
        <th colspan="2" class="bg-dark text-light">非公開情報</th>
      </tr>
      <tr>
        <th>名前</th>
        <td>{{ $user->first_name . $user->last_name }}</td>
      </tr>
      <tr>
        <th>フリガナ</th>
        <td>{{ $user->first_name_kana . $user->last_name_kana }}</td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td>{{ $user->email }}</td>
      </tr>
    </table>
    <a href="./user/profile" class="btn btn-dark col-lg-12">変更</a>
  </div>
</x-app-layout>