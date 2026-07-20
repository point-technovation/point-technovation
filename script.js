// script.js

// =========================
// Sticky Header Shadow
// =========================
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");

    if (window.scrollY > 50) {
        header.style.background = "#8B0000";
        header.style.boxShadow = "0 5px 20px rgba(0,0,0,.3)";
    } else {
        header.style.background = "#b30000";
        header.style.boxShadow = "none";
    }
});


// =========================
// Smooth Scroll
// =========================
document.querySelectorAll('nav a').forEach(anchor => {

    anchor.addEventListener('click', function(e){

        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior:'smooth'
        });

    });

});


// =========================
// Counter Animation
// =========================
const counters = document.querySelectorAll(".counter");

counters.forEach(counter=>{

    counter.innerText="0";

    const updateCounter=()=>{

        const target=+counter.getAttribute("data-target");

        const c=+counter.innerText;

        const increment=target/100;

        if(c<target){

            counter.innerText=`${Math.ceil(c+increment)}`;

            setTimeout(updateCounter,20);

        }else{

            counter.innerText=target;

        }

    }

    updateCounter();

});


// =========================
// Service Card Animation
// =========================
const cards=document.querySelectorAll(".card");

window.addEventListener("scroll",()=>{

cards.forEach(card=>{

const cardTop=card.getBoundingClientRect().top;

const trigger=window.innerHeight-100;

if(cardTop<trigger){

card.style.opacity="1";

card.style.transform="translateY(0)";

}

});

});

cards.forEach(card=>{

card.style.opacity="0";

card.style.transform="translateY(50px)";

card.style.transition="all .8s";

});


// =========================
// Contact Form Validation
// =========================
const form=document.querySelector("#contactForm");

if(form){

form.addEventListener("submit",function(e){

const name=document.querySelector("#name").value.trim();

const email=document.querySelector("#email").value.trim();

const phone=document.querySelector("#phone").value.trim();

const message=document.querySelector("#message").value.trim();

if(name=="" || email=="" || phone=="" || message==""){

alert("Please Fill All Fields");

e.preventDefault();

return;

}

const emailPattern=/^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

if(!email.match(emailPattern)){

alert("Enter Valid Email");

e.preventDefault();

return;

}

const phonePattern=/^[0-9]{10}$/;

if(!phone.match(phonePattern)){

alert("Enter Valid Mobile Number");

e.preventDefault();

return;

}

});

}


// =========================
// Scroll To Top Button
// =========================
const topBtn=document.createElement("button");

topBtn.innerHTML="⬆";

document.body.appendChild(topBtn);

topBtn.style.position="fixed";
topBtn.style.right="20px";
topBtn.style.bottom="20px";
topBtn.style.padding="12px 15px";
topBtn.style.border="none";
topBtn.style.background="#b30000";
topBtn.style.color="#fff";
topBtn.style.fontSize="20px";
topBtn.style.cursor="pointer";
topBtn.style.borderRadius="50%";
topBtn.style.display="none";
topBtn.style.zIndex="999";

window.addEventListener("scroll",()=>{

if(window.pageYOffset>300){

topBtn.style.display="block";

}else{

topBtn.style.display="none";

}

});

topBtn.addEventListener("click",()=>{

window.scrollTo({

top:0,

behavior:"smooth"

});

});


// =========================
// Loading Animation
// =========================
window.onload=function(){

document.body.style.opacity="0";

setTimeout(()=>{

document.body.style.transition="1s";

document.body.style.opacity="1";

},100);

};


// =========================
// Console Message
// =========================
console.log("Point Technovation Pvt. Ltd. Website Loaded Successfully");