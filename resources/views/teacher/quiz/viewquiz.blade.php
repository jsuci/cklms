@extends('teacher.layouts.app')

@section('breadcrumbs')

    <nav id="breadcrumbs">
        <ul>
            <li><a href="/home"> Dashboard </a></li>
            <li><a href="/teacherclassrooms?blade=blade"> Classrooms </a></li>
            <li>Quiz</li>
        </ul>
    </nav>

@endsection


@section('content')


<!-- Styles -->
<style>
    .allowed-students li {
        margin-top: 1em;
    }
    .modal-content {
        overflow:hidden;
        border: 0px solid rgba(0, 0, 0, 0.2) !important;
    }
</style>


<!-- Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Active Quiz</span>
                        <div>
                            {{-- <button class="btn btn-sm btn-default mr-2" type="button" data-toggle="collapse" data-target="#quizTable2" aria-expanded="false" aria-controls="quizTable2"><i class="fa fa-plus text-white"></i></button> --}}
                            <button class="btn btn-sm btn-default refresh_table">Refresh</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div id="quizTable2">
                        <table id="quizDataTable2" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Quiz Title</th>
                                    <th>Date start</th>
                                    <th>Time start</th>
                                    <th>Date end</th>
                                    <th>Time end</th>
                                    <th>Attempts</th>
                                    <th>Activated on</th>
                                    <th>Response</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid classroom" data-id="{{$classroomid}}">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Quiz Table</span>
                        <div>
                            <button class="btn btn-sm btn-default mr-2" type="button" data-toggle="collapse" data-target="#quizTable" aria-expanded="false" aria-controls="quizTable"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="collapse" id="quizTable">
                        <table id="quizDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Chapter</th>
                                    <th>Lesson</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Allowed Students</th>
                                    <th>Activation</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($quizzes as $quiz)
                            <tr>
                                <td>{{ $quiz->chapter }}</td>
                                <td>{{ $quiz->coverage }}</td>
                                <td>{{ $quiz->title }}</td>
                                <td>{{ strip_tags($quiz->description) }}</td>
                                <td>
                                    <ul class="allowed-students" data-id="{{ $quiz->id }}">
                                        @if (!empty($quiz->allowed_students))
                                            @foreach ($quiz->allowed_students as $student)
                                                <li data-allowed-student="{{ $student->id }}">{{ $student->name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>                                    
                                </td>
                                <td>
                                    @if (is_null($quiz->isactivated))
                                        <button type="button" class="btn btn-success" data-id="{{ $quiz->id }}" id="activate-quiz">
                                            Activate
                                        </button>
                                    @elseif ($quiz->isactivated == 0)
                                        <button type="button" class="btn btn-warning" data-id="{{ $quiz->id }}" id="ongoing-quiz">
                                            Ongoing
                                        </button>
                                    @elseif ($quiz->isactivated == 1)
                                        <button type="button" class="btn btn-primary" data-id="{{ $quiz->id }}" id="reactivate-quiz">
                                            Reactivate
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modals -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Responses</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date &amp; Time Submitted</th>
                <th>No. of Attempts</th>
                <th>Score</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="quizResponseDetails">
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="activateQuizModal" tabindex="-1" aria-labelledby="quizModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="activateQuizModalLabel" style="color:white" >Activate Quiz</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="was-validated">
                <div class="form-group">
                    <label for="attempts">Select Students</label>
                    <select id="select-students" class="select-students select2" name="students[]" multiple="multiple">
                    </select>
                </div>
                <div class="form-group">
                    <label for="dateFrom">Date From</label>
                    <input type="date" class="form-control" id="date-from" name="dateFrom" required>
                </div>
                <div class="form-group">
                    <label for="timeFrom">Time From</label>
                    <input type="time" class="form-control" id="time-from" name="timeFrom" required>
                </div>
                <div class="form-group">
                    <label for="dateTo">Date To</label>
                    <input type="date" class="form-control" id="date-to" name="dateTo" required>
                </div>
                <div class="form-group">
                    <label for="timeTo">Time To</label>
                    <input type="time" class="form-control" id="time-to" name="timeTo" required>
                </div>
                <div class="form-group">
                    <label for="attempts">Number of Attempts</label>
                    <input type="number" class="form-control" id="attempts" name="attempts" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success activate">Save</button>
        </div>
        </div>
    </div>
</div>

@endsection

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('templatefiles/framework.js')}}"></script>
<script src="{{asset('templatefiles/jquery-3.3.1.min.js')}}"></script>

<script src="{{asset('templatefiles/chart.min.js')}}"></script>
<script src="{{asset('templatefiles/chart-custom.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<script>
    $(document).ready(function() {

        // globals
        var CLASSROOM_ID;
        var QUIZ_RESPONSES;
        var activequiz;
        var selectedQuizId;
        var selectedQuizData;
        var studentList;
        var saveType;
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });


        // helper functions
        function getactivequiz(){

            var classroomid = $('.container-fluid.classroom').data('id');
            CLASSROOM_ID = classroomid

            $.ajax({
                type:'GET',
                url: '/getactivequiz',
                data:{
                    classroomid: classroomid
                },

                success:function(data) {
                    activequiz = data
                    loaddatatable()
                }
            })
        }

        function getQuizResponses(chapterquizid) {
            return $.ajax({
                type:'GET',
                url: '/quizresponses',
                data:{
                    classroomid: CLASSROOM_ID,
                    chapterquizid: chapterquizid
                }
            })
        }

        function loaddatatable(){
            $("#quizDataTable2").DataTable({
                destroy: true,
                data:activequiz,
                order: [[0, 'asc']],
                lengthChange: false,
                responsive: true,
                ordering: false,
                columns: [
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": null},
                    { "data": "search"}
                ],
                columnDefs: [
                    {
                        'targets': 0,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                                var text = '<a class="mb-0">'+rowData.title+'</a>'
                                $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 1,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse(rowData.datefrom));
                            var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var text = '<a class="mb-0">'+markdate+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 2,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse( '1970-01-01T' + rowData.timefrom));
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+timeString+'</a>';
                            $(td)[0].innerHTML = text;
                        }
                    },
                    {
                        'targets': 3,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse(rowData.dateto));
                            var markdate = date2.toLocaleDateString("en-US", {month: "long", year: "numeric", day: "numeric"});
                            var text = '<a class="mb-0">'+markdate+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 4,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 =  new Date(Date.parse( '1970-01-01T' + rowData.timeto));
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit"});
                            var text = '<a class="mb-0">'+timeString+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 5,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var text = '<a class="mb-0">'+rowData.noofattempts+'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 6,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            var date2 = new Date(Date.parse(rowData.createddatetime));
                            const dateString = date2.toLocaleDateString("en-US", { year: "numeric", month: "2-digit", day: "2-digit" });
                            const timeString = date2.toLocaleTimeString("en-US", { hour12: true, hour: "2-digit", minute: "2-digit", second: "2-digit" });
                            var text = '<a class="mb-0">'+ dateString + ' ' + timeString +'</a>'
                            $(td)[0].innerHTML =  text
                        }
                    },
                    {
                        'targets': 7,
                        'orderable': false, 
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            getQuizResponses(rowData.id).then(function(data) {

                                var latestEntries = {}

                                // Iterate through the data and update the latest entry for each submittedby
                                data.forEach(entry => {
                                    const submittedby = entry.submittedby;
                                    const datetime = new Date(entry.submitteddatetime);
                                    
                                    if (!latestEntries[submittedby] || datetime > latestEntries[submittedby].datetime) {
                                        latestEntries[submittedby] = { entry, datetime };
                                    }
                                });


                                var buttons = '<a href="#" class="response ml-4 text-blue-500" data-id="'+rowData.id+'">Responses ('+Object.keys(latestEntries).length+')</a>';

                                $(td)[0].innerHTML =  buttons
                            })

                            $(td).addClass('text-center')
                            $(td).addClass('align-middle')
                        }
                    }
                ]
            });
        }

        function getclassroomstudents() {
            $.ajax({
                type:'GET',
                url: '/getclassroomstudents',
                data: {
                    classroomid: CLASSROOM_ID
                },
                success: function(data) {
                    studentList = data;

                    $(".select-students").select2({
                        data: data,
                        width: '100%',
                        minimumResultsForSearch: Infinity
                    })
                }
            })
        }


        // init
        getactivequiz()
        getclassroomstudents()


        // event handlers
        $("button[type='submit']").click(function(event) {

            event.preventDefault();

            var dateFrom = $('#date-from').val();
            var timeFrom = $('#time-from').val();
            var dateTo = $('#date-to').val();
            var timeTo = $('#time-to').val();
            var attempts = $('#attempts').val();
            var students = $('#select-students').val();

            // empty <ul class="allowed-students" data-id="">
            $(`ul[data-id="${selectedQuizId}"`).empty();

            // loop through each student and add to list
            students.forEach(function(val, index) {
                var selectedStudent = studentList.filter(function(data) {
                    return data.id == val;
                })
                // add to list
                $(`ul[data-id="${selectedQuizId}"`).prepend(`<li id="${selectedStudent[0].id}">${selectedStudent[0].text}</li>`)
            })

            if (!dateFrom || !timeFrom || !dateTo || !timeTo || !attempts) {
                alert('Please fill in all fields.');
                return;
            }

            // check if the date and time inputs are valid
            if (new Date(dateFrom + 'T' + timeFrom + ':00') >= new Date(dateTo + 'T' + timeTo + ':00')) {
                alert('The date and time inputs are not valid.');
                return;
            }

            // if the form inputs are valid, submit the form
            $.ajax({
                type:'GET',
                url: '/viewbookchaptertestavailability',
                data:{
                    dateFrom : dateFrom,
                    timeFrom : timeFrom,
                    dateTo   : dateTo,
                    timeTo   : timeTo,
                    attempts : attempts,
                    quizId   : selectedQuizId,
                    classroomId : CLASSROOM_ID,
                    allowed_students: students
                },
                success: function(data) {

                    // update activequiz data
                    $.ajax({
                        type:'GET',
                        url: '/getactivequiz',
                        data:{
                            classroomid: CLASSROOM_ID
                        },

                        success:function(data) {
                            activequiz = data
                        }
                    }).then(function() {
                        $("#activateQuizModal").modal('hide');
                    })

                    // if (saveType == 'activate') {
                    //     // add entry to <ul class="allowed-students">
                        

                    // } else if (saveType == 'ongoing') {

                    // } else {

                    // }


                    // if(data ==1){
                    //     $('.close').click();
                    //     Toast.fire({
                    //             type: 'success',
                    //             title: 'Added successfully!'
                    //         })

                    //     getactivequiz()
                    // }

                    // if(data ==0){
                    //     $('.close').click();
                    //     Toast.fire({
                    //             type: 'success',
                    //             title: 'The quiz has been reactivated successfully!'
                    //         })

                    //     getactivequiz()
                    // }
                }
            })
        });

        $('.select-students').on('select2:unselect', function (e) {
            // Do something
            var data = e.params.data;
            var allowed_stud = selectedQuizData[0].allowed_students

            if (selectedQuizData[0].allowed_students) {
                var studentExists = allowed_stud.filter(function(student) {
                    return student.id == data.id
                })

                if (studentExists.length != 0) {
                    $.ajax({
                        type:'GET',
                        url: '/removeallowedstudent',
                        data:{
                            chapterquizschedid: studentExists[0].chapterquizschedid,
                            studentid: studentExists[0].id
                        },

                        success:function(data) {
                            if (data == 1) {
                                console.log('success delete')
                            }
                        }
                    })
                }
            }
        });

        $(document).on('click', '#activate-quiz', function() {
            // get the quiz id from data-id
            selectedQuizId = $(this).data('id');
            selectedQuizData = activequiz.filter((quiz) => {
                return quiz.id == selectedQuizId
            })

            // get allow_student_ids
            var allowed_students_id = [];
            if(selectedQuizData.length != 0 && selectedQuizData[0].allowed_students != null) {
                allowed_students_id = selectedQuizData[0].allowed_students.map(function(data) {
                    return data.id
                })
            }

            // change modal title
            $('#activateQuizModalLabel').text('Activate Quiz');

            // change modal color to green
            $('#activateQuizModal .modal-header').removeClass('bg-primary');
            $('#activateQuizModal .modal-header').removeClass('bg-warning');
            $('#activateQuizModal .modal-header').addClass('bg-success');
            
            // render class list
            getclassroomstudents()

            // set save type
            saveType = 'activate'

            Promise.all([

                // reset any input values entered
                $("#date-from").val('').promise(),
                $("#time-from").val('').promise(),
                $("#date-to").val('').promise(),
                $("#time-to").val('').promise(),
                $("#attempts").val('').promise(),
                $(".select-students").empty().promise()
            ]).then(function() {

                // show activate quiz modal
                $('#activateQuizModal').modal();
            });
        });

        $(document).on('click', '#ongoing-quiz', function() {
            // get the quiz id from data-id
            selectedQuizId = $(this).data('id');
            selectedQuizData = activequiz.filter((quiz) => {
                return quiz.id == selectedQuizId
            })

            // get allow_student_ids
            var allowed_students_id = [];
            if(selectedQuizData.length != 0 && selectedQuizData[0].allowed_students != null) {
                allowed_students_id = selectedQuizData[0].allowed_students.map(function(data) {
                    return data.id
                })
            }

            // assign values
            var dateFrom = selectedQuizData[0].datefrom;
            var timeFrom = selectedQuizData[0].timefrom;
            var dateTo = selectedQuizData[0].dateto;
            var timeTo = selectedQuizData[0].timeto;
            var attempts = selectedQuizData[0].noofattempts;

            // change modal color to green
            $('#activateQuizModal .modal-header').removeClass('bg-primary');
            $('#activateQuizModal .modal-header').removeClass('bg-success');
            $('#activateQuizModal .modal-header').addClass('bg-warning');

            // change modal title
            $('#activateQuizModalLabel').text('Ongoing Quiz');

            // render select2 student list
            getclassroomstudents()

            // set save type
            saveType = 'ongoing'

            Promise.all([

                // reset any input values entered
                $("#date-from").val(dateFrom).promise(),
                $("#time-from").val(timeFrom).promise(),
                $("#date-to").val(dateTo).promise(),
                $("#time-to").val(timeTo).promise(),
                $("#attempts").val(attempts).promise(),
                $(".select-students").val(allowed_students_id).change().promise()

            ]).then(function() {

                // show activate quiz modal
                $('#activateQuizModal').modal();
            });
        })

        $(document).on('click', '#reactivate-quiz', function() {
            // get the quiz id from data-id
            selectedQuizId = $(this).data('id');
            selectedQuizData = activequiz.filter((quiz) => {
                return quiz.id == selectedQuizId
            })

            // get allow_student_ids
            var allowed_students_id = [];
            if(selectedQuizData.length != 0 && selectedQuizData[0].allowed_students != null) {
                allowed_students_id = selectedQuizData[0].allowed_students.map(function(data) {
                    return data.id
                })
            }

            // assign values
            var dateFrom = selectedQuizData[0].datefrom;
            var timeFrom = selectedQuizData[0].timefrom;
            var dateTo = selectedQuizData[0].dateto;
            var timeTo = selectedQuizData[0].timeto;
            var attempts = selectedQuizData[0].noofattempts;

            // change modal color to green
            $('#activateQuizModal .modal-header').removeClass('bg-success');
            $('#activateQuizModal .modal-header').removeClass('bg-warning');
            $('#activateQuizModal .modal-header').addClass('bg-primary');

            // change modal title
            $('#activateQuizModalLabel').text('Reactivate Quiz');

            // render select2 student list
            getclassroomstudents()

            // set save type
            saveType = 'reactivate'

            Promise.all([

                // reset any input values entered
                $("#date-from").val(dateFrom).promise(),
                $("#time-from").val(timeFrom).promise(),
                $("#date-to").val(dateTo).promise(),
                $("#time-to").val(timeTo).promise(),
                $("#attempts").val(attempts).promise(),
                $(".select-students").val(allowed_students_id).change().promise()

            ]).then(function() {

                // show activate quiz modal
                $('#activateQuizModal').modal();
            });
        })
        
        $(document).on('click','.refresh_table',function(){
                console.log("Refreshed")
                getactivequiz()
        })

        $(document).on('click', '.response', function() {

            var chapterquizid = $(this).data('id')
            var studentEntryHtml;

            $('#quizResponseDetails').empty()

            getQuizResponses(chapterquizid).then(function(data) {

                // Create an object to store the latest entries for each submittedby
                const latestEntries = {};

                // Iterate through the data and update the latest entry for each submittedby
                data.forEach(entry => {

                    const submittedby = entry.submittedby;
                    const datetime = new Date(entry.submitteddatetime);
                    
                    if (!latestEntries[submittedby] || datetime > latestEntries[submittedby].datetime) {
                        latestEntries[submittedby] = { entry, datetime };
                    }
                });

                // Create the HTML for the latest entries
                const latestEntriesHtml = Object.values(latestEntries).map(({ entry, datetime }) => {
                    let options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
                    let formattedDate = datetime.toLocaleDateString('en-US', options);


                    // Calculate no. of attempts
                    var filteredQuiz = activequiz.filter(function(quiz) {
                        if (quiz.id == chapterquizid) {
                            return quiz
                        }
                    });

                    console.log('filtered-quiz', filteredQuiz)
                    console.log('entry', entry)
                

                    return `
                        <tr>
                        <td>${entry.name}</td>
                        <td>${formattedDate}</td>
                        <td>${data.length} / ${filteredQuiz[0].noofattempts}</td>
                        <td>${entry.totalscore ? entry.totalscore : 'Not yet scored.'}</td>
                        <td><button class="btn btn-primary view-response" data-quiz-id="${filteredQuiz[0].id}" data-record-id="${entry.id}">View Response</button></td>
                        </tr>
                    `;
                }).join('');

                $(latestEntriesHtml).appendTo('#quizResponseDetails');

            })

            $('#responseModal').modal()

        })

        $(document).on('click', '.view-response', function() {

            var recordId = $(this).data('record-id')
            var selectedQuizId = $(this).data('quiz-id')
            var url = `/viewquizresponse/${CLASSROOM_ID}/${selectedQuizId}/${recordId}`;

            window.open(url, '_blank');
        })


    });
</script>

