$(document).ready(function() {
    let animation = '<p>読み込み中</p><br><div class="loading"></div>';
    $("#animation").append(animation);
});

window.onload = function() {
    // Do something like show a loading animation
    $("div").remove("#animation");
};