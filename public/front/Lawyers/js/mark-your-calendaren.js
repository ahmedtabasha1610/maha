/*!
 * Author:  Mark Allan B. Meriales
 * Name:    Mark Your Calendar v0.0.1
 * License: MIT License
 */

(function($) {
    // https://stackoverflow.com/questions/563406/add-days-to-javascript-date
    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    }

    $.fn.markyourcalendar = function(opts) {
        var prevHtml = `<div class="myc-prev-week"><</div>`;
        var nextHtml = `<div class="myc-next-week">></div>`;
        var defaults = {
            availability: opts.availability,//[[], [], [], [], [], [], []], // list of selectable times
            isMultiple: false,
            months: ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'],
            prevHtml: prevHtml,
            nextHtml: nextHtml,
            selectedDates: [],
            startDate: new Date(opts.startDate),//opts.weekdays[0],//
            TempStart: new Date(opts.startDate),
            weekdays: opts.weekdays,//['sun', 'mon', 'tue', 'wed', 'thurs', 'fri', 'sat'],//
            tempDays: opts.tempDays,
            ReservedArray: opts.ReservedArray,
            BufferHours: opts.BufferHours,
            //reservationdaysarray: opts.reservationdaysarray,
            //reservationhoursarray: opts.reservationhoursarray,
            //bufferhour: opts.bufferhour,
        };
        var settings = $.extend({}, defaults, opts);
        var html = ``;

        var onClick = settings.onClick;
        var onClickNavigator = settings.onClickNavigator;
        var instance = this;

        // kuhanin ang buwan
        this.getMonthName = function(idx) {
            return settings.months[idx];
        };

        var formatDate = function(d) {
            var date = '' + d.getDate();
            var month = '' + (d.getMonth() + 1);
            var year = d.getFullYear();
            if (date.length < 2) {
                date = '0' + date;
            }
            if (month.length < 2) {
                month = '0' + month;
            }
            return year + '-' + month + '-' + date;
        };

        // Eto ang controller para lumipat ng linggo
        // Controller to change 
        this.getNavControl = function() {
            var previousWeekHtml = `<div class="myc-prev-week-container">` + settings.prevHtml + `</div>`;
            var nextWeekHtml = `<div class="myc-prev-week-container">` + settings.nextHtml + `</div>`;
            var monthYearHtml = `
                <div class="myc-current-month-year-container">
                    ` + this.getMonthName(settings.startDate.getMonth()) + ' ' + settings.startDate.getFullYear() + `
                </div>
            `;

            var navHtml = `
                <div class="myc-nav-container">
                    ` + previousWeekHtml + `
                    ` + nextWeekHtml + `
                    <div style="clear:both;"></div>
                </div>
            `;
            return navHtml;
        };

        // kuhanin at ipakita ang mga araw
        this.getDatesHeader = function() {
            var tmp = ``;
            for (i = 0; i < 3; i++) {
                var d = settings.startDate.addDays(i);
                var temp = settings.tempDays[d.getDay()];
                var checkday = settings.weekdays.includes(temp);
                if (checkday) {
                    tmp += `
                    <div class="myc-date-header myc-date-header-` + i + `">
                        <span class="myc-date-display">` + settings.tempDays[d.getDay()] + `</span>
                         <span style="display: inherit;"><span class="myc-date-number">` + d.getDate() + `</span>/<span class="myc-date-number float-right">` + (d.getMonth() + 1) + `</span></span>
                    </div>
                `;
                }
                else {
                    tmp += `  <div class="myc-date-header myc-date-header-` + i + `">
                        <span class="myc-date-display">` + settings.tempDays[d.getDay()] + `</span>
                         <span style="display: inherit;"><span class="myc-date-number">` + d.getDate() + `</span>/<span class="myc-date-number float-right">` + (d.getMonth() + 1) + `</span></span>
                    </div> `;
                }
            }
            var ret = `<div class="myc-dates-container">` + tmp + `</div>`;
            return ret;
        }

        // kuhanin ang mga pwedeng oras sa bawat araw ng kasalukuyang linggo
        this.getAvailableTimes = function() {
            var tmp = ``;
            //var DisabledTime = `style="pointer-events:none;background: gray;"`;
            //var StyleDisabled = ``;
            //var BufferHour = settings.bufferhour;
            //var Currentdate = new Date;
            //var Currenthour = Currentdate.getHours();
            for (i = 0; i < 3; i++) {
                var tmpAvailTimes = ``;
                var d = settings.startDate.addDays(i);
                var temp = settings.tempDays[d.getDay()];
                var checkday = settings.weekdays.includes(temp);
                if (checkday) {
                    //get index of day
                    var realIndex = settings.weekdays.indexOf(temp);
                    $.each(settings.availability[realIndex], function () {

                        var CurrentTime = this;
                        var Currentdate = formatDate(settings.startDate.addDays(i));
                        var temp = false;
                        CurrentTime = CurrentTime.replace("&#x635;", "AM");
                        CurrentTime = CurrentTime.replace("&#x645;", "PM");
                        var Current = Currentdate + " " + CurrentTime;// "2021-06-13 11:00 ص"
                        var d = new Date(Current);
                        var today = new Date();
                        var AfterBuffer = today.getHours() + settings.BufferHours+1;
                        if (today.getDate() == d.getDate()) {
                            var n = d.getHours();
                            if (n < AfterBuffer) {
                                temp = true;
                            }
                        }
                        if (temp == false) {
                            temp = settings.ReservedArray.includes(Current);
                        }
                        var NewStyle = "";
                        if (temp) {
                            NewStyle = "style='"
                            NewStyle = NewStyle + 'text-decoration:line-through;';
                            NewStyle = NewStyle + 'pointer-events:none;';
                            NewStyle = NewStyle + 'cursor:default;';
                            NewStyle = NewStyle + 'color:#c7c7c7;';
                            NewStyle = NewStyle + "'";
                        }
                        tmpAvailTimes += `
                        <a href="javascript:;" class="myc-available-time" `+ NewStyle + ` data-time="` + this + `" data-date="` + formatDate(settings.startDate.addDays(i)) + `">
                            ` + this + `
                        </a>
                    `;

                    });
                    tmp += `<div class="myc-day-time-container myc-day-time-container-` + i + `">
                        ` + tmpAvailTimes + `<div style="clear:both;"></div><a href="javascript:;" class="loadMore1" style="display:none;">More</a><a onclick="BookFn()" class="booknow disabled-before-book">Book</a></div>`;
                }
                else {
                    tmp += `<div class="myc-day-time-container myc-day-time-container-` + i + `"><a  class="myc-available-time notimeavail"> No available slots</a><div style="clear:both;"></div><a class="booknow" style="cursor: not-allowed;"> No available slots</a></div>`;
                }
            }
            return tmp
        }

        // i-set ang mga oras na pwedeng ilaan
        this.setAvailability = function(arr) {
            settings.availability = arr;
            render();
        }

        // clear
        //this.clearAvailability = function () {
        //     
        //    settings.availability = [[], [], [], [], [], [], []];
        //}

        // pag napindot ang nakaraang linggo
        this.on('click', '.myc-prev-week', function () {
             
            var mycurrentdate = new Date(settings.TempStart);// new Date();
            var datecurrent = mycurrentdate.getDate();//4
            var monthcurrent = mycurrentdate.getMonth() + 1;//4
            var date = settings.startDate.getDate();//11
            var month = settings.startDate.getMonth() + 1;//4
            if (month <= monthcurrent) {
                if ((date <= datecurrent && month == monthcurrent) || month < monthcurrent) {
                    
                    return;
                }
            }
            else {
                instance.getAvailableTimes();
            }
            settings.startDate = settings.startDate.addDays(-3);
            //instance.clearAvailability();
            render(instance);

            if ($.isFunction(onClickNavigator)) {
                onClickNavigator.call(this, ...arguments, instance, settings.startDate);
            }
            $(".myc-day-time-container").each(function () {
                if ($(this).find(".myc-available-time").length > 6) {
                    $(this).find(".myc-available-time").hide();
                    $(this).find(".loadMore1").show();
                    $(this).find(".myc-available-time").slice(0, 6).show();
                }
            });
            $(".loadMore1").on("click", function (e) {
                 
                $(this).closest(".myc-day-time-container").find(".myc-available-time:hidden").show();
                $(this).hide();
            });
            
        });

        // pag napindot ang susunod na linggo
        this.on('click', '.myc-next-week', function() {
            settings.startDate = settings.startDate.addDays(3);
            //instance.clearAvailability();
            render(instance);

            if ($.isFunction(onClickNavigator)) {
                onClickNavigator.call(this, ...arguments, instance, settings.startDate);
            }
            $(".myc-day-time-container").each(function () {
                if ($(this).find(".myc-available-time").length > 6) {
                    $(this).find(".myc-available-time").hide();
                    $(this).find(".loadMore1").show();
                    $(this).find(".myc-available-time").slice(0, 6).show();
                }
            });
            $(".loadMore1").on("click", function (e) {
                 
                $(this).closest(".myc-day-time-container").find(".myc-available-time:hidden").show();
                $(this).hide();
            });
        });

        // pag namili ng oras
        this.on('click', '.myc-available-time', function () {
             
            $('.myc-day-time-container').find(".booknow").addClass("disabled-before-book");

            var date = $(this).data('date');
            var time = $(this).data('time');
            var tmp = date + ' ' + time;
            if ($(this).hasClass('selected')) {
                //hashed 7-7-2021
                //$(this).removeClass('selected');

                //var idx = settings.selectedDates.indexOf(tmp);
                //if (idx !== -1) {
                //    settings.selectedDates.splice(idx, 1);
                //}
            } else {
                if (settings.isMultiple) {
                    $(this).addClass('selected');

                    settings.selectedDates.push(tmp);
                } else {
                    $(this).closest('.myc-day-time-container').find(".booknow").removeClass("disabled-before-book");

                    settings.selectedDates.pop();
                    if (!settings.selectedDates.length) {
                        $('.myc-available-time').removeClass('selected');
                        $(this).addClass('selected');
                        settings.selectedDates.push(tmp);
                    }
                }
            }
            if ($.isFunction(onClick)) {
                onClick.call(this, ...arguments, settings.selectedDates);
            }
        });

        var render = function() {
            ret = `
                <div class="myc-container">
                    <div class="myc-nav-container">` + instance.getNavControl() + `</div>
                    <div class="myc-week-container">
                        <div class="">` + instance.getDatesHeader() + `</div>
                        <div class="myc-available-time-container">` + instance.getAvailableTimes() + `</div>
                    </div>
                </div>
            `;
            instance.html(ret);
        };

        render();
    };
})(jQuery);