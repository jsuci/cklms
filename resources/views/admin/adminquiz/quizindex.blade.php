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
            <div class="col-md-8">

                <form action="">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h1 class="card-title">
                                Untitled Quiz
                            </h1>
                            <p class="card-text">Quiz description</p>
                        </div>
                    </div>

                    <div class="quizzes">
                        
                        {{-- <! -- question 1 --> --}}
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 style="font-weight:400">
                                    Instruction for multiple choice question
                                </h5>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Option 1
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Option 2
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 style="font-weight:400">
                                    Instruction for drag and drop question
                                </h5>

                                <div class="options p-3" style="border:3px solid #3e416d;border-radius:6px;">
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Paris</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">London</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Atom</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Paris</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">London</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Atom</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Paris</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Gravity</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Atom</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Paris</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">London</div>
                                    <div class="option btn btn-outline-primary" draggable="true" ondragstart="drag(event)">Atom</div>
                                </div>
                                
                                <ol class="list-group list-group-numbered p-3">
                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the capital of France?</p>
                                            </div>

                                            <div class="col-auto">
                                                <input class="form-control" style="border:1px solid #b6b6b6;border-radius:6px;" type="text" class="blank" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the smallest unit of matter?</p>
                                            </div>

                                            <div class="col-auto">
                                                <input class="form-control" style="border:1px solid #b6b6b6;border-radius:6px;" type="text" class="blank" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the force that pulls objects toward each other?</p>
                                            </div>

                                            <div class="col-auto">
                                                <input class="form-control" style="border:1px solid #b6b6b6;border-radius:6px;" type="text" class="blank" ondrop="drop(event)" ondragover="allowDrop(event)">
                                            </div>
                                        </div>
                                    </li>

                                </ol>

                        </div>

                    </div>
                </form>

            </div>
        </div> <!-- end main row -->
    </div> <!-- end container quizcontent -->
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
            $('.ui-helper-hidden-accessible').remove();
                addrow += 1;

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