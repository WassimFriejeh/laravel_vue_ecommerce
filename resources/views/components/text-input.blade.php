@props(['disabled' => false, 'errors', 'label' => false])

<?php

$id = $errors->get($attributes['name']);
// $id = 'dad';
$errorsClasses = 'border-red-600 focus:border-red-600 ring-1 ring-red-600 focus:ring-red-600';
$defaultClasses = ' sm';
$successClasses = 'border-emerald-500 focus:border-emerald-500 ring-1 ring-emerald-500 focus:ring-emerald-500';

?>


@if ($label)
    <label>{{ $label }}</label>
@endif

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full
border-gray-300 focus:border-purple-500 focus:outline-none focus:ring-purple-500 rounded-md w-full ' .
        ($errors->has($attributes['name'])
            ? $errorsClasses
            : (old($attributes['name'])
                ? $successClasses
                : $defaultClasses)),
]) !!}>




{{-- @error($attributes['name'])
    <small class="dark:text-red-400">{{ $message }}</small>
@enderror --}}

@error($attributes['name'])
    <small class=" dark:text-red-400 my-2  mx-auto">{{ $message }}</small>
@enderror
