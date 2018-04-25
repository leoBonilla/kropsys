var BASE_URL = window.location.origin+'/kropsys';
// $(document).snowfall({image :BASE_URL + "/assets/img/flake.png", minSize: 5, maxSize:18});

var rangeOptions = {
     ranges: {
                'hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 días': [moment().subtract(6, 'days'), moment()],
                'Ultimos 15 días': [moment().subtract(14, 'days'), moment()],                       
                'Este mes': [moment().startOf('month'), moment().endOf('month')]                   
            },

     "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    }
 }; 


var singleDatepickerOpt = {
        singleDatePicker: true,
        showDropdowns: true,
        "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Personalizado",
        "daysOfWeek": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    }
    };

$(function () {
//efecto de nieve
//$(document).snowfall({image :BASE_URL + "/assets/img/flake.png", minSize: 5, maxSize:18});
         jQuery.extend(jQuery.validator.messages, {
                required: "Este campo es obligatorio.",
                remote: "Por favor, rellena este campo.",
                email: "Por favor, escribe una dirección de correo válida",
                url: "Por favor, escribe una URL válida.",
                date: "Por favor, escribe una fecha válida.",
                dateISO: "Por favor, escribe una fecha (ISO) válida.",
                number: "Por favor, escribe un número entero válido.",
                digits: "Por favor, escribe sólo dígitos.",
                creditcard: "Por favor, escribe un número de tarjeta válido.",
                equalTo: "Por favor, escribe el mismo valor de nuevo.",
                accept: "Por favor, escribe un valor con una extensión aceptada.",
                maxlength: jQuery.validator.format("Por favor, no escribas más de {0} digitos."),
                minlength: jQuery.validator.format("Por favor, no escribas menos de {0} digitos."),
                rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
                range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
                max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
                min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
}); 

$('input[name="rut"]').mask("00.000.000-V", {
        reverse: !0,
        translation: {
            V: {
                pattern: /[0-9kK]/,
                optional: !0
            }
        }


});



$('[data-toggle="tooltip"]').tooltip();



$('form :input').each(function(){
            var input = $(this);
            if(input.prop("required")){
                var label = $(this).parent().find('label');
                label.text(label.text() + '  (*)')
               // var html = $(this).parent().find('label').text();
               // input.closest('label').html(html);
                 
            }
       });
});

// jQuery('.numbersOnly').keyup(function () { 
//                 this.value = this.value.replace(/[^0-9\.]/g,'');
//             });
//             
$('.numbersOnly').phoneNumber();

$.validator.addMethod("time24", function(value, element) { 
                     if (!/^\d{2}:\d{2}$/.test(value)) return false;
    var parts = value.split(':');
    if (parts[0] > 23 || parts[1] > 59 || parts[2] > 59) return false;
    return true;
                }, "Formato de hora no válido.");
				
function randomPassword(length) {
    var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
    var pass = "";
    for (var x = 0; x < length; x++) {
        var i = Math.floor(Math.random() * chars.length);
        pass += chars.charAt(i);
    }
    return pass;
}






$(document).ready(function () {

       
if (location.hash) {
                $('a[href=\'' + location.hash + '\']').tab('show');
  }
  var activeTab = localStorage.getItem('activeTab');
  if (activeTab) {
                $('a[href="' + activeTab + '"]').tab('show');
  }

  $('body').on('click', 'a[data-toggle=\'tab\']', function(e) {
                e.preventDefault()
                var tab_name = this.getAttribute('href')
                if (history.pushState) {
                                history.pushState(null, null, tab_name)
                } else {
                                location.hash = tab_name
                }
                localStorage.setItem('activeTab', tab_name)

                $(this).tab('show');
                return false;
  });


  $(window).on('popstate', function() {
                var anchor = location.hash ||
                                $('a[data-toggle=\'tab\']').first().attr('href');
                $('a[href=\'' + anchor + '\']').tab('show');
  });



jQuery.timeago.settings.strings = {
     prefixAgo: "hace",
     prefixFromNow: "dentro de",
     suffixAgo: "",
     suffixFromNow: "",
     seconds: "menos de un minuto",
     minute: "un minuto",
     minutes: "unos %d minutos",
     hour: "una hora",
     hours: "%d horas",
     day: "un día",
     days: "%d días",
     month: "un mes",
     months: "%d meses",
     year: "un año",
     years: "%d años"
  };

jQuery("time.timeago").timeago();

jQuery('textarea').summernote({
    lang: 'es-ES' // default: 'en-US'
  });

$('.singleDatePicker').daterangepicker(singleDatepickerOpt);

$('.boostrapDatePicker').datepicker({
     format: 'dd/mm/yyyy',
     language:'es',
     autoclose: true,
     clearBtn:true,
     orientation:'bottom'
});

$('[data-toggle=confirmation]').confirmation({
  rootSelector: '[data-toggle=confirmation]',
  // other options
});

var url = window.location;
var element = $('ul.nav a').filter(function() {
return this.href == url || url.href.indexOf(this.href) == 0;
}).addClass('active');//.parent().parent().addClass('in').parent();
$(element.parents()).each(function() {
if(this.className.indexOf('collapse') != -1) {
$(this).addClass('in');
}
});
element = element.parent().parent().parent();
if (element.is('li')) {
element.addClass('active');
}

    });




