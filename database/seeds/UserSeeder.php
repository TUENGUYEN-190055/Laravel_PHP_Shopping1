<?php

use Illuminate\Database\Seeder;
use App\User; // User モデル読み込み
class UserSeeder extends Seeder
{
public function run()
{
User::truncate(); //データ一括削除
factory(User::class, 50)->create(); //50件のテストデータ追加
}
}
