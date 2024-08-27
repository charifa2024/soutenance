const statebutton=document.querySelectorAll(".state");
statebutton.forEach(button=>{
  button.addEventListener("click",()=>{
    if(button.innerHTML=="En Cours"){
    button.innerHTML="Terminé";
    button.style.backgroundColor="darkred";
    }
  else{
    button.innerHTML="En Cours";
    button.style.backgroundColor="darkgreen";
  }
  })
})