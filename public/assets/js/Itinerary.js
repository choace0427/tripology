jQuery(function($) {
    'use strict';

    // Append button to card body
    $('.card-body').append('<div class="form-group col-sm-12" id="a" element="div"><button id="addP" class="btn btn-success" style="float:right">Add Itinerary</button></div><div class="row col-sm-12"><div class="form-group col-sm-3" element="div">');

    // Event handler for button click
    $('#a').on('click', (e) => {
        e.preventDefault();
        // Create modal HTML markup
        var modal = '<div id="myModal" class="modal" tabindex="-1" role="dialog"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">\
        Modal Title</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><input type="text" id="inputHeading1" class="form-control" placeholder="Heading 1"/><input type="text" id="inputSubheading1" class="form-control" placeholder="Subheading 1"/><ul id="inputList1"></ul><input type="text" id="inputHeading2" class="form-control" placeholder="Heading 2"/><input type="text" id="inputSubheading2" class="form-control" placeholder="Subheading 2"/><ul id="inputList2"></ul></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>\
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button></div></div></div></div>';
        // Append modal to body
        $('body').append(modal);
        // Show modal
        $('#myModal').modal('show');
    });

    $('body').on('click', '#saveChanges', () => {
        // Collect input field values
        var data = {
            heading1: {
                subheading: $('#inputSubheading1').val(),
                data: []
            },
            heading2: {
                subheading: $('#inputSubheading2').val(),
                data: []
            }
        };
        $('#inputList1 li input').each(function() {
            data.heading1.data.push($(this).val());
        });
        $('#inputList2 li input').each(function() {
            data.heading2.data.push($(this).val());
        });
        // Convert data to JSON string
        var jsonString = JSON.stringify(data);
        // Do something with the JSON data (e.g., send to server)
        console.log(jsonString);
        // Close the modal
        $('#myModal').modal('hide');
    });
    
        
});
