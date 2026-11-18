
<?php
include('connection.php');

$sql = "SELECT * FROM gallery ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: #f8f7ef;
    color: #173d2b;
}

.gallery-section {
    width: 100%;
    padding: 65px 7%;
}

.gallery-heading {
    text-align: center;
    margin-bottom: 45px;
}

.sub-title {
    color: #829b65;
    font-size: 13px;
    font-weight: bold;
    letter-spacing: 4px;
}

.gallery-heading h1 {
    font-size: 42px;
    margin: 15px 0;
    font-family: Georgia, serif;
}

.gallery-heading h1 span {
    color: #73904d;
    font-style: italic;
}

.gallery-heading p {
    color: #777;
    font-size: 15px;
    line-height: 1.8;
}

/* Gallery Grid */

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.gallery-item {
    height: 280px;
    position: relative;
    overflow: hidden;
    border-radius: 13px;
    cursor: pointer;
    background: #ddd;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .5s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    inset: 0;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    padding: 25px;
    color: white;
    background: linear-gradient(
        transparent 35%,
        rgba(0, 35, 19, .85)
    );
    opacity: 0;
    transition: .4s;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay h3 {
    font-size: 21px;
    margin-bottom: 8px;
}

.gallery-overlay span {
    font-size: 12px;
    color: #d4e2c5;
    letter-spacing: 1px;
}

/* Responsive */

@media(max-width: 900px) {
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media(max-width: 550px) {
    .gallery-section {
        padding: 40px 18px;
    }

    .gallery-heading h1 {
        font-size: 31px;
    }

    .gallery-heading p {
        font-size: 13px;
    }

    .gallery-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .gallery-item {
        height: 250px;
    }

    .gallery-overlay {
        opacity: 1;
    }
}

</style>
<body>

<section class="gallery-section">

    <div class="gallery-heading">
        <span class="sub-title">OUR GALLERY</span>
        <h1>Moments at <span>Macha</span></h1>
        <p>
            A little taste of happiness, beautiful moments
            and fresh flavors at Macha Cafe.
        </p>
    </div>

    <div class="gallery-grid">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="gallery-item">

            <img src="images/gallery/<?php echo htmlspecialchars($row['image']); ?>"
                 alt="<?php echo htmlspecialchars($row['title']); ?>">

            <div class="gallery-overlay">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <span>✦ Macha Cafe</span>
            </div>

        </div>

        <?php } ?>

    </div>

</section>

</body>
</html>
