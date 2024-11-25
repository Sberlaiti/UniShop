<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste produit</title>
    <link rel="stylesheet" href="listeproduit.css">
</head>

<body>
    <?php
        session_start();
        $connexion = new PDO('mysql:host=localhost;dbname=unishop', 'root', '');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ?>

    <label for="filtre"> filtre </label>
    <select id="select" name="option" onchange="categorie(this)">
        <?php
            $query = $connexion->prepare("SELECT idCategorie, nom FROM categorie");
            $query->execute();

            foreach ($query as $option)
            {
                echo"<option value=" . $option['idCategorie'] . ">" . $option['nom'] . "</option>";
            }
        ?>
    </select>

    <script>
        function reload()
        {
            location.reload();
        }

        function getid(id) 
        {
            document.cookie = "id = " + id;
            window.location.href = "../pageprod(quiproco)/pageProduit.php?id=" + id;
        }

        function add(i)
        {
            if(i<=98)
            {
                i++;
                document.cookie = "i = " + i;
                reload();
            }
        }

        function substract(i)
        {
            if(i>=1)
            {
                i--;
                document.cookie = "i = " + i;
                reload();
            }
        }

        function categorie(j)
        {
            const selectedValue=j.value;
            document.cookie="selectedValue =" + selectedValue;
            alert(selectedValue);
        }
    </script>
    
    <?php
        if (isset($_COOKIE['i'])) 
        {
            $_SESSION['i'] = htmlspecialchars($_COOKIE['i']);
        }

        if (isset($_COOKIE['selectedValue'])) 
        {
            $_SESSION['selectedValue'] = htmlspecialchars($_COOKIE['selectedValue']);
        }

        $query = $connexion->prepare("SELECT prix, nom, lien, idProduit FROM produit JOIN imageproduit ON imageproduit.idimage = produit.idimage;");
        $query->execute();
        $i=0;

        foreach ($query as $item)
        {
            echo"<div>
            <section id='" . $item['idProduit'] . "' onclick='getid(this.id)'>
            <img src='" . "image/" . $item['lien'] . "' width=100px height=100px>
            <p>" . $item['prix'] . "€</p>
            <p>" . $item['nom'] . "</p>
            </section>
            <form action='' method='post'>
                <button id='moin' onclick='substract(". $_SESSION['i'] .")'>-</button>
                <a>" . $_SESSION['i'] . "</a>
                <button id='plus' onclick='add(". $_SESSION['i'] .")'>+</button>
                <button>🛒 add to cart</button>
                <button>♡</button>
            </form>
            </div>";
        }
    ?>

    <?php
        if (isset($_COOKIE['id'])) 
        {
            $_SESSION['id'] = htmlspecialchars($_COOKIE['id']);
        }
    ?>
    
</body>

</html>