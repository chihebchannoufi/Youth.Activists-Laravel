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
            <a class="navbar-brand" href="/">YOUTH ACTIVISTS</a>            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
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

    <div id="section1" class="container-fluid" style="padding:180px 50px;">
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div id="Formulaire">
            <form action="{{ route('inscription.store') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>

                <div class="col-md-6">
                    <label for="date" class="form-label">Date de naissance</label>
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>

                <div class="col-md-6">
                    <label for="lieu" class="form-label">Lieu de naissance</label>
                    <input type="text" class="form-control" name="lieu" id="lieu" required>
                </div>

                <div class="col-md-6">
                    <label for="résidence" class="form-label">Lieu de résidence</label>
                    <input type="text" class="form-control" name="résidence" id="résidence" required>
                </div>

                <div class="col-md-6">
                    <label for="genre" class="form-label">Genre :</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="male" value="Homme" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genre" id="female" value="Femme" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="mail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="mail" id="mail" required>
                </div>

                <div class="col-md-6">
                    <label for="tel" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" name="tel" id="tel" required>
                </div>

                <div class="col-md-12">
                    <label for="org" class="form-label">Pourquoi souhaitez-vous rejoindre l'organisation ?</label>
                    <textarea class="form-control" name="org" id="org" rows="3" required></textarea>
                </div>

                <div class="col-md-12">
                    <label for="compétence" class="form-label">Avez-vous des compétences? Mentionnez-les</label>
                    <textarea class="form-control" name="compétence" id="compétence" rows="2"></textarea>
                </div>

                <div class="col-md-12">
                    <label for="expérience" class="form-label">Avez-vous de l'expérience dans la société civile
                        ?</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="expérience" id="expérience_oui" value="oui"
                            required>
                        <label class="form-check-label" for="expérience_oui">Oui</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="expérience" id="expérience_non" value="non"
                            required>
                        <label class="form-check-label" for="expérience_non">Non</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="confirmation" class="form-label">Si la réponse est oui, mentionnez-le :</label>
                    <input type="text" class="form-control" name="confirmation" id="confirmation">
                </div>
                <div class="col-md-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    <button type="reset" class="btn btn-secondary">Annuler</button>
                </div>
            </form>
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
            <a href="https://www.linkedin.com/" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
    </div>
</body>

</html>