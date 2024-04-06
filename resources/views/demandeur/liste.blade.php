<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col s12">
                <h1>CRUD</h1>
                <a href="/ajouter" class="btn btn-primary">Ajouter un demandeur</a>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>BOULEKBACHE</td>
                            <td>Nadine</td>
                            <td>
                            <a href="#" class="btn btn-default">Modifier</a>
                            <a href="#" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>GALOU</td>
                            <td>Celina</td>
                            <td>
                            <a href="#" class="btn btn-default">Modifier</a>
                            <a href="#" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Abbas</td>
                            <td>Melissa</td>
                            <td>
                            <a href="#" class="btn btn-default">Modifier</a>
                            <a href="#" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>