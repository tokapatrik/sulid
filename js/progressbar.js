//Progress bar részei

const progress=document.getElementById("progressbar");
const start=document.getElementById("start");
const startbox=document.getElementById("regisztracio-start");
const regisztraciomain=document.getElementById("regisztracio-main");
const prevs = document.querySelectorAll("#prev");
const nexts = document.querySelectorAll("#next");
const circles = document.querySelectorAll(".circle");
const pages = document.querySelectorAll(".regisztracio-body");

let currentActive = 0;

start.addEventListener("click", ()=>{
    currentActive=1;
    startbox.classList.add("regisztracio-hide");
    regisztraciomain.classList.remove("regisztracio-hide");
    update();
})

nexts.forEach((next)=>
{
    next.addEventListener("click", ()=>{
        if(next.classList.contains("ok"))
        {
            currentActive++;
            nexts.forEach((nextt)=>
            {
                nextt.classList.remove("ok");
            })
        }
        if(currentActive>circles.length){
            currentActive=circles.length;
        }
        update();
    })
})

prevs.forEach((prev)=>
{
    prev.addEventListener("click", ()=>{
        currentActive--;
        if(currentActive<1){
            currentActive=1;
        }
        update();
    })
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
    pages.forEach((page, idx)=>
    {
        if(idx+1 == currentActive)
        {
            page.classList.add("regisztracio-body-active");
        }else
        {
            page.classList.remove("regisztracio-body-active");
        }
    })
progress.style.width=((currentActive-1)/ (circles.length-1))*100 +"%";
}