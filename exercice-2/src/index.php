<?php
// Configuration de la base de données
$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $stmt = $pdo->query('SELECT * FROM article');
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@unocss/runtime"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@unocss/reset/tailwind.css"/>
    <title>Docker Tech Blog</title>
</head>
<body class="bg-black text-white">

<!-- Navigation -->
<nav class="bg-black/50 backdrop-blur-lg py-3 px-6 flex justify-center items-center border border-white/20 w-fit
rounded-full hover:scale-105 group transition ease-in-out duration-300 text-white/80 hover:text-white/50
 fixed top-6 left-1/2 -translate-x-1/2 z-100">
    <ul class="flex justify-center items-center w-fit h-full gap-6">
        <li>
            <a href="#"
               class="transition ease-in-out duration-300 font-semibold hover:!text-white/100">
                Accueil
            </a>
        </li>
        <li>
            <a href="#"
               class="transition ease-in-out duration-300 font-semibold hover:!text-white/100">
                Articles
            </a>
        </li>
        <li>
            <a href="#"
               class="transition ease-in-out duration-300 font-semibold hover:!text-white/100">
                À propos
            </a>
        </li>
    </ul>
</nav>

<!-- Bannière environnement -->
<?php if (getenv('APP_ENV') === 'dev'): ?>
    <div class="fixed bottom-0 left-1/2 -translate-x-1/2 bg-red-600 text-white px-4 py-2 rounded-t-xl z-100
    font-semibold flex
    items-center justify-center gap-2 animate-pulse">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <!-- Icon from All by undefined - undefined -->
            <path fill="currentColor"
                  d="M12 1.67c.955 0 1.845.467 2.39 1.247l.105.16l8.114 13.548a2.914 2.914 0 0 1-2.307 4.363l-.195.008H3.882a2.914 2.914 0 0 1-2.582-4.2l.099-.185l8.11-13.538A2.91 2.91 0 0 1 12 1.67M12.01 15l-.127.007a1 1 0 0 0 0 1.986L12 17l.127-.007a1 1 0 0 0 0-1.986zM12 8a1 1 0 0 0-.993.883L11 9v4l.007.117a1 1 0 0 0 1.986 0L13 13V9l-.007-.117A1 1 0 0 0 12 8"/>
        </svg>
        <span>Environnement de développement</span>
    </div>
<?php endif; ?>

<!-- Contenu principal -->
<main class="container mx-auto px-6 py-12 pt-32 min-h-screen h-screen">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php foreach ($articles as $article): ?>
            <article
                    class="rounded-xl overflow-hidden transition ease-in-out duration-300 border border-white/20 px-6
                     py-4 hover:scale-105 cursor-pointer transition ease-in-out duration-300">
                <h2 class="text-xl font-bold text-white mb-3">
                    <?= htmlspecialchars($article['title']) ?>
                </h2>
                <p class="leading-relaxed text-white/75">
                    <?= nl2br(htmlspecialchars($article['body'])) ?>
                </p>
                <div class="mt-4 flex items-center text-sm text-white/50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <?= date('d M Y') ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</main>

<!-- Footer -->
<footer class="w-full border-t border-white/20 py-6">
    <div class="container mx-auto px-6 text-center">
        <p class="text-white/80">&copy; 2024 Docker Tech Blog - Tous droits réservés</p>
        <div class="mt-3 flex justify-center space-x-6 text-white/80 hover:text-white/50">
            <a href="#" class="hover:!text-white/100 transition ease-in-out duration-300">Mentions légales</a>
            <a href="#" class="hover:!text-white/100 transition ease-in-out duration-300">Contact</a>
            <a href="#" class="hover:!text-white/100 transition ease-in-out duration-300">Réseaux</a>
        </div>
    </div>
</footer>

</body>

</html>