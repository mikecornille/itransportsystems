 //Location Autofill
 $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#location-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/location/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.location_name + ' ' + item.address,
                                    value: item.location_name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 1,
                select: function( event, ui ) {
                    window.record = ui;
                    $('#pick_company').val(window.record.item.object.location_name);
                    $('#pick_address').val(window.record.item.object.address);
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#location-search').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });

//Customer Autofill
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#customer-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/customer/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.name + ' ' + item.address,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 1,
                select: function( event, ui ) {
                    window.record = ui;
                    $('#customer_name').val(window.record.item.object.name);
                    $('#customer_address').val(window.record.item.object.address);
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#location-search').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });