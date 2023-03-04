<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Hospital;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.　一覧ページを表示する
     */
    public function index()
    {

        $hospitals = Hospital::getAllOrderByUpdated_at();
        // ddd($hospitals);
        return response()->view('hospital.index',compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.　作成する
     */
    public function create()
    {
        return view('hospital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    // バリデーション
    $validator = Validator::make($request->all(), [
        'hospital_name' => 'required | max:255',
        'address' => 'required | max:255',
        'tel' => 'required | max:255',
        'fax' => 'required | max:255',
    ]);
    // バリデーション:エラー
    if ($validator->fails()) {
        return redirect()
        ->route('hospital.create')
        ->withInput()
        ->withErrors($validator);
    }
    // create()は最初から用意されている関数
    // 戻り値は挿入されたレコードの情報
    $result = Hospital::create($request->all());
    // ルーティング「tweet.index」にリクエスト送信（一覧ページに移動）
    return redirect()->route('hospital.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($hospital_id)
    {
        // ddd($hospital_id);
        $hospital = Hospital::find($hospital_id);
        ddd($hospital);
        return response()->view('hospital.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
