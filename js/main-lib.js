//  CONVENTIONAL FUNCTIONS  //

/* Returns a random number within a range */
function randomNum(start, end) {
	return Math.floor((Math.random() * end) + start);
}

/* Returns true if parameter is an email */
function isEmail(email) {
    var emailReg = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    return emailReg.test(email);
}

/* Returns true if parameter has whitespace */
function strHasWhiteSpace(string) {
    stringReg = new RegExp(/[\s]/);
    return stringReg.test(string);
}

/* Returns true if the string is Alphanumeric and contains characters like (.) & (_) */
function isSuitableForUsername(str) {
    stringReg = new RegExp(/^[a-zA-Z0-9._]+$/);
    return stringReg.test(str);
}

/* Returns true if string has only alphabets */
function hasOnlyLetters(str) {
    stringReg = new RegExp(/^[a-zA-Z\s]+$/);
    return stringReg.test(str);
}

/* Returns true if a string contains only numbers */
function isPhoneNumber (str) {
    stringReg = new RegExp(/^[0-9]+$/);
    return stringReg.test(str);
}



/*testing*/
File.prototype.convertToBase64 = function(callback){
    var reader = new FileReader();
    reader.onloadend = function (e) {
        callback(e.target.result, e.target.error);
    };   
    reader.readAsDataURL(this);
};
// JQUERY PLUGINS //

/* Checking if element is scrolled into view */
$.fn.isInView = function(){
    //Window Object
    var win = $(window);
    //Object to Check
    obj = $(this);
    //the top Scroll Position in the page
    var scrollPosition = win.scrollTop();
    //the end of the visible area in the page, starting from the scroll position
    var visibleArea = win.scrollTop() + win.height();
    //the end of the object to check
    var objEndPos = (obj.offset().top + obj.outerHeight());
    return(visibleArea >= objEndPos && scrollPosition <= objEndPos ? true : false)
    
};


/* Preview Image */
$.fn.previewImageFrom =  function (fileInputSelector) {
    //Image to preview
    imageObj = $(this);
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    imageObj.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    $(fileInputSelector).change(function () {
        readURL(this);
    });

};


/* This plugin removes default label of file upload input */
+function ($) {
    'use strict';

    var FileUpload = function (element) {
        this.element = $(element);
        var defaultText = this.element.text();
        
        var label = this.element.text();
        var input = $('input', this.element);
        
        this.element.text('');
        this.element.append('<span class="file-upload-text"></span>');
        $('.file-upload-text', this.element).text(label);
        
        this.element.append(input);
        
        this.element.on('change', ':file', function() {
            var input = $(this);
            
            if (input.val()) {
                var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                $('.file-upload-text', $(this).parent('label')).text(label);
            }
            else {

                $('.file-upload-text', $(this).parent('label')).text(defaultText);
            }
        });
    };

    function Plugin() {
        return this.each(function () {
            var $this = $(this);
            var data  = $this.data('bs.file-upload');

            if (!data) {
                $this.data('bs.file_upload', (data = new FileUpload(this)));
            }
        });
    }

    var old = $.fn.file_upload;
    $.fn.file_upload = Plugin;
    $.fn.file_upload.Constructor = FileUpload;

    $.fn.file_upload.noConflict = function () {
        $.fn.file_upload = old;
        return this;
    };
}(jQuery);



    $.fn.formState = function() {
        console.log($(this));
    }