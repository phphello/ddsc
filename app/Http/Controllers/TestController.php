<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Bank;
use Illuminate\Support\Facades\View;
use Validator;

class TestController extends Controller {

    //
    public function test1() {
        echo "test1";
        $table = "amap_banks";
        $data = DB::table($table)->where('id', '>', '0')->get();
        foreach ($data as $key => $val) {
            unset($val->id);
        }
        // dd($data);
        $dataArray = [
            'code' => "zhangsan",
            'name' => '123',
            'address' => 'abc/abc'
        ];
        $role = [
            'name' => 'required|min:1|max:10',
            'code' => 'required|int'
        ];

        $this->validate($dataArray, $role);

        $updDataArray = [
            'name' => "lisi",
            'password' => '465',
            'pic' => 'ab/ab'
        ];
//        dump(DB::table($table)->insert($dataArray));
//        dump(DB::table($table)->where('id','3')->update($updDataArray));
        dump(Bank::get(['id'])->where('id', '>', '1')->toArray());
//             $bank = new Bank();
//             $bank->code = '456';
//             $bank->name = '中国银行';
//             $bank->address = '桥西区';
//             $bank->save();
    }

    public function test2() {

        return view('test', ['token' => csrf_token()]);
    }

    public function test3(Request $request) {

        $rules = [
            'name' => 'required|min:1|max:2',
            'password' => 'required|min:1|max:2'
        ];

        $validate = Validator::make($request->all(), $rules);
        
        if($validate->fails()){
            echo "错误";
        }
        
      

        return;
    }

    public function test4(Request $request) {

       // dump($request);
        $rules = [
            'name' => 'required|min:1|max:2',
            'password' => 'required|min:1|max:2'
        ];

        $this->validate($request, $rules);
        $result = ['code'=>0,'message'=>'hello world'] ;
         return response()->json($result);
    }

}
