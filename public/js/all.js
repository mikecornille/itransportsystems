/* =========================================================
 * bootstrap-datepicker.js 
 * http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Copyright 2012 Stefan Petre
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */
 
!function( $ ) {
	
	// Picker object
	
	var Datepicker = function(element, options){
		this.element = $(element);
		this.format = DPGlobal.parseFormat(options.format||this.element.data('date-format')||'mm/dd/yyyy');
		this.picker = $(DPGlobal.template)
							.appendTo('body')
							.on({
								click: $.proxy(this.click, this)//,
								//mousedown: $.proxy(this.mousedown, this)
							});
		this.isInput = this.element.is('input');
		this.component = this.element.is('.date') ? this.element.find('.add-on') : false;
		
		if (this.isInput) {
			this.element.on({
				focus: $.proxy(this.show, this),
				//blur: $.proxy(this.hide, this),
				keyup: $.proxy(this.update, this)
			});
		} else {
			if (this.component){
				this.component.on('click', $.proxy(this.show, this));
			} else {
				this.element.on('click', $.proxy(this.show, this));
			}
		}
	
		this.minViewMode = options.minViewMode||this.element.data('date-minviewmode')||0;
		if (typeof this.minViewMode === 'string') {
			switch (this.minViewMode) {
				case 'months':
					this.minViewMode = 1;
					break;
				case 'years':
					this.minViewMode = 2;
					break;
				default:
					this.minViewMode = 0;
					break;
			}
		}
		this.viewMode = options.viewMode||this.element.data('date-viewmode')||0;
		if (typeof this.viewMode === 'string') {
			switch (this.viewMode) {
				case 'months':
					this.viewMode = 1;
					break;
				case 'years':
					this.viewMode = 2;
					break;
				default:
					this.viewMode = 0;
					break;
			}
		}
		this.startViewMode = this.viewMode;
		this.weekStart = options.weekStart||this.element.data('date-weekstart')||0;
		this.weekEnd = this.weekStart === 0 ? 6 : this.weekStart - 1;
		this.onRender = options.onRender;
		this.fillDow();
		this.fillMonths();
		this.update();
		this.showMode();
	};
	
	Datepicker.prototype = {
		constructor: Datepicker,
		
		show: function(e) {
			this.picker.show();
			this.height = this.component ? this.component.outerHeight() : this.element.outerHeight();
			this.place();
			$(window).on('resize', $.proxy(this.place, this));
			if (e ) {
				e.stopPropagation();
				e.preventDefault();
			}
			if (!this.isInput) {
			}
			var that = this;
			$(document).on('mousedown', function(ev){
				if ($(ev.target).closest('.datepicker').length == 0) {
					that.hide();
				}
			});
			this.element.trigger({
				type: 'show',
				date: this.date
			});
		},
		
		hide: function(){
			this.picker.hide();
			$(window).off('resize', this.place);
			this.viewMode = this.startViewMode;
			this.showMode();
			if (!this.isInput) {
				$(document).off('mousedown', this.hide);
			}
			//this.set();
			this.element.trigger({
				type: 'hide',
				date: this.date
			});
		},
		
		set: function() {
			var formated = DPGlobal.formatDate(this.date, this.format);
			if (!this.isInput) {
				if (this.component){
					this.element.find('input').prop('value', formated);
				}
				this.element.data('date', formated);
			} else {
				this.element.prop('value', formated);
			}
		},
		
		setValue: function(newDate) {
			if (typeof newDate === 'string') {
				this.date = DPGlobal.parseDate(newDate, this.format);
			} else {
				this.date = new Date(newDate);
			}
			this.set();
			this.viewDate = new Date(this.date.getFullYear(), this.date.getMonth(), 1, 0, 0, 0, 0);
			this.fill();
		},
		
		place: function(){
			var offset = this.component ? this.component.offset() : this.element.offset();
			this.picker.css({
				top: offset.top + this.height,
				left: offset.left
			});
		},
		
		update: function(newDate){
			this.date = DPGlobal.parseDate(
				typeof newDate === 'string' ? newDate : (this.isInput ? this.element.prop('value') : this.element.data('date')),
				this.format
			);
			this.viewDate = new Date(this.date.getFullYear(), this.date.getMonth(), 1, 0, 0, 0, 0);
			this.fill();
		},
		
		fillDow: function(){
			var dowCnt = this.weekStart;
			var html = '<tr>';
			while (dowCnt < this.weekStart + 7) {
				html += '<th class="dow">'+DPGlobal.dates.daysMin[(dowCnt++)%7]+'</th>';
			}
			html += '</tr>';
			this.picker.find('.datepicker-days thead').append(html);
		},
		
		fillMonths: function(){
			var html = '';
			var i = 0
			while (i < 12) {
				html += '<span class="month">'+DPGlobal.dates.monthsShort[i++]+'</span>';
			}
			this.picker.find('.datepicker-months td').append(html);
		},
		
		fill: function() {
			var d = new Date(this.viewDate),
				year = d.getFullYear(),
				month = d.getMonth(),
				currentDate = this.date.valueOf();
			this.picker.find('.datepicker-days th:eq(1)')
						.text(DPGlobal.dates.months[month]+' '+year);
			var prevMonth = new Date(year, month-1, 28,0,0,0,0),
				day = DPGlobal.getDaysInMonth(prevMonth.getFullYear(), prevMonth.getMonth());
			prevMonth.setDate(day);
			prevMonth.setDate(day - (prevMonth.getDay() - this.weekStart + 7)%7);
			var nextMonth = new Date(prevMonth);
			nextMonth.setDate(nextMonth.getDate() + 42);
			nextMonth = nextMonth.valueOf();
			var html = [];
			var clsName,
				prevY,
				prevM;
			while(prevMonth.valueOf() < nextMonth) {
				if (prevMonth.getDay() === this.weekStart) {
					html.push('<tr>');
				}
				clsName = this.onRender(prevMonth);
				prevY = prevMonth.getFullYear();
				prevM = prevMonth.getMonth();
				if ((prevM < month &&  prevY === year) ||  prevY < year) {
					clsName += ' old';
				} else if ((prevM > month && prevY === year) || prevY > year) {
					clsName += ' new';
				}
				if (prevMonth.valueOf() === currentDate) {
					clsName += ' active';
				}
				html.push('<td class="day '+clsName+'">'+prevMonth.getDate() + '</td>');
				if (prevMonth.getDay() === this.weekEnd) {
					html.push('</tr>');
				}
				prevMonth.setDate(prevMonth.getDate()+1);
			}
			this.picker.find('.datepicker-days tbody').empty().append(html.join(''));
			var currentYear = this.date.getFullYear();
			
			var months = this.picker.find('.datepicker-months')
						.find('th:eq(1)')
							.text(year)
							.end()
						.find('span').removeClass('active');
			if (currentYear === year) {
				months.eq(this.date.getMonth()).addClass('active');
			}
			
			html = '';
			year = parseInt(year/10, 10) * 10;
			var yearCont = this.picker.find('.datepicker-years')
								.find('th:eq(1)')
									.text(year + '-' + (year + 9))
									.end()
								.find('td');
			year -= 1;
			for (var i = -1; i < 11; i++) {
				html += '<span class="year'+(i === -1 || i === 10 ? ' old' : '')+(currentYear === year ? ' active' : '')+'">'+year+'</span>';
				year += 1;
			}
			yearCont.html(html);
		},
		
		click: function(e) {
			e.stopPropagation();
			e.preventDefault();
			var target = $(e.target).closest('span, td, th');
			if (target.length === 1) {
				switch(target[0].nodeName.toLowerCase()) {
					case 'th':
						switch(target[0].className) {
							case 'switch':
								this.showMode(1);
								break;
							case 'prev':
							case 'next':
								this.viewDate['set'+DPGlobal.modes[this.viewMode].navFnc].call(
									this.viewDate,
									this.viewDate['get'+DPGlobal.modes[this.viewMode].navFnc].call(this.viewDate) + 
									DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1)
								);
								this.fill();
								this.set();
								break;
						}
						break;
					case 'span':
						if (target.is('.month')) {
							var month = target.parent().find('span').index(target);
							this.viewDate.setMonth(month);
						} else {
							var year = parseInt(target.text(), 10)||0;
							this.viewDate.setFullYear(year);
						}
						if (this.viewMode !== 0) {
							this.date = new Date(this.viewDate);
							this.element.trigger({
								type: 'changeDate',
								date: this.date,
								viewMode: DPGlobal.modes[this.viewMode].clsName
							});
						}
						this.showMode(-1);
						this.fill();
						this.set();
						break;
					case 'td':
						if (target.is('.day') && !target.is('.disabled')){
							var day = parseInt(target.text(), 10)||1;
							var month = this.viewDate.getMonth();
							if (target.is('.old')) {
								month -= 1;
							} else if (target.is('.new')) {
								month += 1;
							}
							var year = this.viewDate.getFullYear();
							this.date = new Date(year, month, day,0,0,0,0);
							this.viewDate = new Date(year, month, Math.min(28, day),0,0,0,0);
							this.fill();
							this.set();
							this.element.trigger({
								type: 'changeDate',
								date: this.date,
								viewMode: DPGlobal.modes[this.viewMode].clsName
							});
						}
						break;
				}
			}
		},
		
		mousedown: function(e){
			e.stopPropagation();
			e.preventDefault();
		},
		
		showMode: function(dir) {
			if (dir) {
				this.viewMode = Math.max(this.minViewMode, Math.min(2, this.viewMode + dir));
			}
			this.picker.find('>div').hide().filter('.datepicker-'+DPGlobal.modes[this.viewMode].clsName).show();
		}
	};
	
	$.fn.datepicker = function ( option, val ) {
		return this.each(function () {
			var $this = $(this),
				data = $this.data('datepicker'),
				options = typeof option === 'object' && option;
			if (!data) {
				$this.data('datepicker', (data = new Datepicker(this, $.extend({}, $.fn.datepicker.defaults,options))));
			}
			if (typeof option === 'string') data[option](val);
		});
	};

	$.fn.datepicker.defaults = {
		onRender: function(date) {
			return '';
		}
	};
	$.fn.datepicker.Constructor = Datepicker;
	
	var DPGlobal = {
		modes: [
			{
				clsName: 'days',
				navFnc: 'Month',
				navStep: 1
			},
			{
				clsName: 'months',
				navFnc: 'FullYear',
				navStep: 1
			},
			{
				clsName: 'years',
				navFnc: 'FullYear',
				navStep: 10
		}],
		dates:{
			days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
			daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
			daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
			months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
			monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
		},
		isLeapYear: function (year) {
			return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0))
		},
		getDaysInMonth: function (year, month) {
			return [31, (DPGlobal.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month]
		},
		parseFormat: function(format){
			var separator = format.match(/[.\/\-\s].*?/),
				parts = format.split(/\W+/);
			if (!separator || !parts || parts.length === 0){
				throw new Error("Invalid date format.");
			}
			return {separator: separator, parts: parts};
		},
		parseDate: function(date, format) {
			var parts = date.split(format.separator),
				date = new Date(),
				val;
			date.setHours(0);
			date.setMinutes(0);
			date.setSeconds(0);
			date.setMilliseconds(0);
			if (parts.length === format.parts.length) {
				var year = date.getFullYear(), day = date.getDate(), month = date.getMonth();
				for (var i=0, cnt = format.parts.length; i < cnt; i++) {
					val = parseInt(parts[i], 10)||1;
					switch(format.parts[i]) {
						case 'dd':
						case 'd':
							day = val;
							date.setDate(val);
							break;
						case 'mm':
						case 'm':
							month = val - 1;
							date.setMonth(val - 1);
							break;
						case 'yy':
							year = 2000 + val;
							date.setFullYear(2000 + val);
							break;
						case 'yyyy':
							year = val;
							date.setFullYear(val);
							break;
					}
				}
				date = new Date(year, month, day, 0 ,0 ,0);
			}
			return date;
		},
		formatDate: function(date, format){
			var val = {
				d: date.getDate(),
				m: date.getMonth() + 1,
				yy: date.getFullYear().toString().substring(2),
				yyyy: date.getFullYear()
			};
			val.dd = (val.d < 10 ? '0' : '') + val.d;
			val.mm = (val.m < 10 ? '0' : '') + val.m;
			var date = [];
			for (var i=0, cnt = format.parts.length; i < cnt; i++) {
				date.push(val[format.parts[i]]);
			}
			return date.join(format.separator);
		},
		headTemplate: '<thead>'+
							'<tr>'+
								'<th class="prev">&lsaquo;</th>'+
								'<th colspan="5" class="switch"></th>'+
								'<th class="next">&rsaquo;</th>'+
							'</tr>'+
						'</thead>',
		contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>'
	};
	DPGlobal.template = '<div class="datepicker dropdown-menu">'+
							'<div class="datepicker-days">'+
								'<table class=" table-condensed">'+
									DPGlobal.headTemplate+
									'<tbody></tbody>'+
								'</table>'+
							'</div>'+
							'<div class="datepicker-months">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
								'</table>'+
							'</div>'+
							'<div class="datepicker-years">'+
								'<table class="table-condensed">'+
									DPGlobal.headTemplate+
									DPGlobal.contTemplate+
								'</table>'+
							'</div>'+
						'</div>';

}( window.jQuery );
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
                                    label: '--ID-- ' + item.id + ' --NAME-- ' + item.company + ' --MC #-- ' + item.mc_number + ' --ADDRESS-- ' + item.address + ' ' + item.city + ' ' + item.state + ' ' + item.zip + ' --CONTACT-- ' + item.contact + ' --PHONE-- ' + item.phone + ' --EMAIL-- ' + item.email + ' --CARGO EXP-- ' + item.cargo_exp + ' --CARGO AMOUNT-- ' + item.cargo_amount + ' --BROKER CONTRACT-- ' + item.bc_contract,
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

                    $('#account_name').val(window.carrierRecord.item.object.account_name);
                    $('#routing_number').val(window.carrierRecord.item.object.routing_number);
                    $('#account_number').val(window.carrierRecord.item.object.account_number);
                    $('#account_type').val(window.carrierRecord.item.object.account_type);
                    $('#accounting_email').val(window.carrierRecord.item.object.accounting_email);
                    

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

   $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#find-customer-search-new" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/customer/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: '--NAME-- ' + item.name + ' --ADDRESS-- ' + item.address + ' --CITY-- ' + item.city,
                                    value: item.name + ' ' + item.address,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.customerRecord = ui;
                      $('#findcus_id').val(window.customerRecord.item.object.id);
                      
                    
                    
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

   

//find journal accounts
         $(function() {
            function log( message ) {
                $( "<div>" ).text( message ).prependTo( "#log" );
                $( "#log" ).scrollTop( 0 );
            }
            $( "#find-journal-account" ).autocomplete({
                source: function( request, response ) {
                    $.ajax({
                        url: "/api/carrier/" + request.term,
                        dataType: "json",
                        success: function( data ) {
                            response($.map(data, function (item) {
                                return {
                                    label: 'Account Name: ' + item.company,
                                    value: item.company,
                                    object: item
                                }
                        }));
                    }});
                },
                minLength: 3,
                select: function( event, ui ) {
                    window.carrierRecord = ui;
                      $('#findJournalAccountsId').val(window.carrierRecord.item.object.id);
                      
                    
                    
                    log( ui.item ?
                    "Selected: " + ui.item.label :
                    "Nothing selected, input was " + this.value);
                                        $('#find-journal-account').val('test');

                },
                open: function() {
                    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );

                },
                close: function() {
                    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
                }
            });
        });
  
























//# sourceMappingURL=all.js.map
