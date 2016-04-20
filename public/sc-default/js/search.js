(function() {
    if(typeof jQuery == 'undefined'){
        return;
    }
    $(function(){
        var dateControl = {
            radio: $('#dateOptions input[type="radio"]'),
            dateRangeStartInput: $('#search-date-start'),
            dateRangeEndInput:   $('#search-date-end'),
            init: function(locale, fallbackLocale) {
                var that = this;
                if('object' == typeof $.datepicker.regional[locale]) {
                    $.datepicker.setDefaults($.datepicker.regional[locale]);
                } else {
                    $.datepicker.setDefaults($.datepicker.regional[fallbackLocale]);
                }
                
                this.dateRangeStartInput.datepicker({
                    maxDate: '+0d',
                    onClose: function(selectedDate) {
                        that.dateRangeEndInput.datepicker('option', 'minDate', selectedDate);
                    }
                });
                this.dateRangeEndInput.datepicker({
                    maxDate: '+0d',
                    onClose: function(selectedDate) {
                        that.dateRangeStartInput.datepicker('option', 'maxDate', selectedDate);
                    }
                });
                this.radio.change(function() {
                    this.value == 'range' ? that.unlock() : that.lock();
                });
                if(this.radio.closest(':checked').val() != 'range') {
                    this.lock();
                }
            },
            lock: function() {
                this.dateRangeStartInput.attr('readonly', 'readonly');
                this.dateRangeEndInput.attr('readonly', 'readonly');
                this.dateRangeStartInput.datepicker('disable');
                this.dateRangeEndInput.datepicker('disable');
                this.dateRangeStartInput.val('');
                this.dateRangeEndInput.val('');
            },
            unlock: function() {
                this.dateRangeStartInput.removeAttr('readonly');
                this.dateRangeEndInput.removeAttr('readonly');
                this.dateRangeStartInput.datepicker('enable');
                this.dateRangeEndInput.datepicker('enable');
            }
        };
        window.dateControl = dateControl;
    })(); 
})();