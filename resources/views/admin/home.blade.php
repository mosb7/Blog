@extends('layout')

@section('content')

    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }
        .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
        }
        .card-header {
            padding: 0.5rem 1rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }
        thead, tbody, tfoot, tr, td, th {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 0.9rem;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        @media (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }
        .btn:hover {
            color: #212529;
        }
        .btn-check:focus + .btn, .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn:disabled, .btn.disabled, fieldset:disabled .btn {
            pointer-events: none;
            opacity: 0.65;
        }

        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .btn-check:focus + .btn-primary, .btn-primary:focus {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
        }
        .btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0a58ca;
            border-color: #0a53be;
        }
        .btn-check:checked + .btn-primary:focus, .btn-check:active + .btn-primary:focus, .btn-primary:active:focus, .btn-primary.active:focus, .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
        }
        .btn-primary:disabled, .btn-primary.disabled {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
        }
        .btn-check:focus + .btn-secondary, .btn-secondary:focus {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
            box-shadow: 0 0 0 0.25rem rgba(130, 138, 145, 0.5);
        }
        .btn-check:checked + .btn-secondary, .btn-check:active + .btn-secondary, .btn-secondary:active, .btn-secondary.active, .show > .btn-secondary.dropdown-toggle {
            color: #fff;
            background-color: #565e64;
            border-color: #51585e;
        }
        .btn-check:checked + .btn-secondary:focus, .btn-check:active + .btn-secondary:focus, .btn-secondary:active:focus, .btn-secondary.active:focus, .show > .btn-secondary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(130, 138, 145, 0.5);
        }
        .btn-secondary:disabled, .btn-secondary.disabled {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-success {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #157347;
            border-color: #146c43;
        }
        .btn-check:focus + .btn-success, .btn-success:focus {
            color: #fff;
            background-color: #157347;
            border-color: #146c43;
            box-shadow: 0 0 0 0.25rem rgba(60, 153, 110, 0.5);
        }
        .btn-check:checked + .btn-success, .btn-check:active + .btn-success, .btn-success:active, .btn-success.active, .show > .btn-success.dropdown-toggle {
            color: #fff;
            background-color: #146c43;
            border-color: #13653f;
        }
        .btn-check:checked + .btn-success:focus, .btn-check:active + .btn-success:focus, .btn-success:active:focus, .btn-success.active:focus, .show > .btn-success.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(60, 153, 110, 0.5);
        }
        .btn-success:disabled, .btn-success.disabled {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .btn-info {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-info:hover {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2;
        }
        .btn-check:focus + .btn-info, .btn-info:focus {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2;
            box-shadow: 0 0 0 0.25rem rgba(11, 172, 204, 0.5);
        }
        .btn-check:checked + .btn-info, .btn-check:active + .btn-info, .btn-info:active, .btn-info.active, .show > .btn-info.dropdown-toggle {
            color: #000;
            background-color: #3dd5f3;
            border-color: #25cff2;
        }
        .btn-check:checked + .btn-info:focus, .btn-check:active + .btn-info:focus, .btn-info:active:focus, .btn-info.active:focus, .show > .btn-info.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(11, 172, 204, 0.5);
        }
        .btn-info:disabled, .btn-info.disabled {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }

        .btn-warning {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
        }
        .btn-check:focus + .btn-warning, .btn-warning:focus {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
            box-shadow: 0 0 0 0.25rem rgba(217, 164, 6, 0.5);
        }
        .btn-check:checked + .btn-warning, .btn-check:active + .btn-warning, .btn-warning:active, .btn-warning.active, .show > .btn-warning.dropdown-toggle {
            color: #000;
            background-color: #ffcd39;
            border-color: #ffc720;
        }
        .btn-check:checked + .btn-warning:focus, .btn-check:active + .btn-warning:focus, .btn-warning:active:focus, .btn-warning.active:focus, .show > .btn-warning.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(217, 164, 6, 0.5);
        }
        .btn-warning:disabled, .btn-warning.disabled {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        .btn-check:focus + .btn-danger, .btn-danger:focus {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37;
            box-shadow: 0 0 0 0.25rem rgba(225, 83, 97, 0.5);
        }
        .btn-check:checked + .btn-danger, .btn-check:active + .btn-danger, .btn-danger:active, .btn-danger.active, .show > .btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #b02a37;
            border-color: #a52834;
        }
        .btn-check:checked + .btn-danger:focus, .btn-check:active + .btn-danger:focus, .btn-danger:active:focus, .btn-danger.active:focus, .show > .btn-danger.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(225, 83, 97, 0.5);
        }
        .btn-danger:disabled, .btn-danger.disabled {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-light {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-light:hover {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
        }
        .btn-check:focus + .btn-light, .btn-light:focus {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
            box-shadow: 0 0 0 0.25rem rgba(211, 212, 213, 0.5);
        }
        .btn-check:checked + .btn-light, .btn-check:active + .btn-light, .btn-light:active, .btn-light.active, .show > .btn-light.dropdown-toggle {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
        }
        .btn-check:checked + .btn-light:focus, .btn-check:active + .btn-light:focus, .btn-light:active:focus, .btn-light.active:focus, .show > .btn-light.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(211, 212, 213, 0.5);
        }
        .btn-light:disabled, .btn-light.disabled {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-dark {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }
        .btn-dark:hover {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21;
        }
        .btn-check:focus + .btn-dark, .btn-dark:focus {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21;
            box-shadow: 0 0 0 0.25rem rgba(66, 70, 73, 0.5);
        }
        .btn-check:checked + .btn-dark, .btn-check:active + .btn-dark, .btn-dark:active, .btn-dark.active, .show > .btn-dark.dropdown-toggle {
            color: #fff;
            background-color: #1a1e21;
            border-color: #191c1f;
        }
        .btn-check:checked + .btn-dark:focus, .btn-check:active + .btn-dark:focus, .btn-dark:active:focus, .btn-dark.active:focus, .show > .btn-dark.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(66, 70, 73, 0.5);
        }
        .btn-dark:disabled, .btn-dark.disabled {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }

        .btn-outline-primary {
            color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-check:focus + .btn-outline-primary, .btn-outline-primary:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.5);
        }
        .btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-check:checked + .btn-outline-primary:focus, .btn-check:active + .btn-outline-primary:focus, .btn-outline-primary:active:focus, .btn-outline-primary.active:focus, .btn-outline-primary.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.5);
        }
        .btn-outline-primary:disabled, .btn-outline-primary.disabled {
            color: #0d6efd;
            background-color: transparent;
        }

        .btn-outline-secondary {
            color: #6c757d;
            border-color: #6c757d;
        }
        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-check:focus + .btn-outline-secondary, .btn-outline-secondary:focus {
            box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.5);
        }
        .btn-check:checked + .btn-outline-secondary, .btn-check:active + .btn-outline-secondary, .btn-outline-secondary:active, .btn-outline-secondary.active, .btn-outline-secondary.dropdown-toggle.show {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-check:checked + .btn-outline-secondary:focus, .btn-check:active + .btn-outline-secondary:focus, .btn-outline-secondary:active:focus, .btn-outline-secondary.active:focus, .btn-outline-secondary.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(108, 117, 125, 0.5);
        }
        .btn-outline-secondary:disabled, .btn-outline-secondary.disabled {
            color: #6c757d;
            background-color: transparent;
        }

        .btn-outline-success {
            color: #198754;
            border-color: #198754;
        }
        .btn-outline-success:hover {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-check:focus + .btn-outline-success, .btn-outline-success:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.5);
        }
        .btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-check:checked + .btn-outline-success:focus, .btn-check:active + .btn-outline-success:focus, .btn-outline-success:active:focus, .btn-outline-success.active:focus, .btn-outline-success.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.5);
        }
        .btn-outline-success:disabled, .btn-outline-success.disabled {
            color: #198754;
            background-color: transparent;
        }

        .btn-outline-info {
            color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-outline-info:hover {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-check:focus + .btn-outline-info, .btn-outline-info:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.5);
        }
        .btn-check:checked + .btn-outline-info, .btn-check:active + .btn-outline-info, .btn-outline-info:active, .btn-outline-info.active, .btn-outline-info.dropdown-toggle.show {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-check:checked + .btn-outline-info:focus, .btn-check:active + .btn-outline-info:focus, .btn-outline-info:active:focus, .btn-outline-info.active:focus, .btn-outline-info.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.5);
        }
        .btn-outline-info:disabled, .btn-outline-info.disabled {
            color: #0dcaf0;
            background-color: transparent;
        }

        .btn-outline-warning {
            color: #ffc107;
            border-color: #ffc107;
        }
        .btn-outline-warning:hover {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-check:focus + .btn-outline-warning, .btn-outline-warning:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.5);
        }
        .btn-check:checked + .btn-outline-warning, .btn-check:active + .btn-outline-warning, .btn-outline-warning:active, .btn-outline-warning.active, .btn-outline-warning.dropdown-toggle.show {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-check:checked + .btn-outline-warning:focus, .btn-check:active + .btn-outline-warning:focus, .btn-outline-warning:active:focus, .btn-outline-warning.active:focus, .btn-outline-warning.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.5);
        }
        .btn-outline-warning:disabled, .btn-outline-warning.disabled {
            color: #ffc107;
            background-color: transparent;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-check:focus + .btn-outline-danger, .btn-outline-danger:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.5);
        }
        .btn-check:checked + .btn-outline-danger, .btn-check:active + .btn-outline-danger, .btn-outline-danger:active, .btn-outline-danger.active, .btn-outline-danger.dropdown-toggle.show {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-check:checked + .btn-outline-danger:focus, .btn-check:active + .btn-outline-danger:focus, .btn-outline-danger:active:focus, .btn-outline-danger.active:focus, .btn-outline-danger.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.5);
        }
        .btn-outline-danger:disabled, .btn-outline-danger.disabled {
            color: #dc3545;
            background-color: transparent;
        }

        .btn-outline-light {
            color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-outline-light:hover {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-check:focus + .btn-outline-light, .btn-outline-light:focus {
            box-shadow: 0 0 0 0.25rem rgba(248, 249, 250, 0.5);
        }
        .btn-check:checked + .btn-outline-light, .btn-check:active + .btn-outline-light, .btn-outline-light:active, .btn-outline-light.active, .btn-outline-light.dropdown-toggle.show {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-check:checked + .btn-outline-light:focus, .btn-check:active + .btn-outline-light:focus, .btn-outline-light:active:focus, .btn-outline-light.active:focus, .btn-outline-light.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(248, 249, 250, 0.5);
        }
        .btn-outline-light:disabled, .btn-outline-light.disabled {
            color: #f8f9fa;
            background-color: transparent;
        }

        .btn-outline-dark {
            color: #212529;
            border-color: #212529;
        }
        .btn-outline-dark:hover {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }
        .btn-check:focus + .btn-outline-dark, .btn-outline-dark:focus {
            box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.5);
        }
        .btn-check:checked + .btn-outline-dark, .btn-check:active + .btn-outline-dark, .btn-outline-dark:active, .btn-outline-dark.active, .btn-outline-dark.dropdown-toggle.show {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }
        .btn-check:checked + .btn-outline-dark:focus, .btn-check:active + .btn-outline-dark:focus, .btn-outline-dark:active:focus, .btn-outline-dark.active:focus, .btn-outline-dark.dropdown-toggle.show:focus {
            box-shadow: 0 0 0 0.25rem rgba(33, 37, 41, 0.5);
        }
        .btn-outline-dark:disabled, .btn-outline-dark.disabled {
            color: #212529;
            background-color: transparent;
        }

        .btn-link {
            font-weight: 400;
            color: #0d6efd;
            text-decoration: underline;
        }
        .btn-link:hover {
            color: #0a58ca;
        }
        .btn-link:disabled, .btn-link.disabled {
            color: #6c757d;
        }

        .btn-lg, .btn-group-lg > .btn {
            padding: 0.5rem 1rem;
            font-size: 1.125rem;
            border-radius: 0.3rem;
        }

        .btn-sm, .btn-group-sm > .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.7875rem;
            border-radius: 0.2rem;
        }

    </style>

    @php
        $plan = \Illuminate\Support\Facades\DB::table('plans')->where('id',auth()->user()->plan_id )->first();
    @endphp
    <div class="container" style="padding-top: 5%;text-align: center;">
        <div class="avatar-container" style="text-align: center">
            <img class="avatar-img" src="{{auth()->user()->img}}"/>
            <h3>Welcome, {{auth()->user()->name}}</h3>
        </div>
        <div>
            <div class="left-side-avatar">
                <div style="padding-left:45%;text-align: left">
                    <label>You're logged in as <strong>User</strong>.</label><br>
                    <label>You're plan is <strong>{{ $plan->name }}</strong>.</label><br>
                    <label>there is <strong>{{$no_visits}}</strong> visits.</label><br>
                    <label>there is <strong>{{$no_users}}</strong> users who signed up.</label>
                </div>

            </div>
            <div class="right-side-avatar">
                <label><strong>name:</strong>{{auth()->user()->name }}</label><br>
                <label><strong>E-mail:</strong>{{auth()->user()->email }}</label><br>
                <label><strong>Created at:</strong> {{auth()->user()->created_at }}</label><br>
            </div>
        </div>
    </div>
    <hr style="width: 80%;margin-top: 12%;">
    <div class="statics">
        <h2>Blog statics</h2>
        <div style="padding-left: 4%">
            @if(!is_null($max_post_visit_post))
                <h4>Your most visited post with {{$max_post_visit_post->visits}} visits</h4>
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$max_post_visit_post->id}}'">
                        <p class="title">{{$max_post_visit_post->title}}</p>
                        <p>{{$max_post_visit_post->body}}</p>
                    </div>
                </div>
                <br>
            @endif
        </div>
        <div style="padding-left: 8%">
            @if(!is_null($users->first()))
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Users List') }}</div>
                        <div style="padding:1%;text-align: center;width:100%">
                            <table style="width:98%">
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>plan</th>
                                    <th>created at</th>
                                    <th>updated at</th>
                                    <th></th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td style="word-wrap: normal">
                                            {{\Illuminate\Support\Facades\DB::table('plans')->where('id',$user->plan_id)->get()[0]->name}}
                                        </td>
                                        <td style="word-wrap: normal">
                                            {{$user->created_at}}
                                        </td>
                                        <td style="word-wrap: normal">
                                            {{$user->updated_at}}
                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                               href="{{ url('/user/delete/'.$user->id)}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            @else
                <div style="padding:6%;text-align: center;width:100%">
                    <h2>There are no other users.</h2>
                </div>
            @endif
        </div>
        <br>
        <div style="padding-left: 8%">
            @if(!is_null($orders->first()))
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">{{ __('Primary plan orders') }}</div>
                        <div style="padding:1%;text-align: center;width:100%">
                            <table style="width:98%">
                                <tr>
                                    <th>id</th>
                                    <th>user id</th>
                                    <th>status</th>
                                    <th>created at</th>
                                    <th>updated at</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>
                                            {{$order->id}}
                                        </td>
                                        <td>
                                            {{$order->user_id}}
                                        </td>
                                        <td>
                                            {{$order->status}}
                                        </td>
                                        <td style="word-wrap: normal">
                                            {{$order->created_at}}
                                        </td>
                                        <td style="word-wrap: normal">
                                            {{$order->updated_at}}
                                        </td>
                                        <td>
                                            <a class="btn btn-dark"
                                               href="{{ url('/get-premium-plan/approve\/').$order->id."?user=".$order->user_id }}">Verify</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-warning"
                                               href="{{ url('/get-premium-plan/cancel\/').$order->id}}">Cancel</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger"
                                               href="{{ url('/get-premium-plan/delete\/').$order->id}}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            @else
                <div style="padding:6%;text-align: center;width:100%">
                    <h2>No one Requested premium plan.</h2>
                </div>
            @endif
        </div>


    </div>
    <div class="your-posts" style="padding-left:4%;">


        @if(!is_null($user_posts->first()))
            <h4>Your posts</h4>
            <label>number of posts = {{$no_posts}}</label><br><br>
            @foreach($user_posts as $post)
                <div style="padding-left: 4%">
                    <div class="post" onclick="location.href='/posts/{{$post->id}}'">
                        <p class="title">{{$post->title}}</p>
                        <p>{{$post->body}}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div style="padding:6%;text-align: center;width:100%">
                <h2>You didn't post anything yet.</h2>
            </div>
        @endif


    </div>



@endsection