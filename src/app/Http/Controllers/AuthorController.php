<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function index()
    {
    // データ一覧ページの表示
        $authors = Author::Paginate(4);
        // dd($authors); //追記
        return view('index', ['authors' => $authors]);
    }
    // データ追加用のページ
    public function add()
    {
        return view('add');
    }
    // データの追加機能
    public function create(AuthorRequest $request)
    {
        $form = $request->all();
        // dd($form); //追記
        Author::create($form);
        return redirect('/');
    }
    // 追記：ここらか
    // データ編集ページの表示
    public function edit(Request $request)
    {
        $author = Author::find($request->id);
        return view('edit', ['form' => $author]);
    }
    // 更新機能
    public function update(AuthorRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        return redirect('/');
    }
    // データベース削除用のページ
    public function delete(Request $request)
    {
        $author = Author::find($request->id);
        return view('delete',['author' => $author]);
    }
    // 削除機能
    public function remove(Request $request)
    {
        Author::find($request->id)->delete();
        return redirect('/');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {
        // $item = Author::where('name', 'LIKE',"%{$request->input}%")->first();
        $item = Author::where('name', $request->input)->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }
    public function bind(Author $author)
    {
        $data = [
            'item'=>$author,
        ];
        return view('author.binds', $data);
    }

    public function verror()
    {
        return view('verror');
    }

    public function relate(Request $request)
    {
        // $items = Author::all();
        // return view('author.index', ['items' => $items]);
        $hasItems = Author::has('book')->get();
        $noItems = Author::doesntHave('book')->get();
        $param = ['hasItems' => $hasItems, 'noItems' => $noItems];
        return view('author.index',$param);
    }
}
