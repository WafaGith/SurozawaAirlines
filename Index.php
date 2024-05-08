<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surozawa Air</title>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('assets/1.jpg') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: background-image 0.5s ease;
        }
        
        .container {
            max-width: 90%;
            margin-bottom: 20px;
        }
        .logo img {
            width: 300px;
            height: auto;
            margin-bottom: 50px;
        }
        .overlay {
            padding: 20px;
            max-width: 300px;
            width: 100%;
            margin: auto;
            background: none; 
        }
        h1 {
            font-size: 3em;
            margin-bottom: 10px;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        p {
            font-size: 1.5em;
            margin-bottom: 20px;
            color: #555;
        }
        a {
            text-decoration: none;
            color: #fff;
            background-color: #00457F;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 20px;
            transition: all 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
        .white-text {
            color: #fff; 
        }
        
        /* carousel */
        .circle {
            border-radius: 100%;
        }

        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 800px; 
        }

        .inner {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch; 
        }

        .card {
            flex: 0 0 auto;
            width: 250px; 
            border-radius: 0.5em;
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
            scroll-snap-align: start;
        }

        .card > img {
            border-top-right-radius: inherit;
            border-top-left-radius: inherit;
            display: block;
            width: 100%;
            height: auto;
        }

        .card > .content {
            background: #0a2640;
            border-bottom-left-radius: inherit;
            border-bottom-right-radius: inherit;
            padding: 1em;
            text-align: center;
        }

        .card > .content > h1,
        .card > .content > h3 {
            margin: 0.35em 0;
        }

        .card > .content > h1 {
            color: #fff;
            font-size: 1.25rem;
            line-height: 1;
        }

        .card > .content > h3 {
            color: #ccc;
            font-size: 0.9rem;
            font-weight: 300;
        }

        .map {
            margin-top: 1em;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .map > button {
            all: unset;
            background: #001d38;
            cursor: pointer;
            border-radius: 100%;
            height: 1em;
            width: 1em;
            transition: background-color 0.3s;
        }

        .map > button.active {
            background: #0a2640;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="overlay">
            <div class="logo">
                <center><img src="assets/logo4.png" alt="Logoweb"></center>
            </div>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>    
        </div>
    </div>
    <div class="center">
        <div class="wrapper">
            <div class="inner">
                <div class="card">
                    <img src="assets/C1.png">
                    <div class="content">
                        <h1>Banjarmasin Makassar</h1>
                        <h3>Promo 30%</h3>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/C2.png">
                    <div class="content">
                        <h1>Jakarta Kediri</h1>
                        <h3>Promo 40%</h3>
                    </div>
                </div>
                <div class="card">
                    <img src="assets/C3.png">
                    <div class="content">
                        <h1>Makassar Kupang PP</h1>
                        <h3>Bayar Lebih Murah</h3>
                    </div>
                </div>
                                
                <!-- Add more cards as needed -->
            </div>
        </div>
        
        <div class="map">
            <button class="active first"></button>
            <button class="second"></button>
            <button class="third"></button>
        </div>
    </div>
</body>
<script>
    
    document.title = "Surozawa";
    const backgroundImageURLs = [
            'assets/1.jpg',
            'assets/2.jpg',
            'assets/3.jpg'
        ];

        let currentIndex = 0;

        // Dom untuk mengatur perpindahan background image
        function changeBackgroundImage() {
            document.body.style.backgroundImage = `url('${backgroundImageURLs[currentIndex]}')`;
            currentIndex = (currentIndex + 1) % backgroundImageURLs.length;
        }
        // waktu perpindahan background
        setInterval(changeBackgroundImage, 3000);


        //ini untuk mengatur corousell
const buttonsWrapper = document.querySelector(".map");
const slides = document.querySelector(".inner");

buttonsWrapper.addEventListener("click", e => {
  if (e.target.nodeName === "BUTTON") {
    Array.from(buttonsWrapper.children).forEach(item =>
      item.classList.remove("active")
    );
    if (e.target.classList.contains("first")) {
      slides.style.transform = "translateX(0)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains("second")) {
      slides.style.transform = "translateX(-100%)";
      e.target.classList.add("active");
    } else if (e.target.classList.contains('third')){
      slides.style.transform = 'translateX(-200%)';
      e.target.classList.add('active');
    }
  }
});

</script>
</html>
