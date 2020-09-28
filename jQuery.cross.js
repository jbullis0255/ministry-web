$(document).ready(function() {
//validate contact us form
var error = "Please fill in this field correctly!!";
$("#name").on("keyup", function() {
let alpher = /^([a-zA-Z_]+( [a-zA-Z_]+)|[a-zA-Z_]+( [a-zA-Z_])+( [a-zA-Z_]+))*$/;
if(!$(this).val().match(alpher)) {
$(this).css({border: '2px solid red'});
$(this).focus();
$(".name").text(error);

}else {
$(".name").text("");
$(this).css({border: '2px solid green'});
}
});
$("#phoneNumber").on("keyup", function() {
let dis = /^([+])([0-9]{12})*$/;
if(!$(this).val().match(dis)) {
$(this).css({border: '2px solid red'});
$(".phoneNumber").text(error);
$(this).focus();
}else {
$(".phoneNumber").text("");
$(this).css({border: '2px solid green'});
}
});
$("#email").on("keyup", function() {
let nat = /^[a-z0-9-.]{1,30}@[a-z]{1,65}.(com|net|org|biz|info|([a-z]{2,3}.[a-z]{2}))*$/;
if(!$(this).val().match(nat)) {
$(this).css({border: '2px solid red'});
$(this).focus();
$(".email").text(error);
}else {
$(".email").text("");
$(this).css({border: '2px solid green'});
}
});
$("#message").on("keyup", function() {
let com = /^([a-zA-Z]|[a-zA-Z_]+( [a-zA-Z_]+)|[a-zA-Z_]+( [a-zA-Z_])+( [a-zA-Z_]+))*$/;
if(!$(this).val().match(com)) {
$(this).css({border: '2px solid red'});
$(this).focus();
$(".message").text(error);
}else {
$(".message").text("");
$(this).css({border: '2px solid green'});
}
});
//send the message from user with ajax
$("#userMessage").on("submit", function(e) {
    e.preventDefault();
    $data = $(this).serializeArray();
    $.ajax({
        url: "send-message",
        type: 'POST',
        data: $data,
        beforeSend: function() {
            $(".sendMessage").html("<span class='spinner-border spinner-sm'></span>sending...");
        },
        success: function(data) {
            $(".response").html(data);
        },
        complete: function() {
            $(".sendMessage").text("Send");
        }
    });

});
});