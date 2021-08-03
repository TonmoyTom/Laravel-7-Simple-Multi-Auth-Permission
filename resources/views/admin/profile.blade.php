@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
       Profile Detalis
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-success" href="{{ route('admin.home') }}">
                   Dashboard
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ Auth::user()->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ Auth::user()->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            EMail
                        </th>
                        <td>
                            {{ Auth::user()->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Change
                        </th>
                        <td>
                            <a href="{{route('admin.profile.change')}}">Email Change</a>
                        </tr>
                    <tr>
                        <th>
                            Password Change
                        </th>
                        <td>
                            <a href="{{route('admin.password.change')}}">Password Change</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> --}}
        </div>
    </div>
</div>
@endsection
