//bookmark post
$("#mark").click(function(){
        var id = $(this).attr("data-toggle");
        $.get("/user/mark", {userid: id}, function(result){
            $("#mark").attr("class",result);
            // $("#mark").html(result);
        });
    });
//delete photo
$("#btn-delete").click(function(){
    $.post("user/delete/photo",{'id': '15'},{success:function (status){alert('eyvall')} } );
});


//for new page
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
            {"value" : "car", "text" : "خودرو"},
            {"value" : "heavy-car" , "text" : "خودرو سنگین"},
            {"value" : "car-part" , "text" : "قطعات خودرو"},
            {"value" : "motor", "text" : "موتور" },
            {"value" : "boat" , "text" : "قایق"}
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

 //
 // $(document).ready(function(){
 //     $("#cat1").change(function(){
 //         $("#form").attr("action", "search/" + $("#cat1").val()) ;
 //     });
 //
 //