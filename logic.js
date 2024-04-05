var typed = new Typed(".auto-type", {
    strings: ["Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin", "Travel around the world", "Find your next stay", "Your world of joy", "Find your next rental", "Let the journey begin"],
    typeSpeed: 50,
    backSpeed: 50,
    looped: true,

})
// document.getElementById("home").style.background = "url('load.jpeg') no-repeat center center/cover";

function rotateBanner() {
    let val = 1;

    function next() {
        switch (val) {
            case 1:
                document.getElementById("home").style.background = "url('images/today1.jpg') no-repeat center center/cover";
                break;

            case 2:
                document.getElementById("home").style.background = "url('images/bambi-corro-VSnHXBD2Thc-unsplash.jpg') no-repeat center center/cover";
                break;

            case 3:
                document.getElementById("home").style.background = "url('images/eva-darron-oCdVtGFeDC0-unsplash.jpg') no-repeat center center/cover";
                break;

            case 4:
                document.getElementById("home").style.background = "url('images/today2.jpg') no-repeat center center/cover";
                break;

            case 5:
                document.getElementById("home").style.background = "url('images/nils-nedel-ONpGBpns3cs-unsplash.jpg') no-repeat center center/cover";
                break;

            case 6:
                document.getElementById("home").style.background = "url('images/philipp-kammerer-6Mxb_mZ_Q8E-unsplash.jpg') no-repeat center center/cover";
                break;

            case 7:
                document.getElementById("home").style.background = "url('images/today3.jpg') no-repeat center center/cover";
                break;

            case 8:
                document.getElementById("home").style.background = "url('images/aziz-acharki-QcnKOR3BZ-Y-unsplash.jpg') no-repeat center center/cover";
                val = 0; // Reset the counter to start from the first image again
                break;
        }
        val++; // Increment the counter after setting the background
    }

    next(); // Initially set the background
    setInterval(next, 7000); // Rotate the background every 7 seconds
}

rotateBanner();
