<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class UserItem extends Model
{
    protected $table = 'user_items';
    protected $primaryKey = 'id';
    protected $fillable = [
    'amount',
    'user_id',
    'item_id',
    'price',
    'tax',
    ];
    protected $guarded = [
    'id',
    'created_at',
    'updated_at',
    ];
    protected $dates = [
    'created_at',
    'updated_at',
    ];

    protected static $session_key = 'user_items';



    static public function sessionValues(Request $request)
    {
        $values = [];
        if ($request->session()->has(self::$session_key)) {
        $values = $request->session()->get(self::$session_key);
        }
        return $values;
    }
    static public function sessionValue(Request $request)
    {
        $values = UserItem::sessionValues($request);
        if (isset($values[$request->id])) {
        return $values[$request->id];
        }
    }

    static public function saveSession(Request $request, UserItem $user_item)
    {
        $values = UserItem::sessionValues($request);
        $values[$user_item->item_id] = $user_item; //items.id をキーとする
        $request->session()->put(self::$session_key, $values);
    }

    static public function updateCart(Request $request, User $user, Item $item, $amount)
    {
        $user_item = UserItem::sessionValue($request);
        if (!$user_item) $user_item = new UserItem();
        $user_item->item_id = $item->id;
        $user_item->user_id = $user->id;
        $user_item->price = $item->price;
        $user_item->amount = $amount;
        UserItem::saveSession($request, $user_item);
    }
    static public function addCart(Request $request, User $user, Item $item)
    {
        $user_item = UserItem::sessionValue($request);
        //カート商品があれば 1増加、なければ 初期値 1
        $amount = (isset($user_item->amount)) ? $user_item->amount + 1 : 1;
        UserItem::updateCart($request, $user, $item, $amount);
    }
    static public function removeCart(Request $request, User $user, Item $item)
    {
        if (empty($item)) return;
        if (!$request->session()->has(self::$session_key)) return;
        $user_items = $request->session()->get(self::$session_key);
        if (isset($user_items[$item->id])) {
        unset($user_items[$item->id]);
        $request->session()->put(self::$session_key, $user_items);
        }
        return $user_items;
    }
    static public function clearCart(Request $request)
    {
        $request->session()->forget(self::$session_key);
    }
}




