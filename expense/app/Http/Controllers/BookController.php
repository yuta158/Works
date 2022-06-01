<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\User;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * 参照しようとしてるデータのuser_idと、ログインユーザーIDが異なっている場合
     * 一覧画面にリダイレクト
     */
    private function checkMyData(Book $book)
    {
        // ログインユーザー
        $user = Auth::user();

        if ($book->user_id !== $user->id) {
            return redirect()->route('books.index');
        }
    }

    // 一覧画面 index books #GET
    public function index()
    {
        // ログインユーザー
        $user = Auth::user();
        /**
         *ログインユーザーのデータをbookテーブルから全件取得
         * @booksメソッド: userモデルに定義
         */
        $books = $user->books;
        return view('books.index', compact('books'));
    }

    // 詳細画面 show books/{id} #GET
    public function show(Book $book)
    {
        /**
         * 参照しようとしてるデータのuser_idと、ログインユーザーIDが異なっている場合
         * 一覧画面にリダイレクト
         */
        $this->checkMyData($book);
        // book: view画面に渡す
        return view('books.show', compact('book'));
    }

    // データ入力画面の生成 books/create #GET
    public function create()
    {
        return view('books.create');
    }

    // 　フォームからの入力値をDBに登録 store #POST
    public function store(Request $req)
    {
        $book = new Book();
        // Bookオブジェクトにデータを詰め替え & 保存
        $book->fill($req->all());

        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // Bookテーブルのuser_idに、ログインしているユーザーのidを格納
        $book->user_id = $user->id;
        // DBに保存
        $book->save();

        // $book->inout = $req->inout;
        // $book->year = $req->year;
        // $book->month = $req->month;
        // $book->category = $req->category;
        // $book->amount = $req->amount;
        // $book->memo = $req->memo;

        // 詳細画面にリダイレクト、book: view画面に渡す
        return redirect()->route('books.show', $book);
    }

    // 上書き edit books/{id}/edit $GET
    public function edit(Book $book)
    {
        // book: view画面に渡す
        return view('books.edit', compact('book'));
    }

    // update books/{id} #PUT/PATCH
    public function update(Request $req, Book $book)
    {
        // Bookオブジェクトにデータを詰め替え & 保存
        $book->fill($req->all())->save();

        // $book->inout = $req->inout;
        // $book->year = $req->year;
        // $book->month = $req->month;
        // $book->category = $req->category;
        // $book->amount = $req->amount;
        // $book->memo = $req->memo;

        // book: view画面に渡す
        return redirect()->route('books.show', $book);
    }

    // destroy books/{id} #DELETE
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
