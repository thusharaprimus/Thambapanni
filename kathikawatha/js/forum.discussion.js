var replyModel = $('#replyModel');
var submitModel = "submitModel";
var replayform = $('#replayform');
var parentId = null;
var topicId = $('#topicId').text();

//rest the form when close the model
replyModel.on('hidden.bs.modal', function(e) {
    document.getElementById("replayform").reset();
});

function ajaxReply(parent_id) {
    parentId = parent_id;
    replyModel.modal('toggle');
}

//model Post to forum button
replyModel.on("click", "." + submitModel, function() {
    var formData = replayform.serialize() + "&parentId=" + parentId +
        "&topicId=" + topicId + "&action=postToForum";
    $.ajax({
        type: "POST",
        url: "form.controller.php",
        data: formData,
        dataType: "json",
        success: function(response) {
            if (response.status == "success") {
                replyModel.modal('toggle');
                load_reply();
            } else {
                alert("Unexpected error , Please try again");
            }
        },
        // debugging purposes
        error: function(xhr, status, error) {
            console.log(xhr);
            alert("Unexpected error");
            console.log(status, error);
        }
    });
});

function show_replys(reply_json) {
    $("#replytopLevel").empty();
    reply_json.forEach(function(value) {
        if (value.parent_post == -1) {
            value.parent_post = "topLevel";
        }
        $("#reply" + value.parent_post).append(
            '<div id =' + value.id + ' class="thread-topic-content">' +
            '<p class="topic-date">' + moment(value.post_date).fromNow() + '</p>' +
            '<div class="row"><div class="col-xs-push-1 col-xs-11"><p>' + value.post_content + '</p></div></div>' +
            '<div class="row"><div class="col-xs-push-11 col-xs-1"><a class="btn btn-default btn-xs" onclick = "ajaxReply(' + value.post_id + ')"  > Reply </a></div></div>' +
            '</div><div style="margin-left:15px" id= reply' + value.post_id + '>');
    });
}

function load_reply() {
    $.ajax({
        type: "POST",
        url: "form.controller.php",
        data: {
            action: "getReply",
            topicId: topicId
        },
        dataType: "json",
        success: function(response) {
            console.log(response);
            if (response.status == "success") {
                show_replys(response.result);
            } else {
                alert("Unexpected error , Please try again");
            }
        },
        // debugging purposes
        error: function(xhr, status, error) {
            console.log(xhr);
            alert("Unexpected error");
            console.log(status, error);
        }
    });
}

$(document).ready(function() {
    load_reply();
});