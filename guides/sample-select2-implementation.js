function getRoomsExcept(selected_bldg_id){
    $.ajax({
        type:'GET',
        url: 'api/building/all-rooms-except',
        data: {
                buildingid: selected_bldg_id
        },
        success:function(data) {
                all_rooms_except = data

                $('#assignRoom').empty()
                $("#assignRoom").select2({
                    data: data,
                    allowClear: true,
                    placeholder: "Select Room",
                    templateResult: function(data) {
                            
                            if(data.capacity !== undefined) {
                                return $('<option>', {
                                        'data-capacity': data.capacity,
                                        'value': data.id,
                                        'text': data.text + (data.capacity !== undefined ? ' (' + data.capacity + ')' : '')
                                });
                            }

                            if(data.id == 'add') {
                                return $('<option value="add">Add Room</option>');
                            }
                    },
                    templateSelection: function(data) {

                            if (data.id == 'add') {
                                return ``
                            }

                            if (data.id == '') {
                                return `Select Room`
                            }

                            return `${data.text} (${data.capacity})`
                    }

                })
        }
    }).then(() => {
        // prepend 'Add Room' to selection
        $('#assignRoom').prepend('<option value="add">Add Room</option>')

        // update select2 current selection
        if(room_selection_id != '') {
                $('#assignRoom').val(room_selection_id).trigger('change')
        }
    })
}