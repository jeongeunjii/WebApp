function bigger() {
    var size = parseInt($("text").style.fontSize) + 2;
    $("text").style.fontSize = size + "pt";
}

function biggertimer () {
    setInterval(bigger, 500);
}

window.onload = function() {
    $("text").style.fontSize = "12pt";
    $("bling").onclick = check;
    $("upper").onclick = upper;
    $("bigger").onclick = biggertimer;
    $("pig").onclick = pig;
    $("mal").onclick = mal;
}

function check() {
    var bling = document.getElementById("bling");
    if (bling.checked) {
        text.style.fontWeight = "bold";
        text.style.color = "green";
        text.style.textDecoration = "underline";
        $("page").style.backgroundImage = "url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)";
    }
    else {
        text.style.fontWeight = "normal";
        text.style.color = "black";
        text.style.textDecoration = "none";
        $("page").style.backgroundImage = "none";
    }
}

function upper() {
    $("text").value = $("text").value.toUpperCase();
    var text = $("text").value.split(".");
    $("text").value = text.join("-izzle.");
}

function pig() {
    var texts = $("text").value.split(" ");
    for(var i=0;i<texts.length;i++){
        var word=[];
        var conso=[];
        for(var j=0;j<texts[i].length;j++){
        if(texts[i][j]=='a'||texts[i][j]=='e'||texts[i][j]=='i'||texts[i][j]=='o'||texts[i][j]=='u'){
            word = texts[i].slice(j);
            break;
        }
        else{
            conso += texts[i][j];
        }
        }
        texts[i] = word + conso + "ay";
    }
    $("text").value = texts.join(" ");
}

function mal() {
    var texts = $("text").value.split(" ");
    for(var i=0;i<texts.length;i++){
        if(texts[i].length >= 5) {
            texts[i] = "Malkovitch";
        }
    }
    $("text").value = texts.join(" ");
}
