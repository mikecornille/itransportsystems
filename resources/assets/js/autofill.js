 //Origin Autofill
 $(function() {
            
            $( "#origin-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/location/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.location_name + ' ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' ' + item.contact + ' ' + item.phone,
                                    value: item.location_name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
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
                                    label: item.location_name + ' ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' ' + item.contact + ' ' + item.phone,
                                    value: item.location_name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
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
                                    label: item.name + ' ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' ' + item.contact + ' ' + item.email + ' ' + item.phone,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.customerRecord = ui;
                    $('#customer_name').val(window.customerRecord.item.object.name);
                    $('#customer_address').val(window.customerRecord.item.object.address);
                    $('#customer_city').val(window.customerRecord.item.object.city);
                    $('#customer_state').val(window.customerRecord.item.object.state);
                    $('#customer_zip').val(window.customerRecord.item.object.zip);
                    $('#customer_contact').val(window.customerRecord.item.object.contact);
                    $('#customer_email').val(window.customerRecord.item.object.email);
                    $('#customer_phone').val(window.customerRecord.item.object.phone);
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
                                    label: item.make + ' ' + item.model + ' ' + item.length + 'in. ' + item.width + 'in. ' + item.height + 'in. ' + item.weight + 'lbs. ' + item.loading_instructions,
                                    value: item.make + ' ' + item.model,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.equipmentRecord = ui;
                    $('#commodity').val(window.equipmentRecord.item.object.make + ' ' + window.equipmentRecord.item.object.model + ' ' + window.equipmentRecord.item.object.length + 'in. X ' + window.equipmentRecord.item.object.width + 'in. X ' + window.equipmentRecord.item.object.height + 'in. ' + window.equipmentRecord.item.object.weight + 'lbs. ');
                    $('#special_ins').val(window.equipmentRecord.item.object.loading_instructions);
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


    //Carrier Autofill
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#carrier-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/carrier/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: item.company + ' ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' ' + item.contact + ' ' + item.phone + ' ' + item.email + ' ' + item.cargo_exp + ' ' + item.cargo_amount + ' ' + item.bc_contract,
                                    value: item.company + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                    $('#carrier_name').val(window.carrierRecord.item.object.company);
                    $('#carrier_address').val(window.carrierRecord.item.object.address);
                    $('#carrier_city').val(window.carrierRecord.item.object.city);
                    $('#carrier_state').val(window.carrierRecord.item.object.state);
                    $('#carrier_zip').val(window.carrierRecord.item.object.zip);
                    $('#carrier_contact').val(window.carrierRecord.item.object.contact);
                    $('#carrier_email').val(window.carrierRecord.item.object.email);
                    $('#carrier_phone').val(window.carrierRecord.item.object.phone);
                    $('#carrier_fax').val(window.carrierRecord.item.object.fax);
                    $('#carrier_driver_name').val(window.carrierRecord.item.object.driver_name);
                    $('#carrier_driver_cell').val(window.carrierRecord.item.object.driver_phone);
                    $('#remit_name').val(window.carrierRecord.item.object.remit_name);
                    $('#remit_address').val(window.carrierRecord.item.object.remit_address);
                    $('#remit_city').val(window.carrierRecord.item.object.remit_city);
                    $('#remit_state').val(window.carrierRecord.item.object.remit_state);
                    $('#remit_zip').val(window.carrierRecord.item.object.remit_zip);
                    $('#carrier_mc').val(window.carrierRecord.item.object.mc_number);
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#carrier-search').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });