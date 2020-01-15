<!-- <html>
<head>
    <title>休日データ</title>
</head>
<body> -->
@extends('layouts.app')
@section('title', '休日設定')
@section('content')
    <h1>予定設定</h1>
    <a href="{{ url('/') }}">カレンダーに戻る</a> 
    <!-- 休日入力フォーム -->
    <form method="POST" action="/holiday"> 
    <div class="form-group">
    {{csrf_field()}}
    <label for="day">日付[YYYY/MM/DD] </label>
    <input type="date" name="day" class="form-control" id="day" value="{{$data->day}}">
    <label for="starttime">開始時間 </label>
    <input type="time" name="starttime" class="form-control" id="starttime" value="{{$data->starttime}}">
    <label for="endtime">終了時間 </label>
    <input type="time" name="endtime" class="form-control" id="endtime" value="{{$data->endtime}}">


    <label for="description">説明</label>
    <input type="text" name="description" class="form-control" id="description" value="{{$data->description}}"> 
    </div>  
    <button type="submit" class="btn btn-primary">登録</button> 
    <input type="hidden" name="id" value="{{$data->id}}">
    </form> 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- 休日一覧表示 -->
    <table class="table">
    <thead>
    <tr>
    <th scope="col">日付</th>
     <th scope="col">開始時間</th>
      <th scope="col">終了時間</th>
      <th scope="col">説明</th>
    <th scope="col">作成日</th>
    <th scope="col">更新日</th>
    <th scope="col">削除</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $val)
    <tr>
        <th scope="row"><a href="{{ url('/holiday/'.$val->id) }}">{{$val->day}}</a></th>
         <td>{{$val->starttime}}</td>
          <td>{{$val->endtime}}</td>
        <td>{{$val->description}}</td>
        <td>{{$val->created_at}}</td>
        <td>{{$val->updated_at}}</td>
        <td><form action="/holiday" method="post">
{{csrf_field()}} 
            <input type="hidden" name="id" value="{{$val->id}}">
            <!-- <input type="text" name="id" value="{{$val->id}}"> -->
            
            {{ method_field('delete') }}
            <button class="btn btn-default" type="submit">Delete</button>
        </form></td>
    </tr>
    @endforeach
    </tbody>
    </table>
   
    
    <script>
  ( function() {
    $( "#day" ).datepicker(
      {dateFormat: 'yy-mm-dd'});
  } );
</script>
@endsection
<!-- </body>
</html> -->