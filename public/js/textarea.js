function auto_grow(element) {
    element.style.height = "81px";
    element.style.height = (element.scrollHeight)+"px";
}

var theCounter = $('#textareaLength'),
    textarea = $('#myTextarea'),
    maxLength = textarea.attr('maxlength');

theCounter.text('0 / '+maxLength);
theCounter.css({  
    'top': (textarea.offset().top + textarea.height()) - theCounter.height(),
    'left': (textarea.offset().left + textarea.width()) - theCounter.width()
});

textarea.on('keydown', function() {  
    var theLength = $(this).val().length;
    theCounter.text($(this).val().length+' / '+maxLength)
              .css({  
                  'left': (textarea.offset().left + textarea.width()) - theCounter.width()
              });
});


window.addEventListener('renderEvent', event => {

    function auto_grow(element) {
        element.style.height = "81px";
        element.style.height = (element.scrollHeight)+"px";
    }
    
    var theCounter = $('#textareaLength'),
        textarea = $('#myTextarea'),
        maxLength = textarea.attr('maxlength');
    
    theCounter.text('0 / '+maxLength);
    theCounter.css({  
        'top': (textarea.offset().top + textarea.height()) - theCounter.height(),
        'left': (textarea.offset().left + textarea.width()) - theCounter.width()
    });
    
    textarea.on('keydown', function() {  
        var theLength = $(this).val().length;
        theCounter.text($(this).val().length+' / '+maxLength)
                  .css({  
                      'left': (textarea.offset().left + textarea.width()) - theCounter.width()
                  });
    });

})