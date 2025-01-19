<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste produit</title>
    <link rel="stylesheet" href="./css/listeproduit.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    
    <section id="header">
        <?php
            require("header02.php");
            $connexion = new PDO('mysql:host=localhost;dbname=unishop', 'root', '');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        ?>
    </section>

    <section id="filtre">
        <label for="filtre">Filtres</label>
        <!--<select id="select" name="option" onchange="categorie(this)">
            <?php
                $query = $connexion->prepare("SELECT idCategorie, nomCategorie FROM categorie");
                $query->execute();

                foreach ($query as $option) {
                    echo "<option value='" . $option['idCategorie'] . "'>" . $option['nomCategorie'] . "</option>";
                }
            ?>
        </select>-->
        <br><label for="oder">ordre :</label>
        <select id="order" name="order">
            <option value="1">aucun</option>
            <option value="2">decroissant</option>
            <option value="3">croissant</option>
        </select>
        
        <?php
            $query = $connexion->prepare("SELECT min(Prix) as min, max(Prix) as max FROM produit");
            $query->execute();
            $minmax = $query->fetch(PDO::FETCH_ASSOC);
            
            echo "<p><label id='outputmin'>Prix min: " . $minmax['min'] . "</label>";
            echo "<br><input type='range' class='min-range' min='" . $minmax['min'] . "' max='" . $minmax['max'] . "' value='" . $minmax['min'] . "' step='0.01' onchange='getMin()'>";
            echo "<br><label id='outputmax'>Prix max: " . $minmax['max'] . "</label>";
            echo "<br><input type='range' class='max-range' min='" . $minmax['min'] . "' max='" . $minmax['max'] . "' value='" . $minmax['max'] . "' step='0.01' onchange='getMax()'><p>";
        ?>
        
        <button onclick="applyFilters()">Appliquer les filtre</button>
    </section>

    <script>
        let fav =[];

        function reload() {
            location.reload();
        }

        function getid(id) {
            document.cookie = "id = " + id;
            window.location.href = "./pageArticle.php?idProduit=" + id;
        }

        function add(productId) {
            const counter = document.getElementById(`nbchoose_${productId}`);
            let val = parseInt(counter.textContent);
            if (val < 99) {
                val++;
                counter.textContent = val;
            }
        }

        function substract(productId) {
            const counter = document.getElementById(`nbchoose_${productId}`);
            let val = parseInt(counter.textContent);
            if (val > 0) {
                val--;
                counter.textContent = val;
            }
        }

        function categorie(j) {
            const selectedValue = j.value;
            document.cookie = "selectedValue=" + selectedValue;
            alert(selectedValue);
        }

        function getMin() 
        {
            let elementsmin = document.getElementsByClassName("min-range")[0];
            let elementsmax = document.getElementsByClassName("max-range")[0];

            let minValue = parseFloat(elementsmin.value);
            let maxValue = parseFloat(elementsmax.value);

            if (minValue > maxValue) 
            {
                elementsmin.value = maxValue;
            }

            document.getElementById('outputmin').innerHTML = 'Prix min: ' + parseFloat(elementsmin.value).toFixed(2);
        }

        function getMax() 
        {
            let elementsmax = document.getElementsByClassName("max-range")[0];
            let elementsmin = document.getElementsByClassName("min-range")[0];

            let maxValue = parseFloat(elementsmax.value);
            let minValue = parseFloat(elementsmin.value);

            if (maxValue < minValue) 
            {
                elementsmax.value = minValue;
            }

            document.getElementById('outputmax').innerHTML = 'Prix max: ' + parseFloat(elementsmax.value).toFixed(2);
        }

        function applyFilters() 
        {
            const minPrice = parseFloat(document.getElementsByClassName("min-range")[0].value);
            const maxPrice = parseFloat(document.getElementsByClassName("max-range")[0].value);
            
            const products = document.querySelectorAll('.product');

            products.forEach(function(product) 
            {
                const productPrice = parseFloat(product.getAttribute('data-price'));

                if (productPrice >= minPrice && productPrice <= maxPrice) 
                {
                    product.style.display = 'block';
                } 
                else 
                {
                    product.style.display = 'none';
                }
            });

            temp=document.getElementById("order");
            console.log(temp.value);
        }

        searchbar=document.querySelector("input");
        searchbar.addEventListener('keydown', function (e) 
        {
            if (e.key === 'Enter') 
            {
                search(searchbar.value);
            }
        });

        function search(e) {
            let searchInput = e.toLowerCase();
            const products = document.querySelectorAll('.product');

            products.forEach(function(product) {
                const productName = product.querySelector('#namep').textContent.toLowerCase();

                if (productName.includes(searchInput)) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }

        

        function addToCart(productId) {
            const counter = document.getElementById(`nbchoose_${productId}`);
            let nbSelected = parseInt(counter.textContent);
            const idUser = 5555;

            $.ajax({
                url: 'http://localhost/unishop/src/addToCart.php',
                type: 'POST',
                data: {
                    productId: productId,
                    quantity: nbSelected,
                    userId: idUser
                },
                success: function(response) {
                    alert('Produit ajouté au panier avec succès !');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    alert('Une erreur est survenue lors de l\'ajout au panier.');
                    console.error('Erreur :', error);
                }
            });
        }



    </script>
    
    <section id="prod">
        <?php
            if (isset($_COOKIE['i'])) {
                $_SESSION['i'] = htmlspecialchars($_COOKIE['i']);
            }

            if (isset($_COOKIE['selectedValue'])) {
                $_SESSION['selectedValue'] = htmlspecialchars($_COOKIE['selectedValue']);
            }

            $query = $connexion->prepare("SELECT produit.prix, produit.nomProduit, image.lien, produit.idProduit 
                               FROM produit 
                               JOIN image ON image.idimage = produit.idimage;");

            $query->execute();

            foreach ($query as $item) {
                echo "<div class='product' data-price='" . $item['prix'] . "'>
                        <section id='" . $item['idProduit'] . "' onclick='getid(this.id)'>
                            <img src='" . $item['lien'] . "' width=100px height=100px>
                            <p>" . $item['prix'] . "€</p>
                            <p id='namep'>" . $item['nomProduit'] . "</p>
                        </section>
                        <button id='moin_" . $item['idProduit'] . "' onclick='substract(" . $item['idProduit'] . ")'>-</button>
                        <a id='nbchoose_" . $item['idProduit'] . "'>0</a>
                        <button id='plus_" . $item['idProduit'] . "' onclick='add(" . $item['idProduit'] . ")'>+</button>
                        <button onclick='addToCart(" . $item['idProduit'] . ")'>🛒 Ajouter au panier</button>
                        <button onclick='addToFav(" . $item['idProduit'] . ")'>♡</button>
                      </div>";
            }
        ?>
    </section>
    
    <?php
        if (isset($_COOKIE['id'])) {
            $_SESSION['id'] = htmlspecialchars($_COOKIE['id']);
        }

        if (isset($_COOKIE['idUser'])) {
            $_SESSION['idUser'] = htmlspecialchars($_COOKIE['idUser']);
        }
               
        if (isset($_COOKIE['nbselected'])) {
            $_SESSION['nbselected'] = htmlspecialchars($_COOKIE['nbselected']);
        }

        if (isset($_COOKIE['productId'])) {
            $_SESSION['productId'] = htmlspecialchars($_COOKIE['productId']);
        }
        //var_dump($_SESSION['idUser']);
        //var_dump($_SESSION['nbselected']);
        //var_dump($_SESSION['productId']);

    ?>      
</body>
</html>
