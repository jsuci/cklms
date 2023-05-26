$(document).on('click', '#activate-quiz', function() {
    // get the quiz id from data-id
    selectedQuizId = $(this).data('id');

    // change modal color to green
    $('#activateQuizModal .modal-header').addClass('bg-success');

    Promise.all([

        // reset any input values entered
        $(".select-students").empty().promise(),
        $("#date-from").val('').promise(),
        $("#time-from").val('').promise(),
        $("#date-to").val('').promise(),
        $("#time-to").val('').promise(),
        $("#attempts").val('').promise(),

        // reset validation styles

    ]).then(function() {
        // Code to execute after all values have been reset

        // reset any validation styles

        // show activate quiz modal
        $('#activateQuizModal').modal();
    });
});