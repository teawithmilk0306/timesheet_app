@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <fieldset>
                        <thead>
                            <tr>
                                <legend>Do you have a holiday request?</legend>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ action('HolidayController@create') }}" method="post">
                                @csrf
                            <table class="table table-striped">
                            @for ( $date = $today->copy()->startOfMonth(); $date <= $today->lastOfMonth(); $date->addDays(1))
                            <tr>
                               <th scope="row">{{ $date->formatLocalized('%m/%d') . $date->isoFormat('(ddd)') }}</th>

                               <td><input type="radio" id="absence" name={{ "hoge[" . $date->formatLocalized('%Y-%m-%d') . "]"}} value="absence">終日休み</td>
                               <td><input type="radio" id="early" name={{ "hoge[" . $date->formatLocalized('%Y-%m-%d') . "]"}} value="early">早番休み(9:15~18:30) </td>
                               <td><input type="radio" id="late" name={{ "hoge[" . $date->formatLocalized('%Y-%m-%d') . "]"}} value="late">遅番休み(11:00~20:15) </td>
                            </tr>
                            @endfor
                        </tbody>
                            </table>
                    <p class="text-center">
                        <button type="submit" class="btn btn-outline-dark">Request</button>
                    </p>
                    <div>
                        <a href="{{ action('HolidayController@add')}}">
                            <p class="text-center">
                            <button type="submit" class="btn btn-dark">Clear</button>
                            </p>
                        </a>
                    </div>
                </div>
                            </form>
                            
                    </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection