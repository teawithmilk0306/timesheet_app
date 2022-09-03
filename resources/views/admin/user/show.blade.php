@extends('layouts.app')
@section('content')
<div class="container">
  <div class="card-group">
  <div class="card">
    <div class="bg-dark text-white">　employee</div>
    <div class="card-body">
      <h4 class="card-title">従業員:</h4>
      <p class="card-text"><h4>{{ $user->name }}</h4></p>
    </div>
  </div>
  <div class="card">
    <div class="bg-dark text-white">　delete</div>
    <div class="card-body">
      <h4 class="card-title">従業員削除</h4>
      <p class="card-text"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCentered">
  delete
</button>
  
  <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        従業員を削除します。
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
        <button type="button" class="btn btn-primary">実行</button>
      </div>
    </div>
  </div>
</div></p>
    </div>
  </div>
  </div>
  
<br>
<h3>{{ $today->format("Y/m"."月") }}</h3>

<table class="table table-bordered">
  <thead>
    <tr>
      @foreach (['日', '月', '火', '水', '木', '金', '土'] as $dayOfWeek)
      <th>{{ $dayOfWeek }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($dates as $date)
    @if ($date->dayOfWeek == 0)
    <tr>
    @endif
      <td
        @if ($date->month != $currentMonth)
        class="bg-secondary"
        @endif
      >
        {{ $date->day }}
      </td>
    @if ($date->dayOfWeek == 6)
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#!" tabindex="-1">Before</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#!">Now <span class="sr-only">(current)</span></a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#!">Next</a>
    </li>
  </ul>
</nav>
</div>
@endsection
