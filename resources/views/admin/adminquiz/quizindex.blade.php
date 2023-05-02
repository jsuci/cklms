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
                                        <input data-question-id="1" id="1" class="answer-field form-check-input" type="radio" name="enzyme" value="Ligase">
                                        <label for="1" class="form-check-label">
                                            Ligase
                                        </label>
                                    </div>
    
                                    <div class="form-check mt-2">
                                        <input data-question-id="1" id="2" class="answer-field form-check-input" type="radio" name="enzyme" value="Primase">
                                        <label for="2" class="form-check-label">
                                            Primase
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <p>Which of the following is true about DNA replication?</p>
                                    <div class="form-check mt-2">
                                        <input data-question-id="2" id="3" class="answer-field form-check-input" type="radio" name="dna" value="It occurs only during cell division">
                                        <label for="3" class="form-check-label">
                                            It occurs only during cell division
                                        </label>
                                    </div>
    
                                    <div class="form-check mt-2">
                                        <input data-question-id="2" id="4" class="answer-field form-check-input" type="radio" name="dna" value="It occurs constantly throughout the cell cycle">
                                        <label for="4" class="form-check-label">
                                            It occurs constantly throughout the cell cycle
                                        </label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input data-question-id="2" id="5" class="answer-field form-check-input" type="radio" name="dna" value="It occurs only in certain types of cells">
                                        <label for="5" class="form-check-label">
                                            It occurs only in certain types of cells
                                        </label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input data-question-id="2" id="6" class="answer-field form-check-input" type="radio" name="dna" value="It occurs only in prokaryotic cells">
                                        <label for="6" class="form-check-label">
                                            It occurs only in prokaryotic cells
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <p>What is the role of DNA polymerase during replication?</p>
                                    <div class="form-check mt-2">
                                        <input data-question-id="3" id="7" class="answer-field form-check-input" type="radio" name="poly" value="To add new nucleotides to the growing DNA strand">
                                        <label for="7" class="form-check-label">
                                            To add new nucleotides to the growing DNA strand
                                        </label>
                                    </div>
    
                                    <div class="form-check mt-2">
                                        <input data-question-id="3" id="8" class="answer-field form-check-input" type="radio" name="poly" value="To separate the two strands of DNA">
                                        <label for="8" class="form-check-label">
                                            To separate the two strands of DNA
                                        </label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input data-question-id="3" id="9" class="answer-field form-check-input" type="radio" name="poly" value="To proofread and correct errors in the new DNA strand">
                                        <label for="9" class="form-check-label">
                                            To proofread and correct errors in the new DNA strand
                                        </label>
                                    </div>

                                    <div class="form-check mt-2">
                                        <input data-question-id="3" id="10" class="answer-field form-check-input" type="radio" name="poly" value="To make RNA from the DNA template">
                                        <label for="10" class="form-check-label">
                                            To make RNA from the DNA template
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
                                            <p>What is the capital of France? <input data-question-id="11" class="answer-field d-inline form-control q-input drop-option q-input" type="text" disabled></p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <p>What is the smallest unit of matter? <input data-question-id="12" class="answer-field d-inline form-control q-input drop-option q-input" type="text" disabled></p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <p>What is the force that pulls objects toward each other? <input data-question-id="13" class="answer-field d-inline form-control q-input drop-option q-input" type="text" disabled></p>
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
                                            <p>The <input data-question-id="14" class="answer-field d-inline form-control q-input" type="text"> is the largest organ in the human body.</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <p><input data-question-id="15" class="answer-field d-inline form-control q-input" type="text"> is the process by which a gas turns into a liquid.</p>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <p>The two main components of the central nervous system are the <input data-question-id="16" class="answer-field d-inline form-control q-input" type="text"></p> and the <input data-question-id="16" class="answer-field d-inline form-control q-input" type="text">. Please answer in lowercase.
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
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
    
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
                                            </div>
    
                                            <div class="col-md-4">
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
                                                </li>
            
                                                <li>
                                                    <p><input data-question-id="18" class="answer-field d-inline form-control q-input" type="text"></p>
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
                                    <textarea data-question-id="25" class="answer-field form-control mt-2"type="text"></textarea>
                                </li>
                                <li>
                                    <p>How does climate change affect marine biodiversity and what can be done to mitigate its impacts?</p>
                                    <textarea data-question-id="26" class="answer-field form-control mt-2"type="text"></textarea>
                                </li>
                            </ol>

                        </div>
                    </div>


                    <!-- upload image -->
                    <div class="card mt-5">
                        <div class="card-body">
                            <p class="instruction">
                                Follow the steps below and upload a screenshot of your work.
                            </p>

                            <ol>
                                <li>
                                    <p>Click on the Windows Start Menu (located in the bottom left-hand corner of your screen).</p>
                                </li>
                                <li>
                                    <p>Scroll through the list of installed applications until you find Adobe Photoshop. Click on Photoshop to launch the program.</p>
                                </li>
                                <li>
                                    <p>Wait for Photoshop to load. It may take a few seconds to launch, especially if you have a slower computer.</p>
                                </li>
                            </ol>

                            <div class="mt-4">
                                <input data-question-id="27" class="answer-field form-control" style="height:100%;" type="file" id="formFile" accept="image/*">
                            </div>
                            
                        </div>
                    </div>

                </div>

                <div class="save mb-5">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="btn btn-success btn-lg" id="save-quiz">Save</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end main row -->
    </div> <!-- end container quizcontent -->
</body>


<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

<script>

    $(document).ready(function(){

        var STUDENT_ID = 2;

        function autoSaveAnswer(thisElement) {
            // Get the answer data
            var answer = $(thisElement).val();
            var questionId = $(thisElement).data('question-id');
            var studentId = STUDENT_ID

            console.log(`student answer: ${answer}, question-id: ${questionId}, student-id: ${STUDENT_ID}`)
            
            // // Send an AJAX request to save the answer data
            // $.ajax({
            //     url: '/save-answer',
            //     method: 'POST',
            //     data: {
            //     answer: answer,
            //     question_id: questionId,
            //     student_id: studentId
            //     },
            //     success: function(response) {
            //     // Handle the response from the server if needed
            //     }
            // });
        }

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

                // auto save answer
                autoSaveAnswer(dropElement)
            }
        });

        // select choice by clicking label
        $("label").click(function() {
            var radioBtnId = $(this).attr("for");
            var inputElement = $(`input.answer-field[id='${radioBtnId}']`);
            inputElement.prop("checked", true)
            autoSaveAnswer(inputElement)
        });

        // auto save answer when switching to 
        $('.answer-field').on('change', function() {
            autoSaveAnswer(this);
        });

        // save all answers quiz
        $('#save-quiz').on('click', function() {
            var isvalid = true

            $('.answer-field').each(function() {
                $(this).removeClass('is-invalid')

                if ($(this).val() == "" ) {
                    $(this).focus();
                    $(this).addClass('is-invalid')
                    isvalid = false
                }


                if ($(this).is(":disabled")) {
                    
                }
                
                if ($(this).is(":radio")) {
                    if (!$("input[name='" + $(this).attr("name") + "']:checked").length) {

                        $(this).focus();
                        $(this).addClass('is-invalid')

                        isValid = false;
                    }
                }


            })

            if (isvalid) {
                console.log('Form submitted successfully.')
            }
        })
    })
</script>


@endsection