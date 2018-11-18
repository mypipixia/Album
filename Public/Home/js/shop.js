$(function () {
    var pris = 0,numpro = 0;

//全选按钮判断
    $("body").on('click','#pid',function () {
        if ($(this).prop("checked")) {
            $("input").prop("checked",true);
            add();
            $("#price").text(pris);
            $("#nums").text(numpro);
        }else {
            $("input").prop("checked",false);
            $("#price").text("0");
            $("#nums").text("0");
        }
    });

    function allse(){
        var a = true;
        $('[name="chex"]').each(function (i,e) {
            if (!$('[name="chex"]').eq(i).prop('checked')){
                a = false;
            }
        });
        if (a){
            $('#pid').prop('checked',true)
        } else {
            $('#pid').prop('checked',false)
        }
    }

    //单选按钮事件
    $("body").on("click","[name=chex]",function () {
        add();
        allse();
        $("#price").text(pris);
        $("#nums").text(numpro);
    });


    //对数量框进行实时监听
    $("body").on('input propertychange','[name="numlist"]',function () {
        var tis = $("#price").text();
        var tistwo = $("#nums").text();
        var inputlist = $(this).parents('.row').children().eq(0).children();
        var numsall = $(this).val();
        var price = $(this).parent().prevAll('.ps').text();
        var ps = parseFloat(numsall)*parseFloat(price);
        if ($(this).val().length == 0){
            $(this).val("1");
            $(this).parent().next().text(price);
            $("#price").text(tis);
            $("#nums").text(tistwo);
        }else {
            $(this).parent().next().text(ps);
        }
        add();
        if (inputlist.prop('checked')){
            $("#price").text(pris);
            $("#nums").text(numpro);
        }
        let index = $(this).parents('.row').children().eq(1).text();
        let nums =  $(this).val();
        $.ajax({
            type:'post',
            url:'upcar',
            data:{
                index:index,
                nums:nums
            },
        })
    });

    //累加
    function add(){
        pris = 0;
        numpro = 0;
        $('.xj').each(function (index,values) {
            if ($('[name="chex"]').eq(index).prop('checked')) {
                pris += parseFloat($('.xj').eq(index).text());
                numpro += parseFloat($('.dp input').eq(index).val());
            }
        });
    }


    //监听光标离开事件
    $("body").on("blur",'[name="numlist"]',function () {
        if ($(this).val().length == 0) {
            $(this).val("1");
        }
    });

//删除的交互效果
    $("body").on("mouseenter ",".bag",function () {
        $(this).addClass("backs");
    });
    $("body").on("mouseleave ",".bag",function () {
        $(this).removeClass("backs");
    });

    //删除
    $("body").on("click",".bag",function () {
            $(this).parents(".list-group-item").remove();
            add();
            $(".le>h3>span").text(pris);
            $('.list-group-item:not(:first-child)').each(function (index,value) {
                $(this).children().children().eq(1).text(index+1)
            });

        let index = $(this).parent().children('.xh').text();
        $.ajax({
            type:'post',
            url:'delcar',
            data:'index='+index,
            success(msg){
                console.log(msg);
            }
        })
    });
});