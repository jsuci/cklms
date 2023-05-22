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
    }
    .points h4 {
        color: #fff;
        padding: 0;
        margin: 0;
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
                                        <div class="points">
                                            @if($item->check == 1)
                                                <h4>1</h4>
                                            @else
                                                <h4>0</h4>
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
                                        @if($item->check == 1 && $questioninfo->id == $item->answer)
                                            <span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span>
                                        @endif
                                        @if($item->check == 0 && $questioninfo->id == $item->answer)
                                            <span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span>
                                        @endif
                                            {{-- <span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span> --}}
                                        
                                        
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
                                    <label for="menu_opener_id_{{$item->id}}" data-points-edit="{{$item->id}}" class="menu_opener_label">0</label>
    
                                    <div class="link_one">
                                        <div class="link_general">
                                            1
                                        </div>
                                    </div>
    
                                    <div class="link_two">
                                        <div class="link_general">
                                            3
                                        </div>
                                    </div>
    
                                    <div class="link_three">
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
                                        <div class="points">
                                            <h4>{{$item->score}}</h4>
                                            {{-- @if($item->check == 1)
                                                <h4><span><i class="fa fa-check" style="color:rgb(7, 255, 7)" aria-hidden="true"></i></span></h4>
                                            @else
                                                <h4><span><i class="fa fa-times" style="color: red;" aria-hidden="true"></i></span></h4>
                                            @endif --}}
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
                                        <div class="points">
                                            <h4>{{$item->score}}</h4>
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
                                            <p><input data-question-id="{{ $item->id }}" data-sortid={{ $i+1 }} data-question-type="8" class="answer-field d-inline form-control q-input" value="{{$item->answer[$i]}}" type="text"></p>
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
                            <div class="btn btn-success btn-lg" data-id="{{$headerid}}" id="save-quiz">Save</div>
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

                $('.points').each(function() {
                    var score = parseInt($(this).find('h4').text())
                    if (!isNaN(score)) {
                        totalScore += score;
                    }
                })
                // console.log(totalScore)
                $('.pscore').text(`Score: ${totalScore}`)
            }


            // initial state
            calcScore()
            $('input').prop("disabled", true);
            $('textarea').prop("disabled", true);
            $('input.menu_opener').prop("disabled", false);
            

            // clicking + on circle menu
            $(document).on('click', '.link_four', function() {
                questionId = $(this).data('question-id');

                // hide the menu
                $(`input#menu_opener_id_${questionId}`).prop('checked', false);

                // disable input
                $(`input#menu_opener_id_${questionId}`).prop("disabled", true);

                // make label editable
                $(`label[for=menu_opener_id_${questionId}]`).attr('contenteditable', true)

                // make edit text distinction
                // $(`label[for=menu_opener_id_${questionId}]`).html(`&nbsp`);
                $(`label[for=menu_opener_id_${questionId}]`).html(`&nbsp`);


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
                } else if (isNaN(updatedText)) {
                    updatedText = '0';
                } else {
                    var number = parseInt(updatedText);
                    if (number > 10) {

                        Toast.fire({
                            icon: 'error',
                            title: 'Maximum points limit reached',
                            timer: 2000,
                        })

                        updatedText = '0';
                    }
                }

                // change the text inside label
                $(this).text(updatedText)

                // reset back to original state of circle menu
                $(`input#menu_opener_id_${questionId}`).prop("disabled", false);
                $(`label[for=menu_opener_id_${questionId}]`).attr('contenteditable', false)

                


            })



        })
    </script>
@endsection

