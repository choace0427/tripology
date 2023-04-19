jQuery(function($){

    'use strict';
    if ($('input[name="slug"]').length) {
        $('input[name="name"]').change(function() {
            if ($('input[name="slug"]').length) {
                $('input[name="slug"]').val($('input[name="name"]').val().toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, ''));
            }
        })
        $('input[name="title"]').change(function() {
            if ($('input[name="slug"]').length) {
                $('input[name="slug"]').val($('input[name="title"]').val().toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, ''));
            }
        })
    }
    if ($('select[name="country_id"]').length) {
        $('select[name="country_id"]').change(function() {
            $.ajax({url: "/api/locations/get-state/" + $('select[name="country_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="state_id"]').append(`<option value="">-</option>`);
                result.map((state, idx) => {
                    $('select[name="state_id"]').append(`<option value="${state.id}">
                                       ${state.name}
                                  </option>`);
                })
            }});
        })
    }
    if ($('select[name="state_id"]').length) {
        $('select[name="state_id"]').change(function() {
            $.ajax({url: "/api/locations/get-city/" + $('select[name="state_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="city_id"]').append(`<option value="">-</option>`);
                result.map((city, idx) => {
                    $('select[name="city_id"]').append(`<option value="${city.id}">
                                       ${city.name}
                                  </option>`);
                })
            }});
        })
    }

    if ($('select[name="travel_from_country_id"]').length) {
        $('select[name="travel_from_country_id"]').change(function() {
            $.ajax({url: "/api/locations/get-state/" + $('select[name="travel_from_country_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="travel_from_state_id"]').append(`<option value="">-</option>`);
                result.map((state, idx) => {
                    $('select[name="travel_from_state_id"]').append(`<option value="${state.id}">
                                       ${state.name}
                                  </option>`);
                })
            }});
        })
    }
    if ($('select[name="travel_from_state_id"]').length) {
        $('select[name="travel_from_state_id"]').change(function() {
            $.ajax({url: "/api/locations/get-city/" + $('select[name="travel_from_state_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="travel_from_city_id"]').append(`<option value="">-</option>`);
                result.map((city, idx) => {
                    $('select[name="travel_from_city_id"]').append(`<option value="${city.id}">
                                       ${city.name}
                                  </option>`);
                })
            }});
        })
    }

    if ($('select[name="travel_to_country_id"]').length) {
        $('select[name="travel_to_country_id"]').change(function() {
            $.ajax({url: "/api/locations/get-state/" + $('select[name="travel_to_country_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="travel_to_state_id"]').append(`<option value="">-</option>`);
                result.map((state, idx) => {
                    $('select[name="travel_to_state_id"]').append(`<option value="${state.id}">
                                       ${state.name}
                                  </option>`);
                })
            }});
        })
    }
    if ($('select[name="travel_to_state_id"]').length) {
        $('select[name="travel_to_state_id"]').change(function() {
            $.ajax({url: "/api/locations/get-city/" + $('select[name="travel_to_state_id"]').val(), success: function(result){
                // console.log(result)
                $('select[name="travel_to_city_id"]').append(`<option value="">-</option>`);
                result.map((city, idx) => {
                    $('select[name="travel_to_city_id"]').append(`<option value="${city.id}">
                                       ${city.name}
                                  </option>`);
                })
            }});
        })
    }
    if ($('#additionalInfo').length) {
        $('.card-body').append('<div class="form-group col-sm-12" id="additionalMeta" element="div"><button id="addMeta" class="btn btn-success" style="float-right">Add Meta</button></div>')
        $('#addMeta').on('click', (e) => {
            e.preventDefault();
            if ($('#additionalMetaSelect').length) {
                $('#additionalMetaSelect').show();
            } else {
                $('<div class="form-group col-sm-12" id="additionalMetaSelect" element="div">\
                    <label>Type</label>\
                    <select id="selectType" name="selectType" class="form-control">\
                        <option value="">-</option>\
                        <option value="text">Text</option>\
                        <option value="textarea">Text Area</option>\
                        <option value="image">Image</option>\
                    </select>\
                </div>').insertBefore("#additionalMeta");
            }
        })
        $('.card-body').on('change', '#selectType', function() {
            if ($(this).find("option:selected").val() == 'text') {
                $('<div class="row col-sm-12"><div class="form-group col-sm-3" element="div">\
                <label>Field Type</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][type]" value="text" class="form-control" readonly>\
                </div><div class="form-group col-sm-3" element="div">\
                <label>Enter Field Label</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][textLabel]" value="" class="form-control">\
                </div><div class="form-group col-sm-6" element="div">\
                <label>Enter Field Value</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][textValue]" value="" class="form-control">\
                </div></div><div class="form-group col-sm-12" element="div"><h5 class="text-center">~~~~~</h5></div>').insertBefore("#additionalMetaSelect");
            } else if ($(this).find("option:selected").val() == 'textarea') {
                $('<div class="row col-sm-12"><div class="form-group col-sm-3" element="div">\
                <label>Field Type</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][type]" value="textarea" class="form-control" readonly>\
                </div><div class="form-group col-sm-3" element="div">\
                <label>Enter Field Label</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][textAreaLabel]" value="" class="form-control">\
                </div><div class="form-group col-sm-6" element="div">\
                <label>Enter Field Value</label>\
                <textarea name="packageMeta['+ $('#additionalInfo').val() +'][textAreaValue]" class="form-control"></textarea>\
                </div></div><div class="form-group col-sm-12" element="div"><h5 class="text-center">~~~~~</h5></div>').insertBefore("#additionalMetaSelect");
            } else if ($(this).find("option:selected").val() == 'image') {
                $('<div class="row col-sm-12"><div class="form-group col-sm-3" element="div">\
                <label>Field Type</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][type]" value="image" class="form-control" readonly>\
                </div><div class="form-group col-sm-3" element="div">\
                <label>Enter Image Label</label>\
                <input type="text" name="packageMeta['+ $('#additionalInfo').val() +'][imgLabel]" value="" class="form-control">\
                </div><div data-init-function="bpFieldInitUploadElement" data-field-name="image" class="form-group col-sm-6" element="div">\
                <label>Upload Image</label>\
                <div class="backstrap-file">\
                    <input type="file" name="img[]" class="file_input backstrap-file-input" multiple="multiple" enctype="multipart/form-data" >\
                    <label class="backstrap-file-label" for="customFile"></label>\
                </div>\
                </div></div><div class="form-group col-sm-12" element="div"><h5 class="text-center">~~~~~</h5></div>').insertBefore("#additionalMetaSelect");
            } else {}

            $('#additionalMetaSelect').hide();
            $('#additionalInfo').val(parseInt($('#additionalInfo').val()) + 1);
        })
    }
});
