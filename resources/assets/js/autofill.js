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
                                window.record = item;
                                return {
                                    label: item.location_name + ' ' + item.address,
                                    value: item.location_name + ' ' + item.address
                                }
                        }));
                    }});
                },
                minLength: 1,
                select: function( event, ui ) {
                    
                    $('#customer_name').val(window.record.location_name);
                    $('#customer_address').val(window.record.address);
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });