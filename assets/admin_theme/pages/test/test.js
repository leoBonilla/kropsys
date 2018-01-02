$(document).ready(function(){
  channel.bind('my-event', function(data) {
      //alert(data.message);
      var notifi_count = $('#notification-count');
      var counter = notifi_count.text();
      counter = Number(counter) + 1;
      notifi_count.text(counter);
      notifi_count.addClass('animated flash infinite');
      toastr["success"](data.message);
                                 setTimeout(function () { 
                                     //location.reload();
                                    }, 6000);
    });
});