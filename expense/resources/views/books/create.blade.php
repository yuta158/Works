@extends('layouts.app')
{{-- @extends('layouts.layouts') --}}

@section('content')
<h1>新しい家計簿データを追加</h1>
<form method="POST" action="/books">
  @csrf

  <div  class="form-group">{{-- 余白などの見た目を調整 --}}
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
      <input class="form-check-input" type="radio" name="inout" value="1" checked>
      <label class="form-check-label">収入</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="inout" value="2">
      <label class="form-check-label" for="inout">支出</label>
    </div>
  </div>
  <div class="form-group">
      <label for="product-name">カテゴリ</label>
      <select class="custom-select" name="category">
        @foreach(App\Models\Book::$categories as $category)
        <option value="{{$category}}">{{$category}}</option>
        @endforeach

        {{-- <option value="趣味">趣味</option>
        <option value="食費">食費</option>
        <option value="光熱費">光熱費</option>
        <option value="家賃・ローン">家賃・ローン</option>
        <option value="交際費">交際費</option>
        <option value="教育費">教育費</option>
        <option value="給料">給料</option>
        <option value="副業">副業</option>
        <option value="臨時収入">臨時収入</option> --}}

      </select>
    </div>
    <div class="form-group">
      <label for="product-name">金額</label>
      <input type="number" name="amount" id="product-name" class="form-control" value="0">
    </div>
    <div class="form-group">
      <label for="producrt-name">メモ</label>
      <input type="text" name="memo" class="form-control">
    </div>
  <input type="submit" value="送信" class="btn btn-primary">
  <a href="{{route('books.index')}}" class="btn btn-secondary">戻る</a>
</form>

@endsection
