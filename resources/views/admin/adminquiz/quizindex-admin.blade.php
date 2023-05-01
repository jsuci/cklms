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
        .options {
            position: relative;
            z-index: 1;
        }
        .drop-option {
            position: relative;
            z-index: 0;
        }

    </style>

<body>
    <div class="container quizcontent">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="">
                    <div class="row row-question d-flex flex-row">
                        <div class="btn-group-vertical col-md-1"><a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span></a><a class="btn btn-sm text-white m-1 gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span></a></div>
                        <div class="card mt-5 col-md-11">
                            <div class="card-body">
                                <h1 class="card-title">
                                    Untitled Quiz
                                </h1>
                                <p class="card-text">Quiz description</p>
                            </div>
                        </div>
                    </div>


                    <div id="questions">

                        <!-- multiple choice -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <span style="font-weight:600;font-size:1.0pc">
                                    Which enzyme is responsible for separating the two strands of DNA during replication?
                                </span>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        A. Ligase
                                    </label>
                                </div>

                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        B. Primase
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- drag and drop -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <span style="font-weight:600;font-size:1.0pc">
                                    Instruction for drag and drop question
                                </span>

                                <div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">Paris</div>
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">London</div>
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">Atom</div>
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">Paris</div>
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">Gravity</div>

                                </div>
                                
                                <ol class="list-group list-group-numbered p-3">
                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the capital of France? <input class="d-inline form-control drop-option" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the smallest unit of matter? <input class="d-inline form-control drop-option" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the force that pulls objects toward each other? <input class="d-inline form-control drop-option" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        
                        <!-- fill in the blanks -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <span style="font-weight:600;font-size:1.0pc">
                                    Instruction for fill in the blanks
                                </span>

                                <ol class="list-group list-group-numbered p-3">
                                    <li>
                                        <div class="row align-items-center form-inline">
                                            <div class="col-auto">
                                                <p>The <input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"> is the largest organ in the human body.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"> is the process by which a gas turns into a liquid.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>The two main components of the central nervous system are the <input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p> and the <input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text">. Please answer in lowercase.
                                            </div>
                                        </div>
                                    </li>
                                </ol>

                            </div>
                        </div>

                        <!-- enumeration -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <span style="font-weight:600;font-size:1.0pc">
                                    Enumerate the colors of the rainbow.
                                </span>

                                <ol class="list-group list-group-numbered p-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
        
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
        
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>

                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
                                        </div>

                                        <div class="col-md-4">
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
        
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
        
                                            <li>
                                                <p><input class="d-inline form-control" style="border:1px solid #b6b6b6;border-radius:6px;width:200px" type="text"></p>
                                            </li>
                                        </div>


                                        <div class="col-md-4">
                                        </div>
                                    </div>

                                </ol>

                            </div>
                        </div>

                        <!-- essay -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <span style="font-weight:600;font-size:1.0pc">
                                    What are the potential benefits and drawbacks of using genetically modified organisms (GMOs) in agriculture?
                                </span>

                                <textarea class="form-control mt-2" style="border:1px solid #b6b6b6;border-radius:6px;" type="text"></textarea>

                            </div>
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

        
        $( ".drag-option" ).draggable({
            helper: "clone",
            revertDuration: 100,
            revert: 'invalid'
        });

        $( ".drop-option" ).droppable({
            drop: function(event, ui) {

                var dragElement = $(ui.draggable)
                var dropElement = $(this)

                dropElement.val(dragElement.text())
                dropElement.addClass('bg-primary text-white')
                dropElement.prop( "disabled", true );

            }
        });


        // $('textarea').summernote({
        //     tooltip: false,
        //     toolbar: [
        //         // [groupName, [list of button]]
        //         ['style', ['bold', 'italic', 'underline', 'clear']],
        //         // ['font', ['strikethrough', 'superscript', 'subscript']],
        //         ['fontsize', ['fontsize']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         // ['height', ['height']]
        //     ],
        //     callbacks: {
        //         onChange: function(contents, $editable) {
        //             console.log('onChange:', contents, $editable);
        //         }
        //     }
        // })



        // $(document).on('click', '.card-body', function(){
        //     $('.btn-group-vertical').remove();

        //     $(this).append(
        //         `
        //         <div class="btn-group-vertical"><a class="btn btn-sm text-white m-1 gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span></a><a class="btn btn-sm text-white m-1 gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span></a></div>
        //         `
        //     )
        // })

        
    })
</script>


@endsection