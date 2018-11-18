$(function () {
    $("#mytab a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });

    $("#mytabs a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });

    $("#mytabss a").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });

    $('#files').change(function () {
        let files = this.files[0];
        let ready = new FileReader();
        ready.readAsDataURL(files);
        ready.onload = function () {
            $('#forimg').attr('src',ready.result)
        }
    });

    $('#upfile').change(function () {
        let files = this.files[0];
        let ready = new FileReader();
        ready.readAsDataURL(files);
        ready.onload = function () {
            $('#upforimg').attr('src',ready.result)
        }
    });

    $('#allchex').click(function () {
        if ($(this).prop('checked')){
            $('[name="id"]').prop('checked',true)
        }else {
            $('[name="id"]').prop('checked',false)
        }
    });
});