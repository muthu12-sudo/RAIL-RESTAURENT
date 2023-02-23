var spanElement = document.getElementById('span_color');
var target = document.getElementById('target');
var spanColor = window.getComputedStyle(spanElement).color;

if (spanColor === 'rgb(0, 128, 0)') {
    alert('Details Submitted Successfully');
    setTimeout(function() {
        window.location.href = "payments.php";
    }, 5000);
    target.focus();
}

var select1 = document.getElementById("from");
var select2 = document.getElementById("to");

select1.addEventListener("change", function() {
    var selectedValue = select1.value;

    for (var i = 0; i < select2.options.length; i++) {
        var option = select2.options[i];
        if (option.value === selectedValue) {
            option.disabled = true;
        } else {
            option.disabled = false;
        }
    }
});