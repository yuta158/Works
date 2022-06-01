@extends('layouts.app')
{{-- @extends('layouts.layouts') --}}

{{-- 挿入するデータ --}}
@section('content')
<h1>家計簿データを修正</h1>
<form method="POST"action="/books/{{$book->id}}">
  @csrf
  @method("PATCH"){{-- 更新 --}}
  <div class="form-group">
    <label>年度</label>
    <select name="year" class="form-control">
      <?php for($i=1980;$i<2031;$i++):?>
       <option value="{{$i}}">{{$i}}</option>
      <?php endfor ?>
      </select>
  </div>
  <div class="form-group">
    <label>対象月</label>
     <select name="month" class="form-control">
      <?php for($i=1;$i<13;$i++):?>
       <option value="{{$i}}">{{$i}}</option>
      <?php endfor ?>
    </select>
   </div>
   <div class="form-group">
     <label for="product-name">収支区分</label>
     <div class="form-check">
       <input class="form-check-input" type="radio" name="inout" value="1"{{($book->inout === 1)? "checked" : ""}}>
       <label class="form-check-label">収入</label>
     </div>
     <div class="form-check">
       <input class="form-check-input" type="radio" name="inout" value="2"{{($book->inout === 2)? "checked" : ""}}>
       <label class="form-check-label" for="inout">支出</label>
      </div>
    </div>
    <div class="form-group">
      <label for="product-name">カテゴリ</label>
      <select class="custom-select" name="category">
        @foreach(App\Models\Book::$categories as $category)
        <option value="{{$category}}"{{($book->category === $category)?"selected":""}}>{{$category}}</option>
        @endforeach

        {{-- <option value="趣味"{{($book->category==="趣味")?"selected":""}}>趣味</option>
        <option value="食費"{{($book->category==="食費")?"selected":""}}>食費</option>
        <option value="光熱費"{{($book->category==="光熱費")?"selected":""}}>光熱費</option>
        <option value="家賃・ローン"{{($book->category==="家賃・ローン")?"selected":""}}>家賃・ローン</option>
        <option value="交際費"{{($book->category==="交際費")?"selected":""}}>交際費</option>
        <option value="教育費"{{($book->category==="教育費")?"selected":""}}>教育費</option>
        <option value="給料"{{($book->category==="給料")?"selected":""}}>給料</option><optionvalue="副業"{{($book->category=="副業")?"selected":""}}>副業</option>
        <option value="臨時収入"{{($book->category==="臨時収入")?"selected":""}}>臨時収入</option> --}}

      </select>
    </div>
    <div class="form-group">
      <label for="product-name">金額 (単位：円)</label>
      <input type="number" name="amount" id="productname" class="form-control" value="{{$book->amount}}">
    </div>
    <div class="form-group">
      <label for="producrt-name">メモ</label>
      <input type="text" name="memo" class="form-control" value="{{$book->memo}}">
    </div>
    <input type="submit" value="送信" class="btn btn-primary">
    <a href="{{route('books.index')}}" class="btn btn-secondary">戻る</a>
  </form>


@endsection