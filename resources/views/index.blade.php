@extends('layouts.app')

@section('content')
 <div class="container">
    <h3>{{$floor_name}}</h3>
    <div class="col-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                    {{ $today->format("Y/m"."月") }}
                    </th>
                {{-- adddays 関数は、指定された日数を指定された日付に加算し、新しい日付の値を返します。元の日付と、その日付に加える日数の 2 つの引数を指定 --}}
                {{-- copy関数ファイル from を to にコピーします。--}}
                @for($date = $today->copy()->startOfMonth(); $date <= $today->lastOfMonth(); $date->addDays(1))
                    <th>{{ $date->day }}日</th>
                @endfor
                </tr>
                <tr>
                    <th>
                    曜日
                    </th>
                    @for($date = $today->copy()->startOfMonth(); $date <= $today->lastOfMonth(); $date->addDays(1))
                    <th>{{ $date->isoFormat('ddd') }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <?php  $name  = ["飯田", "斎藤", "藤本", "富田","小川","藤巻","小蔦","神保","佐久間","石橋","遠藤","佐々木","神戸","坂本"]; ?>
                @for ($i = 0; $i <= 13; $i++)
                <tr>
                    <th scope="row">{{ $name[$i] }} </th>
                    <td>早番</td>
                    <td>フル</td>
                    <td>早番</td>
                    <td>遅番</td>
                    <td>早番</td>
                    <td>遅番</td>
                    <td>フル</td>
                    <td>遅番</td>
                </tr>
                @endfor
                
        </thead>
        </table>
    </div>
    <div class="progress" style="height: 30px;"> <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25時間</div> 
    </div>
</div>
@endsection
    