
let responsiveImgs = document.querySelectorAll('.normal-stories figure');
responsiveImgs.forEach((figure) => {
    let mywidth = figure.offsetWidth;
    let myHeight =  Math.floor(mywidth/3*2)+"px"
    figure.style.height = myHeight;
    heightfix(figure);
});

let responsiveFeatureImgs = document.querySelectorAll('.feature-story figure');
responsiveFeatureImgs.forEach(function(figure){
    heightfix(figure);
});

function heightfix(figure){

    let myHeight = figure.offsetHeight;
    let myWidth = figure.offsetWidth;

    let child = figure.querySelector('.img-fluid');
    child.style.height = myHeight+"px";

    setTimeout(function() {
        widthFix(child, myWidth)
    }, 500)
}

function widthFix(child, myWidth){

    if(child.offsetWidth < myWidth){
        child.style.height = "auto";
        child.style.width = myWidth+"px";
    }


}



