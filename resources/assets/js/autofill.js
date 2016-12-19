 //Origin Autofill
 $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#origin-search" ).autocomplete({
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
                    window.originRecord = ui;
                    $('#pick_company').val(window.originRecord.item.object.location_name);
                    $('#pick_address').val(window.originRecord.item.object.address);
                    $('#pick_city').val(window.originRecord.item.object.city);
                    $('#pick_state').val(window.originRecord.item.object.state);
                    $('#pick_zip').val(window.originRecord.item.object.zip);
                    $('#pick_contact').val(window.originRecord.item.object.contact);
                    $('#pick_phone').val(window.originRecord.item.object.phone);
                    $('#pick_email').val(window.originRecord.item.object.email);
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

  //Delivery Autofill
 $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#delivery-search" ).autocomplete({
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
                    window.deliveryRecord = ui;
                    $('#delivery_company').val(window.deliveryRecord.item.object.location_name);
                    $('#delivery_address').val(window.deliveryRecord.item.object.address);
                    $('#delivery_city').val(window.deliveryRecord.item.object.city);
                    $('#delivery_state').val(window.deliveryRecord.item.object.state);
                    $('#delivery_zip').val(window.deliveryRecord.item.object.zip);
                    $('#delivery_contact').val(window.deliveryRecord.item.object.contact);
                    $('#delivery_phone').val(window.deliveryRecord.item.object.phone);
                    $('#delivery_email').val(window.deliveryRecord.item.object.email);
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
                    window.customerRecord = ui;
                    $('#customer_name').val(window.customerRecord.item.object.name);
                    $('#customer_address').val(window.customerRecord.item.object.address);
                    $('#customer_city').val(window.customerRecord.item.object.city);
                    $('#customer_state').val(window.customerRecord.item.object.state);
                    $('#customer_zip').val(window.customerRecord.item.object.zip);
                    $('#customer_contact').val(window.customerRecord.item.object.name_1);
                    $('#customer_email').val(window.customerRecord.item.object.email_1);
                    $('#customer_phone').val(window.customerRecord.item.object.phone_1);
                    $('#customer_fax').val(window.customerRecord.item.object.fax);
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


  //Equipment Autofill
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#equipment-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/equipment/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.name + ' ' + item.make,
                                    value: item.name + ' ' + item.model,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 1,
                select: function( event, ui ) {
                    window.customerRecord = ui;
                    $('#commodity').val(window.equipmentRecord.item.object.make);
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