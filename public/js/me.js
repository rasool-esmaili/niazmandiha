//
// $(document).ready(function(){
//     $("#cat1").change(function(){
//         $("#form").attr("action", "search/" + $("#cat1").val()) ;
//     });
//
//
    $("#mark").click(function(){
        var id = $(this).attr("data-toggle");
        $.get("/user/mark", {userid: id}, function(result){
            $("#mark").attr("class",result);
            // $("#mark").html(result);
        });
    });

//     // $("#btn-delete").click(function(){
//     //     $.ajax("user/delete/photo","id:");
//     //     $("#photo").attr("src","");
//     //     $("#delete").attr("value","");
//     //
//     //
//     // });
//
//     $("#cat1").change(function (){
//         alert($("this").);
//     });
//
//
//
// });
//


function ChangeHandler(event){
    var i ;
    var cats = {
        "cat2" : [
            {"value" : "zero" , "text" : "  لطفا انتخاب نمایید ..."},
            {"value" : "by-home", "text" : "خرید خانه"},
            {"value" : "rental-home" , "text" : "اجاره مسکونی"},
            {"value" : "by-shop" , "text" : "خرید تجاری"},
            {"value" : "rental-shop", "text" : "اجاره تجاری" },
            {"value" : "villa" , "text" : "ویلا"}
        ],
        "cat3": [
            {"value" : "zero" , "text" : " لطفا انتخاب نمایید ..."},
            {"value" : "mobile", "text" : "موبایل و تبلت"},
            {"value" : "simcart" , "text" : "سیم کارت"},
            {"value" : "computer" , "text" : "کامپیوتر"},
            {"value" : "consol", "text" : "کنسول و بازی" },
            {"value" : "phone" , "text" : "تلفن رومیزی"}
        ],
        "cat4": [
            {"value" : "zero" , "text" : " لطفا انتخاب نمایید ..."},
            {"value" : "mobile", "text" : "موبایل و تبلت"},
            {"value" : "simcart" , "text" : "سیم کارت"},
            {"value" : "computer" , "text" : "کامپیوتر"},
            {"value" : "consol", "text" : "کنسول و بازی" },
            {"value" : "phone" , "text" : "تلفن رومیزی"}
        ]
    };
    var selectedCat = cats[event[event.selectedIndex].id];
    var selectedCatItems = document.getElementById("selectedCatItems");
    selectedCatItems.innerHTML ='';
    for(i = 0 ;i < selectedCat.length ; i++)
    {
        var option = document.createElement("option");
        option.text = selectedCat[i].text;
        option.value = selectedCat[i].value;
        selectedCatItems.add(option);
    }
    var formContent = {
        "cat2": '<div class="Form-item"><span> تعداد اتاق :</span> <input class="form-control" name="rooms" type="text"></div><div class="Form-item"><span>         قیمت اجاره :</span> <input class="form-control" name="rentprice" type="number"></div>',
        "cat3" : '<div class="Form-item"><span> برند :</span> <input class="form-control" name="brand" type="text"></div>',
        "cat4": '<div class="Form-item"><span> برند وسیله ی نقلیه :</span> <input class="form-control" name="brand_car" type="text"></div> <div class="Form-item"> <span>             کارکرد :</span> <input class="form-control" name="kilometre" type="text"></div><div class="Form-item"> <span> مدل :</span> <input class="form-control" name="model" type="text"></div>'
    };
    var formContainer = document.getElementById("formContainer");
    formContainer.innerHTML=" ";
    formContainer.innerHTML = (formContent[event[event.selectedIndex].id]);

}
function GetElementForm(event){

}