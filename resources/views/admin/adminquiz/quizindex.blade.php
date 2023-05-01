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
        .instruction {
            font-weight:600;
            font-size:1.0pc;
        }
        .mutiple-choice > div > ol > li {
            margin-top: 1.7em;
        }
        .q-input {
            border:1px solid #b6b6b6 !important;
            border-radius:6px !important;
            width:200px !important;
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
                            <p class="card-text">This quiz consists of several different types of questions, including multiple-choice, enumeration, fill-in-the-blank, and essay questions. Read each question carefully and choose the best answer. You will have 30 minutes to complete the quiz. Once you start the quiz, the timer will begin and you cannot pause or stop the quiz.</p>
                        </div>
                    </div>

                    <div id="questions">

                        <!-- multiple choice -->
                        <div class="card mt-5 mutiple-choice">
                            <div class="card-body">
                                <p class="instruction">
                                    Choose the best answer from the options provided for each question. Only one answer is allowed per question.
                                </p>

                                <ol>
                                    <li>
                                        <p>Which enzyme is responsible for separating the two strands of DNA during replication?</p>
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
                                    </li>
                                    <li>
                                        <p>Which of the following is true about DNA replication?</p>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                A. It occurs only during cell division
                                            </label>
                                        </div>
        
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                B. It occurs constantly throughout the cell cycle
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                C. It occurs only in certain types of cells
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                D. It occurs only in prokaryotic cells
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <p>What is the role of DNA polymerase during replication?</p>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                A. To add new nucleotides to the growing DNA strand
                                            </label>
                                        </div>
        
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                B. To separate the two strands of DNA
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                C. To proofread and correct errors in the new DNA strand
                                            </label>
                                        </div>

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                            <label class="form-check-label" for="exampleRadios1">
                                                D. To make RNA from the DNA template
                                            </label>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <!-- drag and drop -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <p class="instruction">
                                    Drag the correct option and drop it onto the corresponding box. 
                                </p>

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
                                                <p>What is the capital of France? <input class="d-inline form-control q-input drop-option q-input" type="text"></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the smallest unit of matter? <input class="d-inline form-control q-input drop-option q-input" type="text"></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>What is the force that pulls objects toward each other? <input class="d-inline form-control q-input drop-option q-input" type="text"></p>
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
                                                <p>The <input class="d-inline form-control q-input" type="text"> is the largest organ in the human body.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p><input class="d-inline form-control q-input" type="text"> is the process by which a gas turns into a liquid.</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p>The two main components of the central nervous system are the <input class="d-inline form-control q-input" type="text"></p> and the <input class="d-inline form-control q-input" type="text">. Please answer in lowercase.
                                            </div>
                                        </div>
                                    </li>
                                </ol>

                            </div>
                        </div>

                        <!-- enumeration -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <p class="instruction">
                                    List all the correct answers
                                </p>

                                <ol class="list-group list-group-numbered p-3" type="A">
                                    <li>
                                        <p>Enumerate the colors of the rainbow.</p>
                                        <ol>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
        
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                                                </div>
        
                                                <div class="col-md-4">
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                
                                                    <li>
                                                        <p><input class="d-inline form-control q-input" type="text"></p>
                                                    </li>
                                                </div>
        
                                                <div class="col-md-4">
                                                </div>
                                            </div>
                                        </ol>
                                    </li>
                                </ol>

                            </div>
                        </div>

                        <!-- essay -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <p class="instruction">
                                    Write a well-organized and thoughtful response to the question provided. 
                                </p>

                                <ol>
                                    <li>
                                        <p>What are the potential benefits and drawbacks of using genetically modified organisms (GMOs) in agriculture?</p>
                                        <textarea class="form-control mt-2 q-input"type="text"></textarea>
                                    </li>
                                    <li>
                                        <p>How does climate change affect marine biodiversity and what can be done to mitigate its impacts?</p>
                                        <textarea class="form-control mt-2 q-input"type="text"></textarea>
                                    </li>
                                </ol>

                                

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

        // drag and drop
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

        // auto-save answer
        // Add a change event listener to each answer field
        $('.answer-field').on('change', function() {
        // Get the answer data
        var answer = $(this).val();
        var questionId = $(this).data('question-id');
        var studentId = $(this).data('student-id');
        
        // Send an AJAX request to save the answer data
        $.ajax({
            url: '/save-answer',
            method: 'POST',
            data: {
            answer: answer,
            question_id: questionId,
            student_id: studentId
            },
            success: function(response) {
            // Handle the response from the server if needed
            }
        });
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



    })
</script>


@endsection