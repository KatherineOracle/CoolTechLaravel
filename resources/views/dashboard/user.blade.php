<?php
/*
    Display form for new user or to update existing user
*/
?>

<x-app-layout>
    <x-slot name="header">
        @if(!isset($user->id))
        <h1>Create new user</h1>
        @else
        <h1>Update user</h1>
        @endif
    </x-slot>


    <form id="articleForm" class="needs-validation" enctype="multipart/form-data" novalidate method="post">

        @csrf
        <!-- Name -->
        <div class="form-group">
            <label for="name">{{__('Name') }}</label>

            <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>

            <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}" required />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" class="form-control" type="password" placeholder="&#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;" name="password" {{(!isset($user->password))? "required": ''}} autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">{{ __('Confirm Password') }} </label>

            <input id="password_confirmation" class="form-control" placeholder="&#x2022; &#x2022; &#x2022; &#x2022; &#x2022; &#x2022;" type="password" {{(!isset($user->password))? "required": ''}} name="password_confirmation" />
        </div>

        <div class="form-group">
            @if(isset($user_roles))
            <label for="articleCategory" class="form-label">Role<span class="req">*</span>:</label>
            <select class="form-select" id="userRole" name="role_id" required>
                <option selected disabled value="">Choose...</option>
                @foreach($user_roles as $role)
                <option @if((int)$role->id === (int)$user->role_id) selected @endif value="{{ $role->id }}">{{ $role->title }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Please select a valid role.
            </div>
            @else
            <p>Uh oh, no roles</p>
            @endif
        </div>


        <div class="form-group mt-4">
            <input type="hidden" name="id" value="{{ !(isset($user->id))? "new" : $user->id }}" />
            <input type="hidden" name="action" value="store" />
            <button type="submit" class="btn btn-primary me-4">Submit</button>

            @if( auth()->user()->role->permission_level == 2)
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete</button>
            @endif
        </div>
    </form>

    @if( auth()->user()->role->permission_level == 2)
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Please confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You are about to delete a user. Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" data-form-id="articleForm" id="btnKill">Yes</button>
                </div>
            </div>
        </div>
    </div>
    @endif


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('content');
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })

            document.querySelector("#btnKill").addEventListener("click", function(event) {

                let killForm = document.querySelector('#' + event.target.getAttribute("data-form-id"));
                let actionField = killForm.querySelector("[name='action']");

                actionField.value = "delete";
                killForm.submit();

            })


        })()
    </script>



</x-app-layout>
