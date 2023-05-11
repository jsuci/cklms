@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />


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
    .q-input {
        border:1px solid #b6b6b6 !important;
        border-radius:6px !important;
        width:200px !important;
    }
    .error-input {
        border-color: #dc3545 !important;
    }
    #scroll-to-bottom {
        position: fixed;
        bottom: 0px;
        right: 0px;
        padding: 9px 15px 9px 15px !important;
    }
    .list-group li {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .drop-option {
        position: relative;
        z-index: 0;
    }
    .admin-edit {
        border: 2px dotted #017df95e;
        padding: 0.5em;
    }
    .rm-coverage, .rm-answer-key, .rm-points {
        font-weight: 700;
        position: relative;
        top: -10px;
        font-size: 1.3em;
        cursor: pointer;
        color: #a91c1c;
    }
    .rm-mc-option {
        font-weight: 700;
        font-size: 1.1em;
        cursor: pointer;
        color: #a91c1c;
    }
    .rm-question {
        background-color: #e55f5f;
        border-radius: 6px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 25px;
        width: 25px;
    }
    .rm-question i {
        color: white;
    }
    @media screen and (max-width: 576px) {
        /* .card-options {
            flex-direction: row !important;
            border-top-right-radius: 3px !important;
            border-top-left-radius: 3px !important;
        } */
        .card-options {
            flex-direction: row !important;
            align-items: center;
        }
        .gfg_tooltip {
            border-radius: 3px !important;
        }
    }
    .form-control, .form-control:hover, .form-control:focus {
        border: 1px solid #ededed;
        background: #ededed;
    }
    .question-holder {
        padding-left: 0;
    }
</style>

<body>
    <div class="container quizcontent">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <!-- quiz header -->
                @foreach ($data as $row)
                <div class="row mt-5" id="quiz-header" data-id="{{ $row->id }}" data-chapter-id="{{ $row->chapterid }}">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="btn-group-vertical card-options" style="display:none">
                                    <button class="add-header btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                                        <i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>
                                    </button>
                                </div>
                            </div>
        
                            <div class="col-sm-11">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title text-edit" id="admin-quiz-title">
                                            {{ $row->title }}
                                        </h1>
                
                                        <h4>Coverage:</h4>
                                        <div class="option-edit" id="admin-quiz-coverage">
                                        </div>
                
                                        <div class="mt-3 mb-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="select-coverage select2">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12 d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="add-lesson">Add Lesson</button>
                                                </div>
                                            </div>
                                        </div>
                
                                        <p class="card-text text-edit" id="admin-quiz-desc" style="font-size:1pc">{{ $row->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- col-md-12 -->
                </div>
                @endforeach

                <!-- quiz questions -->
                <div class="row mt-3" id="quiz-questions">
                </div>


                <!-- quiz footer -->
                <div class="row mb-5 mt-3" id="quiz-footer">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="btn btn-danger btn-lg mr-2" id="delete-quiz">Delete</div>
                        <div class="btn btn-success btn-lg" id="save-quiz">Save</div>
                        
                    </div>
                </div>


                

            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->
    </div> <!-- end quizcontent -->
</body>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function() {

        // GLOBALS
        var prevQuestionType;
        var currHeaderId;
        const quizID = $('#quiz-header').data('id')
        const chapterID = $('#quiz-header').data('chapter-id')
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        // HELPER FUNC

        // others
        function textEditable(selector) {

            // Store the original text in a variable
            var originalText = $(selector).text().trim();

            // Make the element editable when clicked
            $(selector).click(function() {
                // $(selector).text('');
                $(this).attr('contenteditable', true);

            });

            // Save the updated text when the user is done editing
            $(selector).on("blur", function() {
                var updatedText = $(this).text();
                var ajaxRes;

                // Revert to the original text if the updated text is blank
                if (updatedText.trim() === '') {
                    $(this).text(originalText);
                    updatedText = originalText
                }

                // Make the element non-editable again
                $(this).attr('contenteditable', false);

                if ($(selector).attr('id') === 'admin-quiz-title') {

                    ajaxCall('/adminviewbook/editquizheader', {
                        id: quizID,
                        title: updatedText.trim()
                    }).then((data) => {
                        console.log(data)
                    })

                } else if (($(selector).attr('id') === 'admin-quiz-desc')) {
                    ajaxCall('/adminviewbook/editquizheader', {
                        id: quizID,
                        description: updatedText.trim()
                    }).then((data) => {
                        console.log(data)
                    })

                } else {
                    console.log($(selector))
                }
                
            })
        }
        function ajaxCall(url, jsonData) {
            return $.ajax({
                url: url,
                method: 'GET',
                data: jsonData
            });
        }
        function setHeaderId() {
            return Math.round(Math.random() * 1000000) + "-" + Date.now()
        }

        // html rendering
        function renderHtmlCoverage() {
            $.ajax({
                url: '/adminviewbook/getcoverage',
                method: 'GET',
                data: {
                    quizid: quizID,
                },
                success: function(data) {
                    // empty div
                    $('#admin-quiz-coverage').empty()

                    // generate buttons
                    $.each(data, function(index, value) {
                        var html = `<div class="btn bg-success text-white m-1" data-lesson-id="${value.lessonid}">${value.lessontitle}</div><span class="rm-coverage" id="${value.lessonid}">&times;</span>`;
                        
                        $(html).appendTo('#admin-quiz-coverage');
                    });

                }
            });
        }
        function renderHtmlQuestions() {

            let cardOptionHtml = `<div class="col-sm-1"><div class="btn-group-vertical card-options" style="display:none"><button class="btn btn-sm text-white gfg_tooltip newrow add-header" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span></button><button class="delete-header btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;"><i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span></button></div></div>`

            $.ajax({
                url: '/adminviewbook/getquestions',
                method: 'GET',
                data: {
                    quizid: quizID,
                },
                success: function(data) {

                    console.log(data)

                    // empty div
                    $('#quiz-questions').empty()
                    
                    if (data.length != 0) {

                        // generate buttons
                        $.each(data, function(index, value) {
                            var headerId = value.headerid
                            // var questionId = value.id
                            // var question = value.question
                            // var points = value.points
                            var questionType = value.questions[value.questions.length - 1].type
                            // var choices = value.choices
                            // var answers = value.answers

                            // if (questionType === 1) {
                            //     console.log('render multiple-choice question')
                            // }



                            var html = `
                                <div class="col-sm-12" data-header-id="${headerId}">
                                    <div class="row">
                                        ${cardOptionHtml}
                                        <div class="col-sm-11">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="col-sm-12">

                                                        <ol class="question-holder">
                                                        </ol> <!-- end ordered list -->

                                                        <div class="row d-flex align-items-center mt-5">
                                                            <div class="col-sm-12">
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" placeholder="Type your question here" aria-label="Type your question  here" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                    <button class="btn btn-primary" type="button">Add Question</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> <!-- end add question -->

                                                        <div class="row d-flex align-items-center justify-content-end">
                                                            <div class="col-sm-4">
                                                                <select class="select-question-type select2" id="${headerId}">
                                                                    <option value="1">multiple-choice</option>
                                                                    <option value="2">fill-in-the-blanks</option>
                                                                    <option value="3">enumeration</option>
                                                                    <option value="4">drag-and-drop</option>
                                                                    <option value="5">essay</option>
                                                                    <option value="6">upload-image</option>
                                                                </select>
                                                            </div>
                                                        </div> <!-- end select question type -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div>
                                </div>
                            `;
                            
                            $(html).appendTo('#quiz-questions');

                            
                            // initialize select2
                            $(`#${headerId}.select-question-type`).select2({
                                placeholder: 'Select question type',
                                width: '100%',
                                minimumResultsForSearch: Infinity,
                            })

                            // set current selection
                            $(`#${headerId}.select-question-type`).val(questionType).trigger('change');

                            // change current question type
                            prevQuestionType = questionType
                            

                        });
                    } else {

                        let emptyHtml = `<div class="col-sm-12"><div class="row">${cardOptionHtml}<div class="col-sm-11"><h4 class="text-center" style="text-transform: none">No added questions yet.</h4></div></div></div>`

                        $(emptyHtml).appendTo('#quiz-questions');
                    } 

                }
            });
        }

        // coverage
        function addCoverage(quizID, lessonid, lessontitle) {
            $.ajax({
                url: '/adminviewbook/addcoverage',
                method: 'GET',
                data: {
                    quizid: quizID,
                    lessonid: lessonid,
                    lessontitle: lessontitle
                },
                success: function(data) {
                    renderHtmlCoverage()
                }
            });
        }
        function deleteCoverage(quizID, lessonid) {
            $.ajax({
                url: '/adminviewbook/deletecoverage',
                method: 'GET',
                data: {
                    quizid: quizID,
                    lessonid: lessonid,
                },
                success: function(data) {
                    console.log(data)
                    renderHtmlCoverage()
                }
            });
        }

        // question types html render
        // function multipleChoiceHtml(jsonData) {
        //     var baseH
        // }


        // INITIALIZE CONTENTS

        // html render
        renderHtmlCoverage()
        renderHtmlQuestions()

        // coverage selection
        $('.select-coverage').select2({
            placeholder: 'Select a lesson',
            width: '100%',
            ajax: {
                url: '/adminviewbook/getlessons',
                type: 'get',
                dataType: 'json',
                data: {
                    id: chapterID
                },
                processResults: function (data) {
                    const filteredData = data.filter(item => item.type === 'l');

                    return {
                        results: $.map(filteredData, function (item) {
                            return {
                                id: item.id,
                                text: item.title
                            }
                        })
                    };
                },
            },
        });


        // EVENT LISTENERS

        // quiz header
        $('#add-lesson').on('click', function() {
            var selectedLesson = $('.select-coverage').select2('data')[0];
            var container = $('#admin-quiz-coverage');

            // Check if the new element doesn't already exist within the container
            if (!container.find(`[data-lesson-id="${selectedLesson.id}"]`).length) {
                // If it doesn't exist, add new lesson to chapterquizcoverage
                addCoverage(quizID, selectedLesson.id, selectedLesson.text)
            }

            $('.select-coverage').val('').trigger('change');
        })
        $(document).on('click', '.rm-coverage', function() {
            var lessonId = $(this).attr('id');
            deleteCoverage(quizID, lessonId)
        });


        // quiz footer
        $('#save-quiz').on('click', function() {
            var isvalid = true

            if (isvalid) {

                $('#save-quiz').prop('disabled', true);

                // Assume you have jQuery library loaded
                $.ajax({
                    url: '/adminviewbook/addquiz',
                    method: 'GET',
                    data: { // Pass query parameters here
                        quiz_title: $('#quiz-title').text().trim(),
                        quiz_desc: $('#quiz-desc').text().trim(),
                        chapter_id: 12,
                        book_id: 9,
                    },
                    success: function(response) {
                        // Handle successful response
                        // console.log(response);
                        $('#save-quiz').prop('disabled', false)
                    }
                });

                console.log('Form submitted successfully.')
                // set quiz status as finished
                // disable retake of quiz
                // show quiz complete form
            }
        })
        $('#delete-quiz').on('click', function() {
            Swal.fire({
                title: 'Are you sure you want to delete this quiz?',
                text: $(this).attr('label'),
                icon: 'warning',
                confirmButtonColor: 'rgb(211 29 29)',
                confirmButtonText: 'Delete',
                showCancelButton: true,
                allowOutsideClick: false
            }).then((confirm) => {
                if (confirm.value) {
                    $.ajax({
                        url: '/adminviewbook/deletequiz',
                        type: 'get',
                        dataType: 'json',
                        data: {
                            id: quizID
                        },
                        success: function(data){

                            Toast.fire({
                                icon: 'success',
                                title: 'Quiz deleted successfully',
                                timer: 2000,
                            }).then(() => {
                                window.close();
                            })
                        }
                    })
                }
            })
        })


        // show hide card-options
        $('#quiz-header.row.mt-5').mouseenter(function() {
            $(this).find('.card-options').fadeIn();
        });
        $('#quiz-header.row.mt-5').mouseleave(function() {
            $(this).find('.card-options').fadeOut();
        });
        $(document).on('mouseenter', '.col-sm-12', function() {
            // set globally the selected question id
            questionHeader = $(this).attr('data-header-id')

            if ($(this).attr('data-header-id')) {
                $(this).find('.card-options').fadeIn();
            }
        })
        $(document).on('mouseleave', '.col-sm-12', function() {
            if ($(this).attr('data-header-id')) {
                $(this).find('.card-options').fadeOut();
            }
        })       


        // text edit save
        textEditable('#admin-quiz-title')
        textEditable('#admin-quiz-desc')


        // card-options
        $(document).on('click', '.add-header', function() {
            currHeaderId = setHeaderId()

            $(this).prop('disabled', true)

            if (prevQuestionType) {
                // set default question type to prevQuestionType
                ajaxCall('/adminviewbook/addquestion', {
                    question: 'Edit your question here',
                    headerid: currHeaderId,
                    quizid: quizID,
                    type: prevQuestionType,
                    points: 1
                }).then((data) => {
                    renderHtmlQuestions()
                    prevQuestionType = 1
                    $(this).prop('disabled', false)
                })
            } else {
                // set default question type to multiple-choice
                ajaxCall('/adminviewbook/addquestion', {
                    question: 'Edit your question here',
                    headerid: currHeaderId,
                    quizid: quizID,
                    type: 1,
                    points: 1
                }).then((data) => {
                    renderHtmlQuestions()
                    prevQuestionType = 1
                    // $(this).prop('disabled', false)
                })
            }
        })
        $(document).on('click', '.delete-header', function() {
            $(this).prop('disabled', true)

            if (currHeaderId) {
                ajaxCall('/adminviewbook/deletequestions', {
                    headerid: currHeaderId,
                }).then((data) => {
                    renderHtmlQuestions()
                    $(this).prop('disabled', false)
                })
            }
        })

    })
</script>

{{-- <script>
    $(document).ready(function(){


        // $(document).on('click', function(event) {
        //     console.log("LAST ID:", last_id)

        //     // var addrowid = $('.form-check-label').attr('id');
        //     // console.log("form ID:", addrowid)
        //     // Check if the click event target is not inside #myDiv

        //     // last_quiz_type = last_quiz_type
        //     last_quiz_type = $('#quiztype' + last_id).val();
        //     if (!$(event.target).closest('#quiztioncontent' + last_id).length) {

        //             if(last_quiz_type == 'multiple_choice'){
        //                 const textareaValue = $('#multiplechoice' + last_id).val();
        //                 console.log("Question: ", textareaValue);
        //                 console.log("Quiztype: ", last_quiz_type);

        //                 $('.option' + last_id).each(function() {
        //                         // Get the value of the current label element using its id attribute
        //                         const value = $(this).text();
        //                         console.log(value);
        //                         });


        //                 $('#my-toast').rtoast({
        //                     content: 'This is a toast notification',
        //                     position: 'bottomLeft',
        //                     timeout: 3000
        //                     });
        //                 }
        //             if(last_quiz_type == 'short_answer'){

                
        //                 var textareaValue = $('#shortz_answer_question' + last_id).val();
        //                 console.log("Question: ", textareaValue);
        //                 console.log("Quiztype: ", last_quiz_type);
        //                 }

        //             if(last_quiz_type == 'paragraph_answer'){
        //                 var textareaValue = $('#long_answer_question' + last_id).val();
        //                 console.log("Question: ", textareaValue);
        //                 console.log("Quiztype: ", last_quiz_type);
                
        //                 }
                    
        //             if(last_quiz_type == 'enumeration'){
                
        //                 }

        //             if(last_quiz_type == 'instruction'){

        //                 var textareaValue = $('#instruction_item' + last_id).val();
        //                 console.log("Question: ", textareaValue);
        //                 console.log("Quiztype: ", last_quiz_type);
                    
        //                 }

        //             if(last_quiz_type == 'drag_drop'){
                    
        //                 }
                
            


        //     }
        // });
                    


        var click =0;
        var id;
        var last_id;
        var last_quiz_type = 'multiple_choice';
        $(document).on('click', '.editcontent', function(){
            last_id = id;
            $('.editcontent').css({
                "border-right": "3px solid white",
                "padding": "20px",

            });



            
            $(this).css({
                "border-right": "3px solid dodgerblue",
                "padding": "20px",
            });
                if(id == $(this).attr('id')){
                click+=1;
                }else{
                option = 0;
                click =0;
                }


                
                id = $(this).attr('id');
                
                $('.ui-helper-hidden-accessible').remove();
                    $('.btn-group-vertical').remove();
                    var addrowid = $(this).attr('id');
                    
                    // console.log(click)
                    $(this).closest('.row').find('.rowhidden').append(
                            '<div class="btn-group-vertical">' +
                                '<a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' + '</a>' + 
                                '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
                                '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
                                '</a>' +                                      
                            '</div>' +
                            '</div>'
                    )
            

                })

    // $(document).on('click', '.newimage', function(){
    //     $('.btn-group-vertical').remove();
    //     addrow+=1
    //     $(this).closest('.row').find('.rowhidden').empty()
    //     $('.contentcontainer').append(
    //         '<div id="'+addrow+'" class="row p-4 dragrow">' +
    //             '<div class="col-lg-1 col-2 rowhidden d-flex align-items-center">' + 
    //             '<div class="btn-group-vertical">' +
    //                 '<a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
    //                 '<i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>' +
    //                 '</a>' + 
    //                 '<a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">' +
    //                 '<i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>' +
    //                 '</a>' +                                      
    //             '</div>' +
    //             '</div>')

    // })

    var addrow = $('.contentcontainer').children('.row').length;
    $(document).on('click', '.newrow', function(){
        // console.log(addrow);
        option= 1;
        $('.btn-group-vertical').remove();
        addrow+=1;
        // console.log(addrow)
        $(this).closest('.row').find('.rowhidden').empty()
        $('.contentcontainer').append(
            `<div id="${addrow}" class="row p-4 dragrow">
                <div class="col-lg-1 col-2 rowhidden d-flex align-items-center">
                    <div class="btn-group-vertical">
                        <a class="btn btn-sm text-white gfg_tooltip" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                            <i class="fas fa-trash m-0"></i><span class="gfg_text">Delete</span>
                        </a>
                        <a class="btn btn-sm text-white gfg_tooltip newrow" style="background-color: #3175c2; border: 3px solid #1d62b7;">
                            <i class="fas fa-plus m-0"></i><span class="gfg_text">Add Question</span>
                        </a>                                     
                    </div>
                </div>
                <div id="${addrow}" class="col-lg-11 col-10 editcontent col-content">
                    <div class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-6 mr-1 quizarea">
                                <select class="form-control quiztype" id="quiztype${addrow}">
                                    <option value="multiple_choice">Multiple Choice</option>
                                    <option value="instruction">Instruction</option>
                                    <option value="short_answer">Short Answer</option>
                                    <option value="paragraph_answer">Paragraph</option>
                                    <option value="enumeration">Enumeration</option>
                                    <option value="drag_drop">Drag & Drop</option>
                                    <option value="fill_blank">Fill in the Blanks</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div id="quiztioncontent${addrow}" class="mt-4">
                                    <div class="col-12 m-2">
                                        <textarea class="form-control" placeholder="Untitled question" style="height: 20px !important;" id="multiplechoice${addrow}" ></textarea>
                                    </div>
                                    <div class="col-12 ml-4"  id="list_option${addrow}">
                                        <input class="form-check-input" type="radio" name="option1" value="1">
                                        <label class="form-check-label option${addrow}" id="option${addrow}" contenteditable="true">Option ${option}</label>
                                    </div>
                                    <button class="form-control addoption" style="margin: 20px; " id="add_option${addrow}">Add option</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`

            );

    })

    var option = 0;
    $(document).on('change', '.quiztype', function(){
        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var addrowid = $(this).attr('id');
        var select_quiz_type = $(this).val();
        last_quiz_type = select_quiz_type;
        console.log(select_quiz_type);
        console.log("Add row ID: ", addrowid)
        console.log("ID: ", parentId)
        
        
        if (select_quiz_type == 'short_answer') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2 shortz_answer_question"'+parentId+'" placeholder="Untitled question" style="height: 20px !important;" id="shortz_answer_question'+parentId+'" ></textarea>');
            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control m-2 mr-1" placeholder="Short answer text" disabled>');
        }

        if (select_quiz_type == 'multiple_choice') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append(
                `<div class="col-12 m-2">
                    <textarea class="form-control" placeholder="Untitled question" style="height: 20px !important;" id="exampleTextarea"></textarea>
                </div>
                <div class="col-12 ml-4" id="list_option${parentId}">
                    <input class="form-check-input" type="radio" name="option1" value="1">
                    <label class="form-check-label" contenteditable="true">Option ${option}</label>
                </div>
                <button class="form-control addoption" style="margin: 20px;" id="add_option${parentId}">Add option</button>`
            )
        }

        if (select_quiz_type == 'paragraph_answer') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2" placeholder="Untitled question" style="height: 20px !important;" id="long_answer_question'+parentId+'" ></textarea>');
            $('#quiztioncontent' + parentId).append('<input type="text" class="form-control m-2" placeholder="Long answer text" disabled>');
        }
        
        if (select_quiz_type == 'enumeration') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append('<textarea class="form-control m-2" placeholder="Untitled question" id="exampleTextarea" ></textarea>');
            $('#quiztioncontent' + parentId).append('<div id="item_option'+parentId+'">' + 
                '<input type="text" class="form-control m-2" placeholder="Item text" disabled>'+
                '</div>');
            $('#quiztioncontent' + parentId).append('<button class="form-control additem" style="margin: 8px; " id="add_item'+parentId+'">Add Item</button>')
        }

        if (select_quiz_type == 'instruction') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append(
                `<div class="col-12 m-2">
                    <textarea class="form-control" placeholder="Untitled instruction" style="height: 20px !important;" id="instruction_item${parentId}" ></textarea>
                </div>`
            )
        }

        if (select_quiz_type == 'drag_drop') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append(
                `<div class="options p-3 mt-2" id="options${parentId}" style="border:3px solid #3e416d;border-radius:6px;">
                    <div class="drag-option btn bg-primary text-white m-1" contentEditable="true" data-target="drag-1">Option &nbsp;${option}</div>
                </div>
                <div class="d-flex flex-column"><div class="align-self-end"><button class="btn text-white bg-success btn-success form-control add_drag_option" style="margin-top: 10px; " id="add_dragoption${parentId}">Add drag option</button></div></div>`
            )

            $('#quiztioncontent' + parentId).append(
                `<div id="item_option${parentId}" class="mt-4">
                    <ol class="list-group list-group-numbered p-3"></ol>
                    <input type="text" id="drag-drop-que" class="form-control" style="background:#d5d5d5;border:1px solid #;color:#000" placeholder="Add your question here. Use @@ to create textbox and press enter">
                </div>`
            );
            // $('#quiztioncontent' + parentId).append(
            //     `<div id="item_question${parentId}">
            //         <input type="text" class="form-control" style="margin-top: 10px; border: 2px dashed gray" placeholder="Item text &nbsp;${option}">
            //     </div>
            //     <button class="form-control add_drag_question" style="margin-top: 10px; " id="add_dragquestion${parentId}">Add drop question</button>
            //     `
            // )
        }

        if (select_quiz_type == 'fill_blank') {
            $('#quiztioncontent' + parentId).empty();
            $('#quiztioncontent' + parentId).append('<input class="form-control" placeholder="Untitled question" id="exampleTextarea" ></input>');
            $('#quiztioncontent' + parentId).append(
                `<div id="item_option${parentId}" class="mt-4">
                    <ol></ol>
                    <input type="text" id="fill-in-blank" class="form-control" style="background:#d5d5d5;border:1px solid #;color:#000" placeholder="Add your question here. Use @@ to create textbox and press enter">
                </div>`
            );
            // $('#quiztioncontent' + parentId).append('<button class="form-control add-fill-question" style="margin: 8px; " id="add_item'+parentId+'">Add Question</button>')
        }


        // $(this).closest('.row').find('.quizarea2').empty()
        // $('#' + addrow).append(content)
        // $('#' + addrow).append(button);
        

    })



    // multiple choice option
    $(document).on('click', '.addoption', function(){
        option+=1;
        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var addrowid = $(this).attr('id');
        console.log("Add row ID: ", addrowid)
        console.log("ID: ", parentId)
        
        // $(this).closest('quizarea2').find('.list_option').empty()
        $('#list_option' + parentId).append('<input class="form-check-input" type="radio" name="option1" value="1">'+
                                    '<label class="form-check-label option'+parentId+'" contenteditable="true">Option '+option+'</label>')

    })

    $(document).on('click', '.add_drag_option', function(){
        option+=1;
        // var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var parentId = $(this).parents('.dragrow').attr('id')
        var addrowid = $(this).attr('id');
        console.log("Add row ID: ", addrowid)
        console.log("ID: ", parentId)
        
        // $(this).closest('quizarea2').find('.list_option').empty()
        $('#options' + parentId).append('<div class="drag-option btn bg-primary text-white m-1" contentEditable="true" data-target="drag-1">Option &nbsp;'+option+'</div>')

    })

    $(document).on('click', '.add_drag_question', function(){
        option+=1;
        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var addrowid = $(this).attr('id');
        console.log("Add row ID: ", addrowid)
        console.log("ID: ", parentId)
        
        // $(this).closest('quizarea2').find('.list_option').empty()
        $('#item_question' + parentId).append('<input type="text" class="form-control" style="margin-top: 10px; border:  2px dashed gray" placeholder="Item text &nbsp;'+option+'">')

    })

    $(document).on('click', '.additem', function(){
        option+=1;
        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var addrowid = $(this).attr('id');
        console.log("Add row ID: ", addrowid)
        console.log("ID: ", parentId)
        
        // $(this).closest('quizarea2').find('.list_option').empty()
        $('#item_option' + parentId).append('<input type="text" class="form-control m-2" placeholder="Item text" disabled>')
    })

    $(document).on('click', '.add-fill-question', function() {
        option+=1;
        var parentId = $(this).parent().parent().parent().parent().parent().attr("id");
        var addrowid = $(this).attr('id');

        
        // $(this).closest('quizarea2').find('.list_option').empty()
        $('#item_option' + parentId).append('<input type="text" id="fill-in-blank" class="form-control m-2" placeholder="Item text">')
    })

    $(document).on('change', '#fill-in-blank', function() {
        var $parent = $(this).closest('div');
        var $olList = $parent.find('ol');

        if ($(this).val().indexOf("@@") !== -1) {
            var newText = $(this).val().replace(/@@/gi, `<input data-header-id="14" class="answer-field d-inline form-control q-input" type="text">`);

            $olList.append(`<li>${newText}</li>`)

            $(this).val('')
        }
    })

    $(document).on('change', '#drag-drop-que', function() {
        var $parent = $(this).closest('div');
        var $olList = $parent.find('ol');

        if ($(this).val().indexOf("@@") !== -1) {
            var newText = $(this).val().replace(/@@/gi, `<input data-header-id="14" class="answer-field d-inline form-control q-input drop-option" type="text" disabled>`);

            $olList.append(`<li>${newText}</li>`)

            $(this).val('')
        } else {
            $olList.append(`<li>${$(this).val()}</li>`)

            $(this).val('')
        }
    })

    // $('#fill-in-blank').on('click', function() {
    //     console.log('hello world')
    // })


    });


</script> --}}


@endsection