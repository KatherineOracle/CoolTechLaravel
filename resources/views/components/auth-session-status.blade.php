<?php
/*
    display the login status - this is used for the password reset process which we will not be using locally
*/
?>

@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-success']) }}>
        {{ $status }}
    </div>
@endif
