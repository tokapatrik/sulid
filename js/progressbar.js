//Progress bar részei
const progress=document.getElementById("progressbar");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
const circles = document.querySelectorAll(".circle");

let currentActive =1;

next.addEventListener("click", ()=>{
    currentActive++;
    if(currentActive>circles.length){
        currentActive=circles.length;
    }
    update();
})

prev.addEventListener("click", ()=>{
    currentActive--;
    if(currentActive<1){
        currentActive=1;
    }
    update();
})

function update()
{
    circles.forEach((circle, idx)=>
    {
        if(idx < currentActive)
        {
            circle.classList.add("activec");
        }else
        {
            circle.classList.remove("activec");
        }
    })
progress.style.width=((currentActive-1)/ (circles.length-1))*100 +"%";
}
