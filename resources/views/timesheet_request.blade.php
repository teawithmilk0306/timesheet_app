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
                            @for ( $i = $today->copy()->startOfMonth(); $i <= $today->lastOfMonth(); $i->addDays(1)) 
                            <tr>
                               <th scope="row">{{ $i->formatLocalized('%m/%d') . $i->isoFormat('(ddd)') }}</th>
                               <td><input type="radio" id="absence" name={{ $i }} value="absence">休み</td>
                               <td><input type="radio" id="early" name={{ $i }} value="early">早番(9:15~18:30) </td>
                               <td><input type="radio" id="late" name={{ $i }} value="late">遅番(11:00~20:15) </td>
                               <td><input type="radio" id="full" name={{ $i }} value="hull">フル(9:15~20:15) </td>
                            </tr>
                            @endfor
                        </tbody>
                            </table>
                            </form>
                    </fieldset>
                    <p class="text-center">
                    <button type="button" class="btn btn-outline-dark">Request</button></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

