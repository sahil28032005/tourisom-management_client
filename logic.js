var typed = new Typed(".auto-type", {
    strings: ["Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin"],
    typeSpeed: 50,
    backSpeed: 50,
    looped: true,

})
document.getElementById("home").style.background = "url('load.jpeg') no-repeat center center/cover";

function rotateBanner() {
    document.getElementById("home").style.background = "url('load.jpg') no-repeat center center/cover";

    let val = 1;

    function next() {
        document.getElementById("home").style.background = "url('load.jpeg') no-repeat center center/cover";
        

        switch (val) {
            case 1:
               
               
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?Mumbai,india') no-repeat center center/cover";

                val++;
                break;

            case 2:
              
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?england') no-repeat center center/cover";

                val++;
                break;

            case 3:
             
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?singapour') no-repeat center center/cover";
               
                val++;
                break;

            case 4:
          
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?tajmahal') no-repeat center center/cover";

                val++;
                break;

            case 5:
              
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?sunset') no-repeat center center/cover";

                val++;
                break;

            case 6:
                
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?waterfalls') no-repeat center center/cover";

                val++;
                break;

            case 7:
               
                document.getElementById("home").style.background = "url('https://source.unsplash.com/random/1500x900/?world heritage') no-repeat center center/cover";
    
                val=1;
                break;
        }
    }
    next();
    setInterval(next, 7000);

}



rotateBanner();



function grdreg(a){
    a.style.width="300px";
 a.style.height="400px";
}

