@extends('teacher.layouts.app')

@section('content')
<style>
    .points {
        width: 60px;
        height: 60px;
        background-color: #4d4d99;
        border-radius: 50%;
        position: relative;
        top: -50px;
        left: -50px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        padding: 0;
        margin: 0;
        font-size: 15pt;
        font-weight: 600;
    }

    .circle-points {
        position: relative;
        top: -50px;
        left: -50px;
        z-index: 9;
    }

    .menu_opener {
        display: none !important;
    }

    .menu_opener_label {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size:15pt;
        cursor: pointer;
        color: #000;
        background: rgb(247 103 0);
    }

    .menu_opener:checked ~ .link_one { 
        top: 65px;
    }
    .menu_opener:checked ~ .link_two {
        left: -65px;
    }
    .menu_opener:checked ~ .link_three {
        top: -65px;
    }

    .menu_opener:checked ~ .link_four {
        left: 65px;
    }

    .link_general {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: 600;
        font-size:15pt;
        /* background: #4d4d99; */
        background: #606060;
        color: #fff;
        cursor: pointer;
    }

    .link_one, .link_two,
    .link_three, .link_four {
        -webkit-transition: all 0.4s ease;
        transition: all 0.4s ease;
        position: absolute;
        top: 1px;
        left: 1px;
        z-index: -1;
    }

    
</style>

<div class="container quizcontent" style="background-color: #fff !important;">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Student Information -->
            <div class="card mt-5 ml-3" style="background:#fff2c4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Checking Quiz</h1>
                            <h5>Student Name: {{$studinfo}}</h5>
                            <h5 class="pscore"></h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card mt-5 ml-3 editcontents" data-quizid="{{$quizInfo->id}}" id="quiz-info">
                <div class="card-body" data-headerid="{{$headerid}}" id="headerid">
                    <h1 class="card-title">
                        {{$quizInfo->title}}
                    </h1>
                    <div class="lessons pb-4">
                        <h4>Coverage: </h4>
                        @if(!empty($quizInfo->coverage))
                            @php
                                $lessons = explode(", ", $quizInfo->coverage);
                            @endphp
                            @foreach ($lessons as $lesson)
                                <div class="btn bg-primary text-white m-1">{{$lesson}}</div>
                            @endforeach
                        @endif
                    </div>
                    <p class="card-text">{{$quizInfo->description}}</p>
                </div>
            </div>

            @foreach($quizQuestions as $key=>$item)
                @if($item->typeofquiz == 1)
                    <!-- multiple choice -->
                    <div class="card mt-5 ml-3 editcontent" id="quiz-question-{{$item->id}}">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        @if(isset($item->check) == 1)
                                            1
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                            </div>

                            

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            @foreach ($item->choices as $questioninfo)
                                <div class="form-check mt-2">
                                    @if($questioninfo->id == $item->answer)
                                        
                                        <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}" checked>
                                        
                                    @else
                                        <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}">
                                    @endif
                                    <label for="{{$item->id}}" class="form-check-label">
                                        {{$questioninfo->description}}
                                    @if(isset($item->check) == 1 && $questioninfo->id == $item->answer)
                                        <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                    @endif
                                    @if(isset($item->check) == 0 && $questioninfo->id == $item->answer)
                                        <span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>
                                    @endif
                                
                                    
                                    
                                    </label>
                                    
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 2)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="circle-points" >
                                <input type="checkbox" id="menu_opener_id_{{$item->id}}" class="menu_opener">
                                <label for="menu_opener_id_{{$item->id}}" data-points-edit="{{$item->id}}" class="menu_opener_label student-score">0</label>

                                <div class="link_one" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        1
                                    </div>
                                </div>

                                <div class="link_two" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        3
                                    </div>
                                </div>

                                <div class="link_three" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        5
                                    </div>
                                </div>

                                <div class="link_four" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <input type="text" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" placeholder="Answer here" value="{{$item->answer}}">
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 3)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="circle-points" >
                                <input type="checkbox" id="menu_opener_id_{{$item->id}}" class="menu_opener">
                                <label for="menu_opener_id_{{$item->id}}" data-points-edit="{{$item->id}}" class="menu_opener_label student-score">0</label>

                                <div class="link_one" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        1
                                    </div>
                                </div>

                                <div class="link_two" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        3
                                    </div>
                                </div>

                                <div class="link_three" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        5
                                    </div>
                                </div>

                                <div class="link_four" data-question-id="{{$item->id}}">
                                    <div class="link_general">
                                        <i class="fa fa-plus"></i>
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                {{$key+=1}}. {{$item->question}}
                            </p>
                            <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" type="text" value="{{$item->answer}}">{{$item->answer}}</textarea>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 4)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">
                            <p>Instruction. {!! $item->question !!}</p>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 5)
                    <!-- drag and drop -->
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        {{$item->score}}
                                    </div>
                                </div>
                            </div>

                            <p class="question" data-question-type="{{$item->typeofquiz}}">
                                Drag the correct option and drop it onto the corresponding box.
                            </p>
                            <div class="options p-3 mt-2" style="border:3px solid #3e416d;border-radius:6px;">
                                @foreach ($item->drag as $questioninfo)
                                    <div class="drag-option btn bg-primary text-white m-1" data-target="drag-1">{{$questioninfo->description}}</div>
                                @endforeach
                            </div>
                            @foreach($item->drop as $items)
                                <p>
                                    {{$items->sortid}}. {!! $items->question !!}
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 6)
                    <!-- upload image -->
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">
                            <p>{!! $item->question !!}</p>
                            <div class="form-group">
                                <input class="answer-field form-control-file imageInput" data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" type="file" accept="image/*">
                                @if($item->picurl != '')
                                    <a id="preview-link" href="{{$item->picurl}}" target="_blank">
                                        <img id="preview" src="{{$item->picurl}}" alt="Preview" style="max-width: 250px; max-height: 250px;">
                                    </a>
                                @else
                                    <a id="preview-link" href="#" target="_blank">
                                        <img id="preview" src="#" alt="Preview" style="max-width: 250px; max-height: 250px;display:none;">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 7)
                    <div class="card mt-5 ml-3 editcontent">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="points student-score">
                                        {{$item->score}}
                                    </div>
                                </div>
                            </div>

                            <span style="font-weight:600;font-size:1.0pc">
                                Fill in the blanks
                            </span>
    
                            @foreach($item->fill as $items)
                                    <p>
                                        {{$items->sortid}}. {!! $items->question !!}
    
                                    </p>
                            @endforeach
    
                        </div>
                    </div>
                @endif

                @if($item->typeofquiz == 8)
                        <div class="card mt-5 ml-3 editcontent">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="points student-score">
                                            {{$item->score}}
                                        </div>
                                    </div>
                                </div>

                                <span style="font-weight:600;font-size:1.0pc">
                                    Enumeration
                                </span>
        
                                <ol class="list-group list-group-numbered p-3" type="A">
                                    <li>
                                        <p>{{$item->question}}</p>
                                    <ol>
        
                                    @php
            
                                        $numberOfTimes = $item->item
            
                                    @endphp
                                    
                                    @for ($i = 0; $i < $numberOfTimes; $i++)
            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <li>
                                                <div class="input-group mt-2">
                                                    <input data-question-id="{{ $item->id }}" data-sortid="{{ $i+1 }}" data-question-type="8" class="answer-field d-inline form-control q-input" value="{{$item->answer[$i]}}" type="text">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                        @if($item->check[$i] == 1)
                                                            <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                                        @endif
                                                        
                                                        @if($item->check[$i] == 0)
                                                            <span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                @endfor
                                
                                </ol>
                                </li>
                            </ol>
                                
        
                            </div>
                        </div>
                    @endif


            @endforeach

            <div class="save mb-5">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <div class="btn btn-success btn-lg" data-id="{{$headerid}}" id="save-quiz-score">Save</div>
                    </div>
                </div>
            </div>

            <button id="scroll-to-bottom" class="btn btn-dark btn-lg mb-3 mr-3" style="position: fixed; bottom: 0px; left: 10px; padding: 9px 15px 9px 15px !important;">
                <i class="fas fa-arrow-circle-down"></i>
            </button>
        </div>
    </div>
</div>

<script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
    $(document).ready(function() {

        // globals
        var questionId;
        var Toast = Swal.mixin({
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

        // helper functions
        function calcScore() {
            var totalScore = 0;

            $('.student-score').each(function() {
                var score = parseInt($(this).text())

                if (!isNaN(score)) {
                    totalScore += score;
                }
            })
            // console.log(totalScore)
            $('.pscore').text(`Score: ${totalScore}`)

            // ajax call to save score to chapterquizrecords
            return $.ajax({
                type:'GET',
                url: '/updatescore',
                data: {
                    recordid: {{$headerid}},
                    score: totalScore
                }
            })
        }

        function setScore(element) {
            var score = element.find('.link_general').text().trim();
            questionId = element.data('question-id');
            

            // hide the menu
            $(`input#menu_opener_id_${questionId}`).prop('checked', false);

            // change background color
            // $(`label[for=menu_opener_id_${questionId}]`).css('background-color', '#4d4d99');
            // $(`label[for=menu_opener_id_${questionId}]`).css('color', '#fff');
            $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(247 103 0)');
            $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');

            // set the label text
            $(`label[for=menu_opener_id_${questionId}]`).text(score);

            // recalculate and save score
            calcScore().then((data) => {
                if (data == 1) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Score updated successfully',
                        timer: 2000,
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Error updating score',
                        timer: 2000,
                    })
                }
            })

        }

        // initial state
        calcScore()
        $('input').prop("disabled", true);
        $('textarea').prop("disabled", true);
        $('input.menu_opener').prop("disabled", false);
        
        // user clicks on the + on circle menu
        $(document).on('click', '.link_four', function() {
            questionId = $(this).data('question-id');

            // hide the menu
            $(`input#menu_opener_id_${questionId}`).prop('checked', false);

            // disable input
            $(`input#menu_opener_id_${questionId}`).prop("disabled", true);

            // make label editable
            $(`label[for=menu_opener_id_${questionId}]`).attr('contenteditable', true)

            // make edit text distinction
            $(`label[for=menu_opener_id_${questionId}]`).html(`&nbsp`);

            
            // change background
            $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(255 200 160)');
            $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');

            // focus on the editable area
            $(`label[for=menu_opener_id_${questionId}]`).focus();
        })

        // user types on the circle menu
        $(document).on('blur', `.menu_opener_label`, function() {
            var pointsIdEdit = $(this).data('points-edit')
            var updatedText = $(this).text().trim()

            // filter text
            if (updatedText === '') {
                updatedText = '0';
                // change background color
                $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(247 103 0)');
                $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');
            } else if (isNaN(updatedText)) {
                updatedText = '0';
                // change background color
                $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(247 103 0)');
                $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');

                Swal.fire({
                    title: 'Please enter numbers between 1 - 10 only',
                    text: $(this).attr('label'),
                    icon: 'warning',
                    showCancelButton: false,
                    allowOutsideClick: true
                })

            } else {
                var number = parseInt(updatedText);
                if (number > 10) {

                    Swal.fire({
                        title: `Maximum allowable points for this question is ${10}`,
                        text: $(this).attr('label'),
                        icon: 'warning',
                        showCancelButton: false,
                        allowOutsideClick: true
                    })

                    updatedText = '0';
                    
                    // change background color
                    $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(247 103 0)');
                    $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');
                } else {
                    // if everything is correct

                    // change background color
                    // $(`label[for=menu_opener_id_${questionId}]`).css('background-color', '#4d4d99');
                    // $(`label[for=menu_opener_id_${questionId}]`).css('color', '#fff');
                    $(`label[for=menu_opener_id_${questionId}]`).css('background-color', 'rgb(247 103 0)');
                    $(`label[for=menu_opener_id_${questionId}]`).css('color', '#000');


                    // recalculate and save score
                    calcScore().then((data) => {
                        if (data == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Score updated successfully',
                                timer: 2000,
                            })
                        } else {
                            Toast.fire({
                                icon: 'success',
                                title: 'Error updating score',
                                timer: 2000,
                            })
                        }
                    })
                } // end if (number > 10)

            } // end if (updatedText === '')

            // change the text inside label
            $(this).text(updatedText)
            
            // reset back to original state of circle menu
            $(`input#menu_opener_id_${questionId}`).prop("disabled", false);
            $(`label[for=menu_opener_id_${questionId}]`).attr('contenteditable', false)


        })

        // user clicks on the numbers on the circle menu
        $(document).on('click', `.link_one, .link_two, .link_three`, function() {
            setScore($(this))
        })

        // save quiz score
        $(document).on('click', '#save-quiz-score', function() {
            Swal.fire({
                title: 'Are you done reviewing this quiz?',
                text: $(this).attr('label'),
                icon: 'warning',
                confirmButtonColor: 'rgb(15 151 19)',
                confirmButtonText: 'OK',
                showCancelButton: true,
                allowOutsideClick: false
            }).then((value) => {
                if (value.value) {
                    calcScore().then((data) => {
                        if (data == 1) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Score updated successfully',
                                timer: 2000,
                            })
                        }
                    })
                }
            })
        })

    })
</script>
@endsection

