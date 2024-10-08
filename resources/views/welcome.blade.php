<!DOCTYPE html>
<html lang="en">

<head>
    <title>Youth Activists</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center fixed-top">
        <div class="container-fluid">
            <img src="logo/youth.png" alt="Logo" style="width:40px;" class="rounded-pill">
            <a class="navbar-brand" href="/">
                YOUTH ACTIVISTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#section1">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section2">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section3">Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#section4">Contact</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                        <span><i class="fa-solid fa-gear"></i></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('login') }}" class="dropdown-item"><span><i class="fa-solid fa-lock"> espace membre</i></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div id="section1" class="container-fluid " style="padding:180px 50px;">
        <center>
            <p class="h1" id="p1">Welcome to Youth Activists!</p>
            <p class="h2" id="p2">Nonprofit Organization </p>
            <a href="{{ route('inscription') }}" class="btn btn-outline-info" id="p2" >Join Us</a>
        </center>
    </div>

    <div id="section2" class="container-fluid " style="padding:100px 20px;">
        <center>
            <h1>About Us </h1>
        </center>
        <br><br>
        <table>
            <tr>
                <td id="p">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis numquam ipsum quasi
                    dolorem impedit veritatis facilis veniam, minus, amet dignissimos, possimus sunt vitae vel fugiat
                    esse eligendi iure quibusdam labore?</td>
                <td><img src="logo/Youthh.jpg" alt="YOUTH"></td>
            </tr>
            <tr>
                <td><img src=" logo/youth1.jpg" id="image" alt="YOUTH"></td>
                <td id="p">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam ullam vel dolore tempora
                    unde neque. Qui magni voluptatum officiis dolores veritatis officia esse ipsum voluptatem voluptates
                    dignissimos, eum, provident possimus.</td>
            </tr>
        </table>
    </div>

    <div id="section3" class="container-fluid " style="padding:100px 20px;">
        <center>
            <h1>Our Clubs</h1>
        </center>
        <div class="clubs">
            <div class="club">
                <h1>Young Activists</h1>
                <img src="logo/young.jpg" alt="Young">
                <p id="p">A group of high school students driven by the desire to help, participate, and move forward.
                </p>
            </div>
            <br><br>
            <div class="club">
                <h1>Peace Makers</h1>
                <img src="logo/peace.png" alt="peace">
                <p id="p">a club dedicated to young individuals aged 15 to 25 who want to learn, positively inspire
                    society, and contribute to their community. Together, let's champion the values of humanity and
                    peace and work towards a better world.</p>
            </div>
            <br>
            <div class="club">
                <h1>Robots</h1>
                <img src="logo/robot.png" alt="robot">
                <p id="p">Musti Robots Club is where aspiring engineers explore their passion for robotics. It's the
                    place where creativity and innovation come together to shape the future.</p>
            </div>
        </div>
    </div>
    <div id="section4" class="container-fluid  container" style="padding:100px 20px;">
        <header class="header">
            <h2>Get in touch</h2>
            <p>Do you have a project in your mind? Contact Us here</p>
        </header>
        <div class="content">
            <div class="contact-info">
                <h3>Find Us</h3>
                <div class="info-item">
                    <i class="fa-regular fa-envelope"></i>
                    <span>
                        <a href="mailto:mustiyouthactivists@gmail.com" id="lien">mustiyouthactivists@gmail.com</a>
                    </span>
                    </div>
                <div class="info-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>+216 92 301 305</span>
                </div>
            </div>
            <form class="contact-form" action="{{ route('message.store') }}" method="POST">
                @csrf
                <div class="form-group" >
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Name" required >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Message" required ></textarea>
                </div>
                <button type="submit" class="submit-button">
                    Send
                    <i class="fa-regular fa-paper-plane"></i>
                </button>
            </form>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>

    <div class="mt-5 p-3 bg-dark text-white text-center">
        <p>Copyright © Youth Activists</p>
        <div>
            <a href="https://www.facebook.com/" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
    
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>

        ScrollReveal().reveal('#section1', {
            duration: 2000,
            origin: 'top',
            distance: '50px',
            easing: 'ease-in-out',
            reset: true
        });

        ScrollReveal().reveal('#section2 h1', {
            duration: 2000,
            origin: 'left',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true
        });

        ScrollReveal().reveal('#section2 table td', {
            duration: 2000,
            origin: 'bottom',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true,
            interval: 200
        });

        ScrollReveal().reveal('#section3 h1', {
            duration: 2000,
            origin: 'left',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true
        });

        ScrollReveal().reveal('.club', {
            duration: 2000,
            origin: 'bottom',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true,
            interval: 200
        });

        ScrollReveal().reveal('.header', {
            duration: 2000,
            origin: 'top',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true
        });

        ScrollReveal().reveal('.contact-info', {
            duration: 2000,
            origin: 'left',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true
        });

        ScrollReveal().reveal('.contact-form', {
            duration: 2000,
            origin: 'right',
            distance: '20px',
            easing: 'ease-in-out',
            reset: true
        });
    </script>

</body>

</html>