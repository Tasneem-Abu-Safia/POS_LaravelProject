@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href=""> @lang('site.users')</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">
                <div class="box-header"></div>

                <div class="box-body">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">@lang('site.users')</h3>
                        </div>
                        <div class="card-body">
                          @if(count($users) > 0)

                                <div class="row">

                                    <div class="col-md-4">
                                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                        <a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>

                                        {{--                                        @if (auth()->user()->hasPermission('create_users'))--}}
{{--                                            <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>--}}
{{--                                        @else--}}
{{--                                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>--}}
{{--                                        @endif--}}
                                    </div>

                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>@lang('site.first_name')</th>
                                        <th>@lang('site.last_name')</th>
                                        <th>@lang('site.email')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($users as $index=>$user)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$user->first_name}}</td>
                                            <td>{{$user->last_name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                               <a href="{{route('dashboard.users.edit', $user->id)}}"> <button  class="btn-secondary btn btn-sm">@lang('site.edit')</button></a>
                                                <form action="" method="post" style="display: inline-block">
                                                    @csrf
                                                    <button type="submit" class="btn-danger btn btn-sm">@lang('site.delete')</button>

                                                </form>
                                            </td>
                                        </tr>


                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                              <h2>@lang('no_data_found')</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </section>

    </div>

@endsection
