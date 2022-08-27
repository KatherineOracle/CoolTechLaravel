<?php
/*
    display form to create article or update existing article
*/
?>

<x-app-layout>
    <x-slot name="header">
        @if(!isset($article->id))
        <h1>Create new article</h1>
        @else
        <h1>Update article</h1>
        @endif
    </x-slot>

    <form id="articleForm" class="needs-validation" enctype="multipart/form-data" novalidate method="post">

        <!-- {{ csrf_field() }} -->
        @csrf
        <!-- {{ csrf_field() }} -->

        <div class="form-group form-check form-switch">
            <input class="form-check-input" {{ ($article->published || !isset($article->id))? "checked" : "" }} name="published" type="checkbox" id="isPublished" {{ (auth()->user()->role->permission_level < 2)? "disabled": "" }}>
            <label class="form-check-label" for="isPublished">Currently published?</label>
            @if(auth()->user()->role->permission_level
            < 2) <input type="hidden" name="published" value="on" />
            @endif
        </div>
        <div class="form-group">
            <label for="articleTitle">Title<span class="req">*</span>:</label>
            <input type="text" class="form-control" id="articleTitle" name="title" value="{{ $article->title }}" required placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="articleSlug">Slug</label>
            <input type="text" class="form-control" id="articleSlug" name="slug" value="{{ $article->slug }}" placeholder="Enter slug or allow us to generate that for you">
        </div>
        <div class="form-group">
            <label for="articleDate">Date published<span class="req">*</span>:</label>
            <input type="datetime-local" class="form-control" id="articleDate" name="published_at" value="{{ date('Y-m-d h:m:s', strtotime( $article->published_at)) }}" placeholder="">
        </div>
        <div class="form-group">
            @if(isset($categories))
            <label for="articleCategory" class="form-label">Category<span class="req">*</span>:</label>
            <select class="form-select" id="articleCategory" name="category_id" required>
                <option selected disabled value="">Choose...</option>
                @foreach($categories as $category)
                <option @if((int)$category->id === (int)$article->category_id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Please select a valid category.
            </div>
            @else
            <p>Uh oh, no categories</p>
            @endif
        </div>
        <div class="form-group">
            @if(isset($tags))
            <label class="form-label">Tags:</label><br />
            @foreach($tags as $tag)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="tagCheck{{ $tag->id }}" @foreach($article->tags as $selectedtag)
                @if((int)$selectedtag->id === (int)$tag->id )
                checked
                @endif
                @endforeach
                name="tags[]" value="{{ $tag->id }}">
                <label class="form-check-label" for="tagCheck{{ $tag->id }}">{{ $tag->title }}</label>
            </div>

            @endforeach
            @else
            <p>Uh oh, no tags</p>
            @endif
        </div>



        <div class="form-group">
            <label for="articleTitle">Content:</label>
            <textarea name="content">{{ $article->content }}</textarea>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col col-xs-12 col-md-8 col-lg-8">
                    <label for="featureImage">Feature image</label>
                    <input type="file" class="form-control form-control-file" id="featureImage" value="/images/{{ $article->feature_image }}" name="feature_image">
                </div>
                <div class="col col-xs-12 col-md-4 col-lg-4">
                    @if($article->feature_image != "")
                    <figure class="text-center">
                        <img class="img-fluid" src="/images/{{ $article->feature_image }}" />
                        <figcaption>Current feature image</figcaption>
                    </figure>
                    @endif
                </div>
            </div>
            <div class="form-group mt-4">
                <input type="hidden" name="id" value="{{ !(isset($article->id))? "new" : $article->id }}" />
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
                    You are about to delete an article. Are you sure?
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
