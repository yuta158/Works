@extends('layouts.app')
{{-- @extends('layouts.layouts') --}}

@section('content')
<h1>家計簿</h1>
{{-- 入力画面へのリンク --}}
<a href="{{route('books.create')}}" class="btn btn-success" style="margin-bottom: 10px">＋登録</a>
<br>

<table class="table">
  <tr>
    <th>年月</th>
    <th>区分</th>
    <th>科目</th>
    <th>金額</th>
    <th>メモ</th>
    <th>リンク</th>

  </tr>
  @foreach($books as $book)
  <tr>
    <td>{{$book->year}}年{{$book->month}}月</td>
    <td>
    @php
    if($book->inout === 1){
      echo '収入';
    }if($book->inout === 2){
      echo '支出';
    }
    @endphp
   </td>
    <td>{{$book->category}}</td>
    <td>{{$book->amount}}円</td>
    <td>{{$book->memo}}</td>

    {{-- route('ViewページのURL', パラメータ)--}}
    <td style="width: 80px"><a href="{{route('books.edit', $book)}}" class= "btn btn-warning">編集</a></td>
    <td style="width: 80px"><a href="{{route('books.show', $book)}}" class= "btn btn-info">詳細</a></td> {{-- #$book: id --}}
    <td  style="width: 80px">
    <form action="books/{{$book->id}}" method="POST" style="display: inline">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value='削除' onclick="return confirm('本当に削除しますか？');">
    </form>
  </td>
  </tr>
  @endforeach
</table>
@endsection




