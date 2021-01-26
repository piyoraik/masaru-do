    <!-- 削除ボタンクリック後に表示される画面の内容 -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">削除確認画面</h4>
                </div>
                <div class="modal-body">
                    <label>削除しますか？</label>
                    <table class="table">
                        <thead class="thead-dark">
                          <th>金融機関名</th>
                          <th>口座番号</th>
                          <th>口座名義(カナ)</th>
                          <th>住所</th>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{ $bank->financial_institution_name }}</td>
                            <td>{{ $bank->account_number }}</td>
                            <td>{{ $bank->account_first_name . $bank->account_last_name }}</td>
                            <td>
                              {{ $bank->postal_code }}<br>
                              {{ $bank->prefectures . $bank->address }}
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    <form action="{{ route('banks.destroy', ['bank' => $bank->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>