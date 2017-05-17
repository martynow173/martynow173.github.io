n = 1;
max = 9;
var mas =[1,2,3,4,5,6,7];




function mainpic (i) {
    x = document.getElementById("slider");   
    x.innerHTML =' <img src="images/pic-'+i+'.jpg"> ' +
    '<div id="leftarrow">' +
                        '<a href="javascript:void(0);" onclick="javascript:back(1);"><img id="larrow" src="images/larrow.png"/></a> ' +
                    '</div>' +
                    '<div id="rightarrow">' +
                        '<a href="javascript:void(0);" onclick="javascript:forward(1);"><img id="rarrow" src="images/rarrow.png"/></a> ' +
                    '</div>';
    return;
}
function back (j) {
    t = document.getElementById("slider");   
    r = n - j;
    n = n - j;
    if (n < 1) {
        n = 1;
        return;
    }
    t.innerHTML =' <img src="images/pic-'+r+'.jpg"> ' +
    '<div id="leftarrow">' +
        '<a href="javascript:void(0);" onclick="javascript:back(1);"><img id="larrow" src="images/larrow.png"/></a> ' +
    '</div>' +
    '<div id="rightarrow">' +
        '<a href="javascript:void(0);" onclick="javascript:forward(1);"><img id="rarrow" src="images/rarrow.png"/></a> ' +
    '</div>';
    
    return n;
}
function forward (j) {
    z = document.getElementById("slider");   
    r = n + j; 
    n = n + j;
    if (n > max) {
        n = max;
        return;
    }
    z.innerHTML =' <img src="images/pic-'+r+'.jpg"> '+
    '<div id="leftarrow">' +
        '<a href="javascript:void(0);" onclick="javascript:back(1);"><img id="larrow" src="images/larrow.png"/></a> ' +
    '</div>' +
    '<div id="rightarrow">' +
        '<a href="javascript:void(0);" onclick="javascript:forward(1);"><img id="rarrow" src="images/rarrow.png"/></a> ' +
    '</div>';
    return n;
}

function minforward (c) {
    z = document.getElementById("min");   
    for (i = 0; i < 7; i++) {
        mas[i] = mas[i] + c;
        if (mas[i] > max) {
            for (j = i; j >= 0; j--) {
                mas[j] = mas[j] - c;
            }
            return; 
        }
    }
        
z.innerHTML = '<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[0]+');"><img src="images/pic-'+mas[0]+'.jpg" /></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[1]+');"><img src="images/pic-'+mas[1]+'.jpg" /></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[2]+');"><img src="images/pic-'+mas[2]+'.jpg"/></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[3]+');"><img src="images/pic-'+mas[3]+'.jpg" /></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[4]+');"><img src="images/pic-'+mas[4]+'.jpg" /></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[5]+');"><img src="images/pic-'+mas[5]+'.jpg" /></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[6]+');"><img src="images/pic-'+mas[6]+'.jpg" /></a>' + 
'</div> ';
    return mas;
}

function minback (c) {
    z = document.getElementById("min");   
    for (i = 0; i < 7; i++) {
        if (mas[i] <= 1) {
            return;
        }
        mas[i] = mas[i] - c;
    }
z.innerHTML = '<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[0]+');"><img src="images/pic-'+mas[0]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[1]+');"><img src="images/pic-'+mas[1]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[2]+');"><img src="images/pic-'+mas[2]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[3]+');"><img src="images/pic-'+mas[3]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[4]+');"><img src="images/pic-'+mas[4]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="small">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[5]+');"><img src="images/pic-'+mas[5]+'.jpg" width="60"/></a>' + 
'</div>' + 
'<div class="big">' + 
'<a href="javascript:void(0);" onclick="javascript:mainpic('+mas[6]+');"><img src="images/pic-'+mas[6]+'.jpg" width="60"/></a>' + 
'</div> ';
    return mas;
}