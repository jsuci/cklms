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

    ul.circle-points {
        list-style-type: none;
        margin: 0;
        padding: 0;
        position: relative;
        display: inline-block;
        width: 200px; /* $size*2 */
        height: 200px; /* $size*2 */
        transform: scale(0.2);
        transition: 0.3s ease-out all;
        top: -120px;
        left: -120px;
    }

    ul.circle-points li {
        position: absolute;
        width: 100px; /* $size */
        height: 100px; /* $size */
        transform-origin: 100% 100%;
        overflow: hidden;
        display: none;
    }

    ul.circle-points li a {
        color: #FFB2C2; /* lighten($bgcolor, 20%) */
        display: block;
        width: 200px; /* $size*2 */
        height: 200px; /* $size*2 */
        border-radius: 50%;
        text-align: center;
        background: #F6717F; /* $bgcolor */
        font-size: 25px;
    }

    ul.circle-points li:nth-child(odd) a {
        background: #FFDFE6; /* lighten($bgcolor, 2%) */
    }

    ul.circle-points li:nth-child(1) {
        display: block;
        transform: rotate(60deg) skew(30deg);
    }

    ul.circle-points li:nth-child(1) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-60deg);
    }

    ul.circle-points li:nth-child(2) {
        display: block;
        transform: rotate(120deg) skew(30deg);
    }

    ul.circle-points li:nth-child(2) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-120deg);
    }

    ul.circle-points li:nth-child(3) {
        display: block;
        transform: rotate(180deg) skew(30deg);
    }

    ul.circle-points li:nth-child(3) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-180deg);
    }

    ul.circle-points li:nth-child(4) {
        display: block;
        transform: rotate(240deg) skew(30deg);
    }

    ul.circle-points li:nth-child(4) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-240deg);
    }

    ul.circle-points li:nth-child(5) {
        display: block;
        transform: rotate(300deg) skew(30deg);
    }

    ul.circle-points li:nth-child(5) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-300deg);
    }

    ul.circle-points li:nth-child(6) {
        display: block;
        transform: rotate(360deg) skew(30deg);
    }

    ul.circle-points li:nth-child(6) a {
        line-height: 50px; /* $size/2 */
        transform: skew(-30deg) rotate(-360deg);
    }

    ul.circle-points li.close {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        position: absolute;
        left: calc(50% - 25px);
        top: calc(50% - 25px);
        display: block;
        transform: scale(3.8) rotate(45deg);
        transition: 0.3s ease-in-out all;
        transform-origin: 50% 50%;
    }

    ul.circle-points li.close a {
        background: none;
        width: 50px;
        height: 50px;
        line-height: 50px;
        color: #ccc;
    }

    ul.circle-points.active {
        transform: scale(1);
    }

    ul.circle-points.active li.close {
        transform: rotate(0deg);
    }

</style>
    
    <div class="container quizcontent" style="background-color: #fff !important;">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- Student Information -->
                <div class="card mt-5" style="background:#fff2c4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Checking Quiz</h1>
                                <h5>Student Name: {{'RYZA CENNON'}}</h5>
                                <h5>Score: {{'10 / 50'}}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 editcontents" data-quizid="{{$quizInfo->id}}" id="quiz-info">
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
                        <div class="card mt-5 editcontent" id="quiz-question-{{$item->id}}">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="points">
                                            @if($item->check == 1)
                                                <h4><span>{{$item->points}}</span></h4>
                                            @else
                                                <h4><span>0</span></h4>
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
                                            @if($item->check == 0)
                                                <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}" checked>
                                                <label for="{{$item->id}}" class="form-check-label">
                                                    {{$questioninfo->description}} <i class="fa fa-times" style="color: red;" aria-hidden="true"></i>
                                                </label>
                                            @else
                                                <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}" checked>
                                                <label for="{{$item->id}}" class="form-check-label">
                                                    {{$questioninfo->description}}
                                                </label>
                                            @endif

                                        @else
                                            <input data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-check-input" type="radio" name="{{$item->id}}" value="{{$questioninfo->id}}">
                                            <label for="{{$item->id}}" class="form-check-label">
                                                {{$questioninfo->description}}</i>
                                            </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($item->typeofquiz == 2)
                        <div class="card mt-5 editcontent">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">

                                        <ul class="circle-points">
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-home"></i>
                                            </a>
                                            </li>
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-gears"></i>
                                            </a>
                                            </li>
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-users"></i>
                                            </a>
                                            </li>
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-sitemap"></i>
                                            </a>
                                            </li>
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-tags"></i>
                                            </a>
                                            </li>
                                            <li>
                                            <a href="#">
                                                <i class="fa fa-gamepad"></i>
                                            </a>
                                            </li>
                                            <li class="close">
                                            <a href="#">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            </li>
                                        </ul>

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
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
                                <p class="question" data-question-type="{{$item->typeofquiz}}">
                                    {{$key+=1}}. {{$item->question}}
                                </p>
                                <textarea data-question-type="{{$item->typeofquiz}}" data-question-id="{{$item->id}}" id="{{$questioninfo->id}}" class="answer-field form-control mt-2" type="text" value="{{$item->answer}}">{{$item->answer}}</textarea>
                            </div>
                        </div>
                    @endif

                    @if($item->typeofquiz == 4)
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
                                <p>Instruction. {!! $item->question !!}</p>
                            </div>
                        </div>
                    @endif

                    @if($item->typeofquiz == 5)
                        <!-- drag and drop -->
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
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
                        <div class="card mt-5 editcontent">
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
                        <div class="card mt-5 editcontent">
                            <div class="card-body">
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
                        <div class="card mt-5 editcontent">
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
            $('input').prop("disabled", true);
            $('textarea').prop("disabled", true);

            $('.close').click(function(event){
                event.preventDefault();
                $('.circle-points').toggleClass('active');
            })
        })
    </script>
@endsection

