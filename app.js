var mybutton = document.getElementById("mybtn");
window.onscroll = function () {
    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
        mybutton.style.display = "flex";
        mybutton.style.animationName = "top";
    } else {
        mybutton.style.display = "none";
        mybutton.style.animationName = "top1"
    }
};
$(".drpanc.nv").on("mouseover",()=>{
    $(".drpdwn.nv").addClass("active");
})
$(".drpanc.nv").on("mouseout",()=>{
    $(".drpdwn.nv").removeClass("active");
})
$(".drpanc.asde").on("mouseover",()=>{
    $(".drpdwn.asde").addClass("active");
})
$(".drpanc.asde").on("mouseout",()=>{
    $(".drpdwn.asde").removeClass("active");
})
$(".clnv").on("click",()=>{
    $("aside").css("right","0px")
})
$("aside .clsbtn").on("click",()=>{
    $("aside").css("right","-420px")
})
$(".srch").on("click",()=>{
    $(".glsrch").fadeIn(500)
    $(".glsrch").css("display","flex")
})
$(".glsrch .clsbtn").on("click",()=>{
    $(".glsrch").fadeOut(500)
})