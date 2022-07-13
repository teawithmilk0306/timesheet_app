@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container">
     <h3>そごう千葉店スタッフ一覧</h3>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th>ユーザーID</th>
                <th>名前</th>
                <th>勤務時間</th>
                <th>勤務予定時間</th>
                <th>シフト申請状況</th>
                </tr>
            </thead>
            <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td></td>
            <td></td>
            <td>
                @if($user->hasSubmittedHolidayRequestsInThisMonth())
                  <button type="button" class="btn btn-dark">提出済み</button>
                
                @else
                <button type="button" class="btn btn-outline-dark">未提出</button>
                @endif
            </td>
        </tr>
         @endforeach
         </tbody>
        </table>
    </div>
</div>
@endsection
