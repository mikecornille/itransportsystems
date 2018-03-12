     //Remit Autofill
 $(function() {
            
            $( "#car-remit-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/remit/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.originRecord = ui;
                    $('#car_remit_name').val(window.originRecord.item.object.name);
                    $('#car_remit_address').val(window.originRecord.item.object.address);
                    $('#car_remit_city').val(window.originRecord.item.object.city);
                    $('#car_remit_state').val(window.originRecord.item.object.state);
                    $('#car_remit_zip').val(window.originRecord.item.object.zip);
                    

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });


    //Remit Autofill
 $(function() {
            
            $( "#remit-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/remit/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.originRecord = ui;
                    $('#remit_name').val(window.originRecord.item.object.name);
                    $('#remit_address').val(window.originRecord.item.object.address);
                    $('#remit_city').val(window.originRecord.item.object.city);
                    $('#remit_state').val(window.originRecord.item.object.state);
                    $('#remit_zip').val(window.originRecord.item.object.zip);
                    $('#bank_name').val(window.originRecord.item.object.bank_name);
                    $('#account_name').val(window.originRecord.item.object.account_name);
                    $('#routing_number').val(window.originRecord.item.object.routing_number);
                    $('#account_number').val(window.originRecord.item.object.account_number);
                    $('#account_type').val(window.originRecord.item.object.account_type);
                    $('#accounting_email').val(window.originRecord.item.object.accounting_email);
                    $('#accounting_phone').val(window.originRecord.item.object.accounting_phone);
                    

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });




  //Additional Stops Autofill
 $(function() {
            
            $( "#additional-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/location/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.location_name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone,
                                    value: item.location_name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.originRecord = ui;
                    $('#add_stops').val($('#add_stops').val() + ' ' + window.originRecord.item.object.location_name + ' ' + window.originRecord.item.object.address + ' ' + window.originRecord.item.object.city + ', ' + window.originRecord.item.object.state + ' ' + window.originRecord.item.object.zip + ' ' + window.originRecord.item.object.contact + ' ' + window.originRecord.item.object.phone);
                    

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });

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
                                    label: '--NAME-- ' + item.location_name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone,
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
                                    label: '--NAME-- ' + item.location_name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone,
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
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --EMAIL-- ' + item.email + ' --PHONE-- ' + item.phone,
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
                    $('#customer_id').val(window.customerRecord.item.object.id);
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

  //Find Customer Autofill
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#find-customer-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/customer/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --EMAIL-- ' + item.email + ' --PHONE-- ' + item.phone,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.customerRecord = ui;
                    $('#name').val(window.customerRecord.item.object.name);
                    $('#cus_id').val(window.customerRecord.item.object.id);
                    $('#location_number').val(window.customerRecord.item.object.location_number);
                    $('#address').val(window.customerRecord.item.object.address);
                    $('#city').val(window.customerRecord.item.object.city);
                    $('#state').val(window.customerRecord.item.object.state);
                    $('#zip').val(window.customerRecord.item.object.zip);
                    $('#contact').val(window.customerRecord.item.object.contact);
                    $('#email').val(window.customerRecord.item.object.email);
                    $('#phone').val(window.customerRecord.item.object.phone);
                    $('#fax').val(window.customerRecord.item.object.fax);
                    $('#internal_notes').val(window.customerRecord.item.object.internal_notes);
                    $('#customer_ambassador').val(window.customerRecord.item.object.customer_ambassador);
                    $('#weekly_email').val(window.customerRecord.item.object.weekly_email);
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

 //Find Customer Autofill Loadlist
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#customer-search-loadlist" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/customer/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --EMAIL-- ' + item.email + ' --PHONE-- ' + item.phone,
                                    value: item.name,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.customerRecord = ui;
                    $('#customer_id').val(window.customerRecord.item.object.name);
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
                                    label: ' --MAKE-- ' + item.make + ' --MODEL-- ' + item.model + ' --DIMS-- ' + item.length + 'in. ' + item.width + 'in. ' + item.height + 'in. ' + item.weight + 'lbs. --LOADING INS-- ' + item.loading_instructions,
                                    value: item.make + ' ' + item.model + ' ' + item.length + 'in. ' + item.width + 'in. ' + item.height + 'in. ' + item.weight + 'lbs.',
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.equipmentRecord = ui;
                    $('#commodity').val($('#commodity').val() + ' ' + window.equipmentRecord.item.object.make + ' ' + window.equipmentRecord.item.object.model + ' ' + window.equipmentRecord.item.object.length + 'in. X ' + window.equipmentRecord.item.object.width + 'in. X ' + window.equipmentRecord.item.object.height + 'in. ' + window.equipmentRecord.item.object.weight + 'lbs. ');
                    $('#special_ins').val($('#special_ins').val() + ' ' + window.equipmentRecord.item.object.loading_instructions);
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
                                    label: '--NAME-- ' + item.company + ' --MC #-- ' + item.mc_number + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone + ' --EMAIL-- ' + item.email + ' --CARGO EXP-- ' + item.cargo_exp + ' --CARGO AMOUNT-- ' + item.cargo_amount + ' --BROKER CONTRACT-- ' + item.bc_contract,
                                    value: item.company + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                    $('#carrier_id').val(window.carrierRecord.item.object.id);
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
                    $('#remit_name_display').text(window.carrierRecord.item.object.remit_name);
                    $('#remit_address_display').text(window.carrierRecord.item.object.remit_address);
                    $('#remit_citystatezip_display').text(window.carrierRecord.item.object.remit_city + ', ' + window.carrierRecord.item.object.remit_state + ' ' + window.carrierRecord.item.object.remit_zip);
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


      //Find Carrier Autofill
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#find-carrier-search" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/carrier/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.company + ' --MC #-- ' + item.mc_number + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone + ' --EMAIL-- ' + item.email + ' --CARGO EXP-- ' + item.cargo_exp + ' --CARGO AMOUNT-- ' + item.cargo_amount + ' --BROKER CONTRACT-- ' + item.bc_contract,
                                    value: item.company + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                      $('#car_id').val(window.carrierRecord.item.object.id);
                      $('#car_company').val(window.carrierRecord.item.object.company);
                      $('#car_contact').val(window.carrierRecord.item.object.contact);
                      $('#car_mc_number').val(window.carrierRecord.item.object.mc_number);
                      $('#car_dot_number').val(window.carrierRecord.item.object.dot_number);
                      $('#car_address').val(window.carrierRecord.item.object.address);
                      $('#car_city').val(window.carrierRecord.item.object.city);
                      $('#car_state').val(window.carrierRecord.item.object.state);
                      $('#car_zip').val(window.carrierRecord.item.object.zip);
                      $('#car_phone').val(window.carrierRecord.item.object.phone);
                      $('#car_fax').val(window.carrierRecord.item.object.fax);
                      $('#car_email').val(window.carrierRecord.item.object.email);
                      $('#car_driver_name').val(window.carrierRecord.item.object.driver_name);
                      $('#car_driver_phone').val(window.carrierRecord.item.object.driver_phone);
                      $('#car_cargo_exp').val(window.carrierRecord.item.object.cargo_exp);
                      $('#car_cargo_amount').val(window.carrierRecord.item.object.cargo_amount);
                      $('#car_bc_contract').val(window.carrierRecord.item.object.bc_contract);
                      $('#car_remit_name').val(window.carrierRecord.item.object.remit_name);
                      $('#car_remit_address').val(window.carrierRecord.item.object.remit_address);
                      $('#car_remit_city').val(window.carrierRecord.item.object.remit_city);
                      $('#car_remit_state').val(window.carrierRecord.item.object.remit_state);
                      $('#car_remit_zip').val(window.carrierRecord.item.object.remit_zip);
                      $('#car_load_route').val(window.carrierRecord.item.object.load_route);
                      $('#car_current_carrier_rate').val(window.carrierRecord.item.object.current_carrier_rate);
                      $('#car_current_trailer_type').val(window.carrierRecord.item.object.current_trailer_type);
                      $('#car_current_city_location').val(window.carrierRecord.item.object.current_city_location);
                      $('#car_current_miles_from_pick').val(window.carrierRecord.item.object.current_miles_from_pick);
                      $('#car_delivery_schedule').val(window.carrierRecord.item.object.delivery_schedule);
                      $('textarea#car_load_info').val(window.carrierRecord.item.object.load_info);
                      $('textarea#car_permanent_notes').val(window.carrierRecord.item.object.permanent_notes);
                      $('#flatbed').prop('checked', window.carrierRecord.item.object.flatbed);
                    $('#stepdeck').prop('checked', window.carrierRecord.item.object.stepdeck);
                    $('#conestoga').prop('checked', window.carrierRecord.item.object.conestoga);
                    $('#hot_shot').prop('checked', window.carrierRecord.item.object.hot_shot);
                    $('#van').prop('checked', window.carrierRecord.item.object.van);
                    $('#power').prop('checked', window.carrierRecord.item.object.power);
                    $('#lowboy').prop('checked', window.carrierRecord.item.object.lowboy);
                    $('#landoll').prop('checked', window.carrierRecord.item.object.landoll);
                    $('#towing').prop('checked', window.carrierRecord.item.object.towing);
                    $('#auto_carrier').prop('checked', window.carrierRecord.item.object.auto_carrier);
                    $('#straight_truck').prop('checked', window.carrierRecord.item.object.straight_truck);
                    $('#email_colleague_carrier').val(window.carrierRecord.item.object.email_colleague_carrier);
                    
                    
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#find-carrier-search').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });

           //Find Carrier Autofill for new carrier data workflow
  $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#find-carrier-search-new" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/carrier/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.company + ' --MC #-- ' + item.mc_number + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone + ' --EMAIL-- ' + item.email + ' --CARGO EXP-- ' + item.cargo_exp + ' --CARGO AMOUNT-- ' + item.cargo_amount + ' --BROKER CONTRACT-- ' + item.bc_contract,
                                    value: item.company + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                      $('#findcar_id').val(window.carrierRecord.item.object.id);
                      
                    
                    
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#find-carrier-search-new').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });

