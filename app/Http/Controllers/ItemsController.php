<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Genre;
use App\Models\DateShip;
use App\Models\Trade;
use App\Models\ItemStatus;

class ItemsController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $items = Item::where('item_name', 'like', "%$search%")
                ->where('item_detail_flag', 0)
                ->orderBy('id', 'desc')
                ->paginate(9);
        } else {
            $items = Item::where('item_detail_flag', 0)
                ->orderBy('id', 'desc')
                ->paginate(9);
        }
        $user = Auth::user();
        return view('items.index', compact('user', 'items'));
    }

    // 商品編集
    public function edit(Request $request)
    {
        $item = Item::where('itemid', $request->item)->first();
        $user = Auth::user();
        $genres = Genre::all();
        $date_ships = DateShip::all();
        $item_statuses = ItemStatus::all();

        if ($item->user_id != $user->id) {
            return redirect(route('root'));
        }
        return view('items.edit', compact('user', 'item', 'genres', 'date_ships', 'item_statuses'));
    }

    // 商品更新処理
    public function update(Request $request)
    {

        $rules = [
            'item_name' => ['required', 'string'],
            'item_detail' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ];

        $this->validate($request, $rules);

        $item = Item::where('itemid', $request->item)->first();
        $item->update([
            'item_name' => $request->item_name,
            'item_detail' => $request->item_detail,
            'price' => $request->price,
            'genre_id' => $request->genre,
            'date_shipping' => $request->date_shipping,
            'itemstatus_id' => $request->item_status,
            'dateship_id' => $request->date_shipping,
        ]);
        return redirect(route('items.show', ['item' => $item->itemid]));
    }

    // 商品出品停止
    public function stop(Request $request)
    {
        $item = Item::where('itemid', $request->item)->first();
        $item->update([
            'item_detail_flag' => 9
        ]);
        return redirect(route('items.show', ['item' => $item->itemid]));
    }

    // 商品出品再開
    public function restart(Request $request)
    {
        $item = Item::where('itemid', $request->item)->first();
        $item->update([
            'item_detail_flag' => 0
        ]);
        return redirect(route('items.show', ['item' => $item->itemid]));
    }

    // 商品登録画面
    public function create()
    {
        $user = Auth::user();
        $genres = Genre::all();
        $date_ships = DateShip::all();
        $item_statuses = ItemStatus::all();
        return view('items.create', compact('user', 'genres', 'date_ships', 'item_statuses'));
    }

    // 商品登録処理
    public function store(Request $request)
    {

        $rules = [
            'item_name' => ['required', 'string'],
            'item_pic' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            'item_detail' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ];

        $this->validate($request, $rules);

        // 商品IDをスクランブル化
        if (Item::orderBy('id', 'desc')->first()) {
            $id = Item::orderBy('id', 'desc')->first()->id + 1;
        } else {
            $id = 1;
        }
        $hash_keys = array(
            0x12345678, 0x87654321
        );
        foreach ($hash_keys as $hash) {
            $hash = ($hash & 0x7fffffff | 0x1);
            $convertid = ($id * $hash) & 0x7fffffff;
        }
        // スクランブル化ここまで

        // 画像処理
        $img_file = $request->file('item_pic');
        $img = $request->item_pic;
        $img_name = $img->getClientOriginalName();

        // サムネイル作成
        $target_path = public_path('uploads/');
        $img_resize = \Image::make($img_file);
        $img_resize->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img_resize->text($request->price . "円", 10, 30, function ($font) {
            $font->file(public_path('font/SawarabiGothic-Regular.ttf'));
            $font->size(35);
            $font->color('#fff');
        });

        $item = Item::create([
            'user_id' => Auth::user()->id,
            'genre_id' => $request->genre,
            'dateship_id' => $request->date_shipping,
            'itemstatus_id' => $request->item_status,
            'itemid' => 'i' . $convertid,
            'item_name' => $request->item_name,
            'item_path' => $img_name,
            'item_detail' => nl2br($request->item_detail),
            'price' => $request->price,
            'date_shipping' => $request->date_shipping,
            'item_detail_flag' => 0
        ]);

        $img_resize->save($target_path . 'thumb_' . $item->itemid . $img_name);
        $img->move(
            $target_path,
            $item->itemid . $img_name
        );

        return redirect(route('items.show', ['item' => $item->itemid]));
    }

    // 商品詳細画面
    public function show(Request $request)
    {
        $item = Item::where('itemid', $request->item)->first();
        $user = Auth::user();

        if ($item->item_detail_flag == 9 && $user->id != $item->user_id) {
            return redirect(route('root'));
        }
        return view('items.show', compact('item', 'user'));
    }

    // 購入画面
    public function buyshow(Request $request)
    {
        $user = Auth::user();
        $item = Item::where('itemid', $request->item)->first();
        $addresses = $user->addresses;

        return view('trade.buy', compact('item', 'user', 'addresses'));
    }

    // 購入処理
    public function buy(Request $request)
    {
        $user = Auth::user();
        $item = Item::where('itemid', $request->item)->first();
        $item->update([
            'item_detail_flag' => 1
        ]);

        $trade = Trade::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => $user->id,
            'sale_user_id' => $request->saleuser,
            'item_id' => $item->id,
            'status' => 0,
            'payjp_trade_id' => 0,
            'pay_method' => '0',
            'amount' => $item->price * 1.07 + 800,
            'shipping' => 800,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'address_name' => $request->name
        ]);

        return redirect(route('trade.show', ['trade' => $trade->uuid]));
    }
}
