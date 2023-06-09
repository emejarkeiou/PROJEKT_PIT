@extends('layouts.app')

@section('content')
    <style>
        body {
            background-image: url("/assets/img/bg.jpg");
        }

        .bg-dark {
            background-color: #443C68;
            border: none;
            border-radius: 10px;
            color: #ccc !important;
        }

        .bg2 {
            background-color: #393053 !important;
        }

        input, .btn-maro {
            background-color: #635985 !important;
            border: none !important;
            border-radius: 10px !important;
            color: #ccc !important;
        }

        button {
            color: #eee !important;
        }

        td, th {
            background-color: #635985 !important;
            border-color: #443C68 !important;
            border: 2px solid #443C68 !important;
            color: #ccc !important;
        }
    </style>

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default bg-dark">
                <div class="panel-heading bg-dark bg2 text-bold text-center">
                    <strong>Nová úloha</strong>
                </div>

                <div class="panel-body">
                    @include('common.errors')

                    <!-- Nová uloha form -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Uloha Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Úloha</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Pridať button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default btn-maro">
                                    <i class="fa fa-btn fa-plus"></i>Pridať
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Aktualne ulohy -->
            @if (count($tasks) > 0)
                <div class="panel panel-default bg-dark">
                    <div class="panel-heading bg-dark bg2 text-center">
                        <strong>Zoznam úloh</strong>
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped table-center task-table">
                            <thead>
                                <th>Úloha</th>
                                <th>Akcia</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">{{ $task->name }}</td>

                                        <!-- Odstranit Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Odstrániť
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
