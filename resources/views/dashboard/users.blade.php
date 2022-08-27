<?php
/*
    Display table view of existing users
*/
?>
<x-app-layout>
    <x-slot name="header">
        <h1>
            {{ __('Edit your articles') }}
        </h1>
    </x-slot>

    <table class="table">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Registered at</th>

        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{ url('/dashboard/user/').'/'.$user->id }}"> {{ $user->name  }} </a></td>
                <td> {{ $user->role->title  }} </td>
                <td> {{ date('M d, Y ', strtotime( $user->created_at)) }}</a></td>

            </tr>
            @endforeach
        <tbody>
    </table>

</x-app-layout>
