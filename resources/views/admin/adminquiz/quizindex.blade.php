@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>

     <style>
        .swal-wide{
            width:850px !important;
        }
        .note-toolbar {
                position: relative;
                z-index: 0 !important;
            }
        .gfg_tooltip { 
                position: relative; 
                display: inline-block; 
                border-bottom: 1px dotted black; 
                background-color: gray; 
                color: black; 
                padding: 15px; 
                text-align: center; 
                display: inline-block; 
                font-size: 16px; 
            } 
            .gfg_tooltip:hover {
            -ms-transform: scale(1.2); /* IE 9 */
            -webkit-transform: scale(1.2); /* Safari 3-8 */
            transform: scale(1.2); 
            }
            .gfg_tooltip .gfg_text { 
                visibility: hidden; 
                width: 120px; 
                background-color: gray; 
                color: white; 
                text-align: center; 
                border-radius: 6px; 
                padding: 5px 0; 
                position: absolute; 
                z-index: 1; 
                top: 5%; 
                left: 115%; 
            } 
              
            .gfg_tooltip .gfg_text::after { 
                content: ""; 
                position: absolute; 
                top: 50%; 
                right: 100%; 
                margin-top: -5px; 
                border-width: 5px; 
                border-style: solid; 
                border-color: transparent gray transparent  
                                transparent; 
            } 
              
            .gfg_tooltip:hover .gfg_text { 
                visibility: visible; 
            } 
            iframe {
                width: 100%;
                height: 100%;
            }
    </style>

<body>
            <div class="container quizcontent">
                <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card mt-5">
                            <div class="contentcontainer">
                                    <div class="row p-4 dragrow">
                                        <div class="col-lg-1 col-2 rowhidden d-flex align-items-center">
                                            <div class="btn-group-vertical">
                                                <a class="btn btn-sm text-white gfg_tooltip"style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fas fa-trash  m-0"></i><span class="gfg_text">Delete</span>
                                                </a>
                                                <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                                    <i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>
                                                </a>                                            </div>
                                            </div>
                                        <div class="col-lg-11 col-10 editcontent col-content">
                                                <div class="card-header" id="quizTitle">
                                                <h3 class="text-center" contenteditable="true">Untitled Quiz</h3>
                                                <input type="text" class="form-control d-none" value="Untitled Quiz">
                                                </div>
                                                <div class="card-body">
                                                <form>
                                                    <div class="form-group">
                                                    <label for="description">Quiz Description:</label>
                                                    <textarea class="form-control" id="description" rows="1"></textarea>
                                                    </div>
                                                </form>
                                                </div>
                                        </div>
                                    </div>      
                                    </div>      
                                    </div>      
                                
                                    
    {{-- <div class="contentcontainer">
    <div class="container quizcontent">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card mt-5">
            <div class="card-header" id="quizTitle">
            <h3 class="text-center" contenteditable="true">Untitled Quiz</h3>
            <input type="text" class="form-control d-none" value="Untitled Quiz">
            </div>
            <div class="card-body">
            <form>
                <div class="form-group">
                <label for="description">Quiz Description:</label>
                <textarea class="form-control" id="description" rows="1"></textarea>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div> --}}

    </body>


    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>


            $(document).ready(function(){
                    $('textarea.quizcontent').summernote({
                        toolbar: [
                            // [groupName, [list of button]]
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['fontsize', ['fontsize']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['height', ['height']]
                        ]
                    })
                    $('.ui-helper-hidden-accessible').remove();
                    $('iframe').attr('allowfullscreen');


                        $(document).on('click', '.editcontent', function(){
                                console.log("Hello")
                                $('.ui-helper-hidden-accessible').remove();
                                    $('.btn-group-vertical').remove();
                                    var addrowid = $(this).attr('id');
                                    $(this).closest('.row').find('.rowhidden').append(
                                            '<div class="btn-group-vertical">' +
                                                '<a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' +
                                                '</a>' +
                                                '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                                '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                                '</a>' +                                      
                                            '</div>' +
                                            '</div>'
                                    )
                                })

                    var addrow = $('.contentcontainer').children('.row').length;
                    $(document).on('click', '.newrow', function(){
                        console.log("Hello World")
                    $('.ui-helper-hidden-accessible').remove();
                        addrow+=1;
                        console.log(addrow)
                        $(this).closest('.row').find('.rowhidden').empty()
                        $('.contentcontainer').append(
                            '<div id="'+addrow+'" class="row p-4 dragrow">' +
                                '<div class="col-lg-1 col-2 rowhidden d-flex align-items-center">' + 
                                '<div class="btn-group-vertical">' +
                                    '<a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                    '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' +
                                    '</a>' +
                                    '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                    '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                    '</a>' +                                      
                                '</div>' +
                                '</div>' +
                                '<div class="col-lg-11 col-10 editcontent col-content">' +
                                '<div class="card-header">' +
                                    '<div class="row">' +
                                    '<div class="col">' +
                                        '<select class="form-control">' +
                                        '<option value="multiple_choice">Multiple Choice</option>' +
                                        '<option value="true_false">True/False</option>' +
                                        '<option value="short_answer">Short Answer</option>' +
                                        '</select>' +
                                    '</div>' +
                                    '</div>' +
                                '</div>' +
                                '</div>' +
                            '</div>'
                            );


                        $('textarea.quizcontent').summernote({
                            toolbar: [
                                // [groupName, [list of button]]
                                ['style', ['bold', 'italic', 'underline', 'clear']],
                                ['font', ['strikethrough', 'superscript', 'subscript']],
                                ['fontsize', ['fontsize']],
                                ['color', ['color']],
                                ['para', ['ul', 'ol', 'paragraph']],
                                ['height', ['height']]
                            ]
                        })
                    })



                            })


        </script>


@endsection