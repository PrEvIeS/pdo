$(document).ready(function () {
    let placeholder = Array.from(document.getElementsByClassName("placeholder"));
    Array.from(document.getElementsByClassName("cut")).forEach((el, index) => {
        if (Number.parseInt(window.getComputedStyle(placeholder[index]).getPropertyValue("width")) > 100) {
            el.style.width = (Number.parseInt(window.getComputedStyle(placeholder[index]).getPropertyValue("width")) - 20) + "px";
        }
        else
            el.style.width = (Number.parseInt(window.getComputedStyle(placeholder[index]).getPropertyValue("width")) + 20) + "px";

    })
    Array.from(document.getElementsByClassName("select")).forEach(el=>{
        el.addEventListener("click",()=>{
            console.log(el.value);
            if(el.value!=null && el.value!=""){
                el.classList.add("select-checked");
            }
            else{
                el.classList.remove("select-checked");
            }
        })
    })
    $('#DATE').datepicker({
        format: "dd.mm.yyyy",
        language: "ru"
    });
    $(document).on('click','#addMember',function (e) {
        e.preventDefault();
        $(".member").clone().appendTo(".members");
    });
    $('.form').submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
        }).done(function (response) {
            alert('Заявка успешно принята!');
        }).fail(function (jqXHR, textStatus, error) {
            alert(jqXHR.responseJSON.message);
        });
    });
});