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

            if (isset($_SESSION['user']['idUtilisateur'])) {
            $userId = $_SESSION['user']['idUtilisateur'];

            $query = $connexion->prepare("SELECT idPanier FROM panier WHERE idUtilisateur = :userId");
            $query->bindParam(':userId', $userId, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);

            if ($result) {
            $cartId = $result['idPanier'];
            } else {
            $insertQuery = $connexion->prepare("INSERT INTO panier (idUtilisateur) VALUES (:userId)");
            $insertQuery->bindParam(':userId', $userId, PDO::PARAM_INT);
            $insertQuery->execute();

            $cartId = $connexion->lastInsertId();
            }
            } else {
            $cartId = null;
            }
        ?>
    </section>

    <section id="filtre">
        <label for="filtre">Filtres:</label>
        <!--<select id="select" name="option" onchange="categorie(this)">
            <?php
                $query = $connexion->prepare("SELECT idCategorie, nomCategorie FROM categorie");
                $query->execute();

                foreach ($query as $option) {
                    echo "<option value='" . $option['idCategorie'] . "'>" . $option['nomCategorie'] . "</option>";
                }
            ?>
        </select>-->
        <br><label for="order">Prix :</label>
        <select id="order" name="order">
            <option value="2">decroissant</option>
            <option value="3">croissant</option>
        </select>
        
        <?php
            $query = $connexion->prepare("SELECT min(Prix) as min, max(Prix) as max FROM produit");
            $query->execute();
            $minmax = $query->fetch(PDO::FETCH_ASSOC);
            
            echo "<p><label id='outputmin'>Prix min:</label>";
            echo "<input type='number' min='" . $minmax['min'] . "' id='inputmin' placeholder='" . $minmax['min'] . "'></input>";
            echo "<br><input type='range' id='slidermin' class='min-range' min='" . $minmax['min'] . "' max='" . $minmax['max'] . "' value='" . $minmax['min'] . "' step='0.01' onchange='getMin()'>";
            echo "<br><label id='outputmax'>Prix max:</label>";
            echo "<input type='number' max='" . $minmax['max'] . "' id='inputmax' placeholder='" . $minmax['max'] . "'></input>";
            echo "<br><input type='range' id='slidermax' class='max-range' min='" . $minmax['min'] . "' max='" . $minmax['max'] . "' value='" . $minmax['max'] . "' step='0.01' onchange='getMax()'><p>";
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
            let val = parseInt(counter.value);
            if (val < 99) {
                val++;
                counter.value = val;
            }
        }

        function substract(productId) {
            const counter = document.getElementById(`nbchoose_${productId}`);
            let val = parseInt(counter.value);
            if (val > 0) {
                val--;
                counter.value = val;
            }
        }

        function sortProducts() {
            const order = document.getElementById('order').value;
            const products = Array.from(document.querySelectorAll('.product'));

            if (order === '1') {
            console.log("Aucun tri appliqué");
            return;
            }

            products.sort((a, b) => {
            const priceA = parseFloat(a.getAttribute('data-price'));
            const priceB = parseFloat(b.getAttribute('data-price'));

            if (order === '2') {
            return priceA - priceB;
            } else if (order === '3') {
            return priceB - priceA;
            }
            });

            const container = document.getElementById('prod');
            container.innerHTML = '';

            products.forEach(product => container.appendChild(product));
        }

        function categorie(j) {
            const selectedValue = j.value;
            document.cookie = "selectedValue=" + selectedValue;
            alert(selectedValue);
        }

        document.getElementById("inputmin").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                applyMin();
            }
        });

        function applyMin()
        {
            let inputElement = document.getElementById('inputmin');
            let value = inputElement.value || inputElement.getAttribute('placeholder');
            document.getElementById("slidermin").value=value;
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

            document.getElementById('inputmin').placeholder = parseFloat(elementsmin.value).toFixed(2);
            document.getElementById('inputmin').value = "";
        }

        document.getElementById("inputmax").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                applyMax();
            }
        });

        function applyMax()
        {
            let inputElement = document.getElementById('inputmax');
            let value = inputElement.value || inputElement.getAttribute('placeholder');
            document.getElementById("slidermax").value=value;
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

            document.getElementById('inputmax').placeholder = parseFloat(elementsmax.value).toFixed(2);
            document.getElementById('inputmax').value = "";
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

            sortProducts();
            localStorage.removeItem("searchQuery");
        }

        searchbar=document.querySelector("input");
        searchbar.addEventListener('keydown', function (e) 
        {
            if (e.key === 'Enter') 
            {
                e.preventDefault();
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
       
        <?php if (isset($_SESSION['user']['idUtilisateur'])): ?>
        const idUser = <?php echo json_encode($_SESSION['user']['idUtilisateur']); ?>;
        <?php else: ?>
        const idUser = null;
        <?php endif; ?>
        <?php if (isset($cartId)): ?>
        const idCart = <?php echo json_encode($cartId); ?>;
        <?php else: ?>
        const idCart = null;
        <?php endif; ?>

        function addToCart(productId) {
            const counter = document.getElementById(`nbchoose_${productId}`);
            let nbSelected = parseInt(counter.value);
            if (nbSelected < 0) {
                nbSelected=0;
            }
            if (nbSelected > 99) {
                nbSelected=99;
            }
            idUser;
            idCart;

            $.ajax({
                url: 'http://localhost/unishop/src/addToCart.php',
                type: 'POST',
                data: {
                    productId: productId,
                    quantity: nbSelected,
                    userId: idUser,
                    cartId: idCart
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
        
        //attent que la page soit charger pour executer ces ligne
        document.addEventListener("DOMContentLoaded", function () {
            console.log(localStorage.getItem('searchQuery'));
            
            if (localStorage.getItem('searchQuery') !== null) {
                search(localStorage.getItem('searchQuery'));
            }
        });

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

            echo "<div class='temp'>";
                foreach ($query as $item) {
                    echo "<a href='pageArticle.php?idProduit=" . $item['idProduit'] . "'>";
                    echo "<div class='product' data-price='" . $item['prix'] . "' onclick='getid(this.id)'>
                            <section id='" . $item['idProduit'] . "'>
                                <img src='" . $item['lien'] . "' width=100px height=100px>
                                <p id='namep'>" . $item['nomProduit'] . "</p>
                                <p>" . $item['prix'] . "€</p>
                            </section>
                            <section class='plmn'>
                                <button id='moin_" . $item['idProduit'] . "' onclick='event.stopPropagation(); substract(" . $item['idProduit'] . ")'>-</button>
                                <input type='number' id='nbchoose_" . $item['idProduit'] . "' value='0' min='0' max='99' onclick='event.stopPropagation()'>
                                <button id='plus_" . $item['idProduit'] . "' onclick='event.stopPropagation(); add(" . $item['idProduit'] . ")'>+</button>
                            </section>
                            <button id='bcart' onclick='event.stopPropagation(); addToCart(" . $item['idProduit'] . ")'>Ajouter au panier</button>
                        </div>";
                    echo "</a>";
                }
            echo "</div>";


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
